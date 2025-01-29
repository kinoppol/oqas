<?php

$project_id=1;


$oqasModel=model('oqas_model');
$root_indicators=$oqasModel->get_root_indicators($project_id);
$ind_menu=array();
foreach($root_indicators as $ind){
    $child_ind=$oqasModel->get_child_indicators($ind['id']);
    $item=array();
    if(count($child_ind)>=1){
        //print_r($child_ind);
        foreach($child_ind as $c){
            $item[$c['id']]=array(
                'label'=>$c['title'],
                'url'=>site_url('qa/evidence/ind/'.$c['id']),
            );
        }
    }
        $ind_menu[$ind['id']]=array(
            'label'=>$ind['title'],
            'bullet'=>'tf-icons bx bx-check-square',
            'url'=>site_url('#')
            );
            if(count($item)>=1){
                //print(count($item));
                $ind_menu[$ind['id']]['item']=$item;
            }
}
//print_r($ind_menu);

$menu['หัวข้อการประเมิน']=$ind_menu;
/*
$menu['หัวข้อ']=array(
    'form'=>array(
        'label'=>'แบบฟอร์ม',
        'bullet'=>'tf-icons bx bx-group',
        'url'=>site_url('form'),
        'item'=>array(
                'list'=>array(
                'label'=>'แบบฟอร์มในระบบ',
                'url'=>site_url('form/list'),
            ),
                'draft'=>array(
                'label'=>'แบบฟอร์มที่ร่าง',
                'url'=>site_url('form/list_draft'),
            ),
        ),
    ),
    'response'=>array(
        'label'=>'การตอบสนองต่อแบบฟอร์ม',
        'bullet'=>'tf-icons bx bx-id-card',
        'url'=>site_url('response/list'),
        'item'=>array(),
    ),
    'config'=>array(
        'label'=>'ตั้งค่าแอปพลิเคชัน',
        'url'=>site_url('config'),
        'bullet'=>'tf-icons bx bx-cog',
        'item'=>array(
            'store'=>array(
                'label'=>'ข้อมูลแอปพลิเคชัน',
                'bullet'=>'fa fa-shopping-cart',
                'url'=>site_url('config/application'),
            ),
            'time'=>array(
                'label'=>'การซ่อมบำรุง',
                'bullet'=>'fa fa-clock-o',
                'url'=>site_url('config/maintenance'),
            ),
        ),
    )
);
*/
helper('oqas');
print gen_oqas_menu($menu);