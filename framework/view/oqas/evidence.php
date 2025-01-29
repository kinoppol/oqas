<?php
print $subject;
print "<br>";

foreach($evidence as $e){
    if($e['type']=='text'){
        print $e['detail'];
    }else if($e['type']=='link'){
        print '<a href="'.$e[detail].'" target="_blank" class="btn btn-primary">'.$e['subject'].'</a>';
    }else if($e['type']=='pdf'){
        print '<iframe src="'.$e['detail'].'" width="100%" height="600"></iframe>';
    }
    print '<a href="'.site_url('qa/delete_evidence/ind/'.$ind.'/id/'.$e['id']).'" onclick="return confirm(\'ยืนยันการลบหลักฐาน?\')"><i class="bx bx-trash me-1"></i> ลบ</a>';
}
?> <br>
<a href="<?php
                      print site_url('qa/evidence_form/ind/'.$ind); ?>"
                          class="btn btn-warning">
                          เพิ่มหลักฐานประกอบ
                      </a>