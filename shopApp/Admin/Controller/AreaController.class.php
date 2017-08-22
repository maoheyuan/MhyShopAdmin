<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class AreaController extends BaseController {
    public function index(){

        $request=I("request.");
        $map=array();
        if($request["submit"]=="export"){
            $this->export($map);
        }
        else{
            $returnList=D("area")->getList();
            foreach($returnList as $r) {
                $r["id"]=$r["area_id"];
                $r["parentId"]=$r["area_parent_id"];
                $r['str_manage'] = '<a  class="btn btn-warning btn-sm update" title="新增地区" data-url="'.U('Area/add').'?area_id='.$r['id'].'"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                <a  class="btn btn-warning btn-sm update" title="地区修改" data-url="'.U('Area/update').'?area_id='.$r['id'].'"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                                    <a  class="btn btn-danger btn-sm delete"  title="地区删除" data-id="'.$r['id'].'" data-url="'.U('Area/delete').'?area_id='.$r['id'].'"> <i class="fa fa-trash-o fa-lg"></i></a>';
                $array[] = $r;
            }
            $str  = "<tr id='row\$id'>
						<td align='center'><input name='listorders[\$id]' type='text' size='3' value='\$area_sort'></td>
						<td align='center'>\$id</td>
						<td  >\$spacer\$area_name</td>
						<td align='center'>\$area_level</td>
						<td align='center'>\$area_add_time_name</td>
						<td align='center'>\$str_manage</td>
					</tr>";
            $tree =  new \Think\Tree ($array);
            $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─','&nbsp;&nbsp;&nbsp;└─ ');
            $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $list = $tree->get_tree(0, $str);
            $this->assign('list', $list);
            C('TOKEN_ON',false);
            $this->display();
        }

    }


    public function  export($map){
        $exportList=D("area")->exportList($map);
        $memberTitle=array("地区编号","地区名称","上级ID","创建人ID","级别","修改时间","新增时间");
        $rowHeader = implode(",",$memberTitle)."\n";
        $data = iconv('utf-8','gb2312',$rowHeader);
        foreach($exportList as $key=>$value){
            $rowData=array();
            $rowData[]=$value["area_id"];
            $rowData[]=$value["area_name"];
            $rowData[]=$value["area_parent_id"];
            $rowData[]=$value["area_add_id"];
            $rowData[]=$value["area_level"];
            $rowData[]=$value["area_edit_time_name"];
            $rowData[]=$value["area_add_time_name"];
            $rowString="";
            $rowString=implode(",",$rowData)."\n";
            $rowString=iconv('utf-8','gb2312',$rowString);
            $data.=$rowString;
        }
        $filename = "地区管理数据".date('YmdHis').'.csv'; //设置文件名
        export_csv($filename,$data); //导出
    }



    public function areaTreeHtml($area_parent_id=null)
    {

        $parentid =	intval($_GET['area_id']);
        if($parentid==-1||!$parentid){
            $parentid=0;
        }


        if($area_parent_id!==null){
            $parentid=$area_parent_id;
        }
        $result =D("area")->getList();
        foreach($result as $r) {
            $r["id"]=$r["area_id"];
            $r["parentId"]=$r["area_parent_id"];
            $r['selected'] = $r['id'] == $parentid ? 'selected' : '';
            $array[] = $r;
        }
        $str  = "<option value='\$area_id' \$selected>\$spacer \$area_name</option>";
        $tree = new \Think\Tree($array);
        $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─','&nbsp;&nbsp;&nbsp;└─ ');
        $areaTree = $tree->get_tree(0, $str,$parentid);
        $this->assign('areaTree',  $areaTree);
    }

    public  function  add(){

        C('TOKEN_ON',false);
        if(IS_POST){
            try{
                $returnData=D("area")->areaAdd();
                if($returnData["status"]==1){
                    $this->success("新增成功!");
                }
                else{
                    E($returnData["tip"]);
                }
            }
            catch(\Exception $e){
                $this->error($e->getMessage());
            }
        }
        else{
            $this->areaTreeHtml();
            $this->display();
        }
    }

    public  function  update(){

        C('TOKEN_ON',false);
        try{
            if(IS_POST){
                $returnData=D("area")->areaEdit();
                if($returnData["status"]==1){
                    $this->success("修改成功!");
                }
                else{
                    E($returnData["tip"]);
                }
            }
            else{

                if(!I("get.area_id",0)){
                    E("修改的编号不存在!");
                }
                $areaInfo=D("area")->getInfoById(I("get.area_id"));


                $this->areaTreeHtml($areaInfo["area_parent_id"]);
                $this->assign("areaInfo",$areaInfo);
                $this->display();
            }
        }
        catch(\Exception $e){
            $this->error($e->getMessage());
        }
    }

    public  function  delete(){
        C('TOKEN_ON',false);
        try {
            $returnData=D("area")->areaDelete();
            if($returnData["status"]==1){
                $this->success("册除成功!");
            }
            else{
                E($returnData["tip"]);
            }
        }
        catch(\Exception $e){
            $this->error($e->getMessage());
        }
    }

}