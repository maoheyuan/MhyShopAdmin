<?php
namespace Home\Controller;
use Think\Controller;
use Home\Helper\Solr;
use Home\Helper\RabbitMQ;
class IndexController extends Controller {
    public function index(){



        header("Content-type: text/html; charset=utf-8");


/*
        $options = array
        (
            'hostname' => 'localhost',
            'port'     => '8983',
            "path"      =>'solr/mytest'
        );

        $client = new \SolrClient($options);

        $query = new \SolrQuery();

        $query->setQuery('username:chao1502264832');

        $query->setStart(0);

        $query->setRows(50);

        $query->addField('id')->addField('username')->addField('usertype')->addField('editTime');

        $query_response = $client->query($query);

        $response = $query_response->getResponse();

        var_dump($response);

        exit;*/

        $coreName = 'mytest';
        Solr::setCore($coreName);

        //查询
        $qwhere = array(
           "username" => "si sheng chao",
        );
        print_r(Solr::selectQuery($qwhere));


        for($i=0;$i<=10;$i++){

            sleep(1);
            //添加
            $fieldArr = array(
                "id" => time(),
                "username" => "chao".time(),
                "usertype" => 1,
                "editTime" => time(),
            );
           Solr::addDocument($fieldArr);

        }

    }


    public  function sendMq(){

        for($i=0;$i<=10;$i++){

            sleep(1);
            RabbitMQ::sendMsg("maoheyuan".$i,"e_linvo","key_2");
        }



    }


    public  function getMq(){


        $rollback=function ($envelope, $queue){

            print_r($envelope->getRoutingKey);
            $msg = $envelope->getBody();
            echo $msg."\n"; //处理消息
        };
        RabbitMQ::getMsg("e_linvo","q_linvo","key_2",$rollback);


    }


    public  function  testSendMq(){


        $conn_args = array(
            'host' => '127.0.0.1',
            'port' => '5672',
            'login' => 'guest',
            'password' => 'guest',
            'vhost'=>'/'
        );

        //创建连接和channel
        $conn = new \AMQPConnection($conn_args);
        if (!$conn->connect()) {
            die("Cannot connect to the broker!\n");
        }
        $channel = new \AMQPChannel($conn);

        //创建交换机
        $e_name = 'e_linvo'; //交换机名
        $ex = new \AMQPExchange($channel);
        $ex->setName($e_name);
        $ex->setType(AMQP_EX_TYPE_DIRECT); //direct类型
        $ex->setFlags(AMQP_DURABLE); //持久化
        echo "Exchange Status:".$ex->declare()."\n";



        for($i=0;$i<=100;$i++){


          //  echo "Send Message$i:".$ex->publish($i."TEST MESSAGE" . date('H:i:s', time()), 'key_1')."\n";
            echo "Send Message:".$ex->publish($i."TEST MESSAGE" . date('H:i:s', time()), 'key_2')."\n";
        }

    }


    public  function  testGetMq(){



        /**
         * 消费回调函数
         * 处理消息
         */



        $conn_args = array(
            'host' => '127.0.0.1',
            'port' => '5672',
            'login' => 'guest',
            'password' => 'guest',
            'vhost'=>'/'
        );

        $e_name = 'e_linvo'; //交换机名
        $q_name = 'q_linvo'; //队列名
        $k_route = 'key_2'; //路由key

        //创建连接和channel
        $conn = new \AMQPConnection($conn_args);
        if (!$conn->connect()) {
            die("Cannot connect to the broker!\n");
        }
        $channel = new \AMQPChannel($conn);

        //创建交换机
        $ex = new \AMQPExchange($channel);
        $ex->setName($e_name);
        $ex->setType(AMQP_EX_TYPE_DIRECT); //direct类型
        $ex->setFlags(AMQP_DURABLE); //持久化
        echo "Exchange Status:".$ex->declare()."\n";

        //创建队列
        $q = new \AMQPQueue($channel);
        $q->setName($q_name);
        $q->setFlags(AMQP_DURABLE); //持久化

         //绑定交换机与队列，并指定路由键
        echo 'Queue Bind: '.$q->bind($e_name, 'key_2')."\n";

        //阻塞模式接收消息
        echo "Message:\n";
        $q->consume(
            function ($envelope, $queue) {
                print_r($envelope->getRoutingKey);
                $msg = $envelope->getBody();
                echo $msg."\n"; //处理消息
            }
            , AMQP_AUTOACK); //自动ACK应答

        $conn->disconnect();

    }
}