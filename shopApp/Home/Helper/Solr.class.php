<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/9
 * Time: 13:59
 */

namespace Home\Helper;


class Solr {


    private  static $client=null;
    private  static  $doc=null;
    //solr服务器地址及端口设置
    private static $options = array('hostname' => 'localhost','port' => '8983');

    /**
     * 设置solr库选择
     * @param $core string 库名称
     */
    public static function setCore($core){
        if($core) self::$options['path']='solr/'.$core;
    }

    /**
     * 增加solr索引
     * @param $fieldArr 索引字段及值
     * @return bool true
     */
    public static function addDocument($fieldArr=array()){

        try{

            if(self::$client==null){
                $client = new \SolrClient(self::$options);
            }
            if(self::$doc==null){
                $doc = new \SolrInputDocument();
            }
            foreach($fieldArr as $k => $v){
                $doc->addField($k,$v);

            }

            $client->addDocument($doc);

            return $client->commit();
        }
        catch(\Exception $e){
        }


    }

    /**
     * 删除索引
     * @param $id 主键id id可以为数组形式，应用于多选的情况
     * @return bool true
     */
    public static function delDocument($ids){
        $client = new \SolrClient(self::$options);
        if(is_array($ids))
            $client->deleteByIds($ids);
        else
            $client->deleteById($ids);
        $client->commit();
        return true;
    }

    /**
     * 查询数据
     * @param $qwhere     关键字
     * @param $fqwhere 附加条件，根据范围检索，适用于数值型
     * @param $getField    查询字段
     * @param $sort 排序 array('duration'=>'asc')  asc:升序，desc:降序
     * @param $pageindex   查询页数
     * @param $pagesize    每页显示条数
     */
    public static function selectQuery($qwhere=array(),$fqwhere=array(),$getField=array(),$sort=array(),$pageindex=1,$pagesize=20){
        $client = new \SolrClient(self::$options);
        $query = new \SolrQuery();
        $sel = '';
        foreach($qwhere as $k => $v){
            $sel .= ' +'.$k.':'."*".$v."*";        //对中文分词的field用这行
//        $sel = "{$k} : \"*{$v}*\"";    //对英文貌似$v两侧加*号就能模糊搜索了
        }
        if($sel==""){
            $sel="*:*";
        }
        $query->setQuery($sel);
        //关键字检索
        //附加条件，根据范围检索，适用于数值型
        if($fqwhere){
            $query->setFacet(true);
            foreach($fqwhere as $k => $v)
                $query->addFacetQuery($v);
            //$query->addFacetQuery('price:[* TO 500]');
        }

        //查询字段
        if($getField){
            foreach($getField as $key => $val)
                $query->addField($val);
        }
        //排序
        if($sort){
            foreach($sort as $k => $v){
                if($v == 'asc')
                    $query->addSortField($k,SolrQuery::ORDER_ASC);
                elseif($v == 'desc')
                    $query->addSortField($k,SolrQuery::ORDER_DESC);
            }
        }
        //分页
        $query->setStart(self::getPageIndex($pageindex,$pagesize));
        $query->setRows($pagesize);

        $query_response = $client->query($query);
        $response = $query_response->getResponse();
        return $response;
    }

    /**
     * 分页数据处理
     */
    private static function getPageIndex($pageindex,$pagesize){
        if($pageindex<=1)
            $pageindex = 0;
        else
            $pageindex = ($pageindex-1)*$pagesize;
        return $pageindex;
    }

}