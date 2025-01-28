<?php

$menu['พัฒนาระบบ']=array(
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

print gen_menu($menu);