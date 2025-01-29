<?php
class qa{
    function index(){}
    function evidence($param){
        $oqasModel = model('oqas_model');
        $indicator=$oqasModel->get_indicators(['id'=>$param['ind']]);
        $data['title']=$indicator[0]['title'];
        $data['subject']=$indicator[0]['subject'];
        $data['content']=view('oqas/evidence',$data);
        return view('_template/main',$data);
    }
    function evidence_form(){
        $data['content']=view('oqas/evidence_form');
        return view('_template/main',$data);
    }
}
?>