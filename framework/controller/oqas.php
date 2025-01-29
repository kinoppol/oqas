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
}