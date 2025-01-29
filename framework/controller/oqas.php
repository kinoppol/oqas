<?php
class oqas{
    function index(){
    }
    function project(){
        $oqasModel = model('oqas_model');
        $projects=$oqasModel->get_projects(['org_id'=>'1']);
        //print_r($projects);
        $data['projects']=$projects;
        $data['content']=view('oqas/project_list',$data);
        $data['title']='รายการประเมิน';
        return view('_template/main',$data);
    }
    function project_form($param){
        $oqasModel = model('oqas_model');
        if(!empty($param['id'])){
            $project=$oqasModel->get_projects(['id'=>$param['id']]);
            $data['project']=$project[0];
        }else{
            $data=array();
        }
        $data['content']=view('oqas/project_form',$data);
        $data['title']='รายการประเมิน';
        return view('_template/main',$data);
    }
    function save_project(){
        $oqasModel = model('oqas_model');
        $data=array(
            'subject'=>$_POST['subject'],
            'due_date'=>$_POST['due_date'],
            'org_id'=>'1'
        );
        if(!empty($_POST['id'])){
            $result=$oqasModel->update_project($data,['id'=>$_POST['id']]);
        }else{
            $result=$oqasModel->insert_project($data);
        }
        return redirect(site_url('oqas/project'));
    }
    function indicators_list($param){
        $oqasModel = model('oqas_model');
        if(!empty($param['project_id'])){
            $data['project_id']=$param['project_id'];
            $indicators=$oqasModel->get_root_indicators($param['project_id']);
        }else{
            $data['indicator_id']=$param['indicator_id'];
            $indicators=$oqasModel->get_indicators(['parent_id'=>$param['indicator_id']]);
            $parent_data=$oqasModel->get_indicators(['id'=>$param['indicator_id']]);
            $data['project_id']=$parent_data[0]['project_id'];
        }
        //print_r($projects);
        $data['indicators']=$indicators;
        $data['content']=view('oqas/indicator_list',$data);
        $data['title']='รายการประเมิน';
        return view('_template/main',$data);
    }
    function indicator_form($param){
        $oqasModel = model('oqas_model');
        if(!empty($param['id'])){
            $indicator=$oqasModel->get_indicators(['id'=>$param['id']]);
            $data['indicator']=$indicator[0];
        }else{
            $data=array();
            if(!empty($param['project_id'])){
                $data['indicator']['project_id']=$param['project_id'];
            }
            if(!empty($param['indicator_id'])){
                $data['indicator']['parent_id']=$param['indicator_id'];
            }
        }
        $data['content']=view('oqas/indicator_form',$data);
        $data['title']='รายละเอียดตัวชี้วัด';
        return view('_template/main',$data);
    }
    function save_indicator(){
        $oqasModel = model('oqas_model');
        $data=array(
            'title'=>$_POST['title'],
            'subject'=>$_POST['subject'],
            //'parent_id'=>'1'
        );
        if(!empty($_POST['project_id'])){
            $data['project_id']=$_POST['project_id'];
            $url=site_url('oqas/indicators_list/project_id/'.$_POST['project_id']);
        }
        if(!empty($_POST['indicator_id'])){
            $data['parent_id']=$_POST['indicator_id'];
            $url=site_url('oqas/indicators_list/indicator_id/'.$_POST['indicator_id']);
        }
        if(!empty($_POST['id'])){
            $result=$oqasModel->update_indicator($data,['id'=>$_POST['id']]);
        }else{
            $result=$oqasModel->insert_indicator($data);
        }
        return redirect($url);
    }
}