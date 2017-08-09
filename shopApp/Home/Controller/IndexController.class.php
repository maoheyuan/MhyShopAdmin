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
            RabbitMQ::sendMsg("maoheyuan".$i,"maoheyuan","maoheyuan","maoheyuan");
        }



    }


    public  function getMq(){



        while(true){

           RabbitMQ::sendMsg("maoheyuan","maoheyuan","maoheyuan");



        }


    }
}