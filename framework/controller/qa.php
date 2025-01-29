<?php
class qa{
    function index(){}
    function evidence($param){
        $oqasModel = model('oqas_model');
        $indicator=$oqasModel->get_indicators(['id'=>$param['ind']]);
        $data['title']=$indicator[0]['title'];
        $data['subject']=$indicator[0]['subject'];
        $data['ind']=$param['ind'];
        $evidence=$oqasModel->get_evidence(['indicator_id'=>$param['ind']]);
        $data['evidence']=$evidence;
        $data['content']=view('oqas/evidence',$data);
        return view('_template/main',$data);
    }
    function evidence_form($param){
        $data['ind']=$param['ind'];
        $data['title']='เพิ่มหลักฐาน';
        $data['content']=view('oqas/evidence_form',$data);
        return view('_template/main',$data);
    }
    function save_evidence(){
        $oqasModel = model('oqas_model');
        $data=array(
            'subject'=>$_POST['subject'],
            'type'=>$_POST['type'],
            'detail'=>$_POST['detail'],
            'indicator_id'=>$_POST['ind'],
        );
        if(!empty($_POST['id'])){
            $result=$oqasModel->update_evidence($data,['id'=>$_POST['id']]);
        }else{
            $result=$oqasModel->insert_evidence($data);
        }

        return redirect(site_url('qa/evidence/ind/'.$_POST['ind']));
    }
    function delete_evidence($param){
        $oqasModel = model('oqas_model');
        $result=$oqasModel->delete_evidence(['id'=>$param['id']]);
        return redirect(site_url('qa/evidence/ind/'.$param['ind']));
    }
}
?>