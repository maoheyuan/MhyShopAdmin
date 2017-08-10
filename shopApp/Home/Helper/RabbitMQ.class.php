<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/9
 * Time: 17:28
 */


/* 使用
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
}*/

namespace Home\Helper;


class RabbitMQ {


    private static $options=array(
        'host'=>'127.0.0.1',  //rabbitmq 服务器host
        'port'=>5672,         //rabbitmq 服务器端口
        'login'=>'guest',     //登录用户
        'password'=>'guest',   //登录密码
        'vhost'=>'/'         //虚拟主机);
    );

    //以下代码就构造了一个生产者，并投递了一条消息到rabbitmq中。
    public  static  function sendMsg(
        $msg="",
        $exchange_name="e_linvo",
        $routing_key="key_2"
    ){

        //创建连接和channel
        $conn = new \AMQPConnection(self::$options);
        if (!$conn->connect()) {
            die("Cannot connect to the broker!\n");
        }
        $channel = new \AMQPChannel($conn);
        //创建交换机
        $e_name = $exchange_name; //交换机名
        $ex = new \AMQPExchange($channel);
        $ex->setName($e_name);
        $ex->setType(AMQP_EX_TYPE_DIRECT); //direct类型
        $ex->setFlags(AMQP_DURABLE); //持久化
        $ex->declare();

        $ex->publish( $msg, $routing_key);
        return true;
    }


    public static function getMsg(
        $exchange_name="e_linvo",
        $queue_name="q_linvo",
        $routing_key="key_2",
        $rollback
    ){
        $e_name = $exchange_name; //交换机名
        $q_name = $queue_name; //队列名
        $k_route = $routing_key; //路由key

        //创建连接和channel
        $conn = new \AMQPConnection(self::$options);
        if (!$conn->connect()) {
            die("Cannot connect to the broker!\n");
        }
        $channel = new \AMQPChannel($conn);

        //创建交换机
        $ex = new \AMQPExchange($channel);
        $ex->setName($e_name);
        $ex->setType(AMQP_EX_TYPE_DIRECT); //direct类型
        $ex->setFlags(AMQP_DURABLE); //持久化
        $ex->declare();

        //创建队列
        $q = new \AMQPQueue($channel);
        $q->setName($q_name);
        $q->setFlags(AMQP_DURABLE); //持久化

        //绑定交换机与队列，并指定路由键
        $q->bind($e_name, $k_route);

        //阻塞模式接收消息
 /*       $q->consume(
            function ($envelope, $queue) {
                print_r($envelope->getRoutingKey);
                $msg = $envelope->getBody();
                echo $msg."\n"; //处理消息
            }
            , AMQP_AUTOACK); //自动ACK应答*/
        $q->consume($rollback,AMQP_AUTOACK); //自动ACK应答
        $conn->disconnect();
    }

}