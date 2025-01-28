<?php
class qa{
    function index(){}
    function evidence(){

        $content='หลักฐาน';
        return view('_template/main',array('content'=>$content,'title'=>'หลักฐาน'));
    }
}
?>