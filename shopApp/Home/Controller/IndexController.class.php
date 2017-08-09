<?php
namespace Home\Controller;
use Think\Controller;
use Home\Helper\Solr;
class IndexController extends Controller {
    public function index(){



        header("Content-type: text/html; charset=utf-8");


        $coreName = 'mytest';
        Solr::setCore($coreName);

   /*     //查询
        $qwhere = array(
            "username" => "si sheng chao",
        );
        print_r(Solr::selectQuery($qwhere));*/



        for($i=0;$i<=10;$i++){

            //添加
            $fieldArr = array(
                "id" => time(),
                "username" => "chao".time(),
                "usertype" => 1,
                "editTime" => time(),
            );
          var_dump(  Solr::addDocument($fieldArr));
        }

    }
}