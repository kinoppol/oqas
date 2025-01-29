<?php
class qa{
    function index(){}
    function evidence($param){
        $oqasModel = model('oqas_model');
        $indicator=$oqasModel->get_indicators(['id'=>$param['ind']]);
        $data['title']=$indicator[0]['title'];
        $data['content']=$indicator[0]['subject'];
        return view('_template/main',$data);
    }
}
?>