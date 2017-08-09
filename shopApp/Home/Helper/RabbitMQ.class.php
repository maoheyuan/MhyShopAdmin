<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/9
 * Time: 17:28
 */

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
        $exchange_name="rabbitMQ",
        $queue_name="rabbitMQ",
        $routing_key="rabbitMQ"
    ){

        $conn = new \AMQPConnection(self::$options);
        if(!$conn->connect()){
            die('Cannot connect to the broker');
        }
        $channel = new \AMQPChannel($conn);
        $exchange = new \AMQPExchange($channel);
        $exchange->setName($exchange_name);
        $exchange->setType(AMQP_EX_TYPE_DIRECT);
        $exchange->setFlags(AMQP_DURABLE);
        $status = $exchange->declareExchange();  //声明一个新交换机，如果这个交换机已经存在了，就不需要再调用declareExchange()方法了.
        $queue = new \AMQPQueue($channel);
        $queue->setName($queue_name);
        $status = $queue->declareQueue(); //同理如果该队列已经存在不用再调用这个方法了。
        $exchange->publish($msg, $routing_key);
    }


    public static function getMsg(
        $exchange_name="rabbitMQ",
        $queue_name="rabbitMQ",
        $routing_key="rabbitMQ"
    ){
        $conn = new AMQPConnection(self::$options);
        if(!$conn->connect()){
            die('Cannot connect to the broker');
        }
        $channel = new AMQPChannel($conn);
        $exchange = new AMQPExchange($channel);
        $exchange->setName($exchange_name);
        $exchange->setType(AMQP_EX_TYPE_DIRECT);
        $exchange->setFlags(AMQP_DURABLE);
        $queue = new AMQPQueue($channel);

        $queue->setName($queue_name);
        $queue->bind($exchange_name, $routing_key);

        $arr = $queue->get();

        $res = $queue->ack($arr->getDeliveryTag());
        $msg = $arr->getBody();


        echo $msg;

    }

}