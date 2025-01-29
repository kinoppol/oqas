<?php

$menu['ระบบประกัน']=array(
    'project'=>array(
        'label'=>'รายการประเมิน',
        'bullet'=>'tf-icons bx bx-select-multiple',
        'url'=>site_url('oqas/project'),
    ),/*
    'operator'=>array(
        'label'=>'ผู้รับผิดชอบหัวข้อ',
        'bullet'=>'tf-icons bx bx-user',
        'url'=>site_url('oqas/operator'),
        'item'=>array(),
    ),*/
);

print gen_menu($menu);