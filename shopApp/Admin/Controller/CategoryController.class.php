<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class CategoryController extends BaseController {
    public function index(){

        $request=I("request.");
        $map=array();
        if($request["submit"]=="export"){
            $this->export($map);
        }
        else{
            $returnList=D("category")->getList();
            foreach($returnList as $r) {
                $r["id"]=$r["category_id"];
                $r["parentId"]=$r["category_parent_id"];
                $r['str_manage'] = '<a  class="btn btn-warning btn-sm update" title="会员修改" data-url="'.U('Category/update').'?category_id='.$r['id'].'"><i class="fa fa-edit" aria-hidden="true"></i> </a>
                                    <a  class="btn btn-danger btn-sm delete"  title="会员删除" data-id="'.$r['id'].'" data-url="'.U('Category/delete').'?category_id='.$r['id'].'"> <i class="fa fa-trash-o fa-lg"></i></a>';
                $array[] = $r;
            }
            $str  = "<tr id='row\$id'>
						<td align='center'><input name='listorders[\$id]' type='text' size='3' value='\$category_sort'></td>
						<td align='center'>\$id</td>
						<td  >\$spacer\$category_name</td>
						<td align='center'>\$category_status_name</td>
						<td align='center'>\$category_add_time_name</td>
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
        $exportList=D("category")->exportList($map);
        $memberTitle=array("会员编号","会员名称","真实姓名","会员性别","手机号","QQ","账户金额","新增时间");
        $rowHeader = implode(",",$memberTitle)."\n";
        $data = iconv('utf-8','gb2312',$rowHeader);
        foreach($exportList as $key=>$value){
            $rowData=array();
            $rowData[]=$value["member_id"];
            $rowData[]=$value["member_name"];
            $rowData[]=$value["member_truename"];
            $rowData[]=$value["member_sex_name"];
            $rowData[]=$value["member_mobile"];
            $rowData[]=$value["member_qq"];
            $rowData[]=$value["member_money"];
            $rowData[]=$value["member_time_name"];
            $rowString="";
            $rowString=implode(",",$rowData)."\n";
            $rowString=iconv('utf-8','gb2312',$rowString);
            $data.=$rowString;
        }
        $filename = "会员数据".date('YmdHis').'.csv'; //设置文件名
        export_csv($filename,$data); //导出
    }




    public  function  add(){

        C('TOKEN_ON',false);
        if(IS_POST){
            try{
                $returnData=D("category")->categoryAdd();
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
            $this->display();
        }
    }

    public  function  update(){

        C('TOKEN_ON',false);
        try{
            if(IS_POST){
                $returnData=D("category")->categoryEdit();
                if($returnData["status"]==1){
                    $this->success("修改成功!");
                }
                else{
                    E($returnData["tip"]);
                }
            }
            else{
                if(!I("get.category_id",0)){
                    E("修改的编号不存在!");
                }
                $categoryInfo=D("category")->getInfoById(I("get.category_id"));
                $this->assign("categoryInfo",$categoryInfo);
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
            $returnData=D("category")->categoryDelete();
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