<?php
print $subject;
print "<br>";

foreach($evidence as $e){
    if($e['type']=='text'){
        print $e['detail'];
    }else if($e['type']=='link'){
        print '<a href="'.$e[detail].'" target="_blank" class="btn btn-primary">'.$e['subject'].'</a>';
    }else if($e['type']=='pdf'){
        print '<iframe src="'.$e['detail'].'" width="640" height="480"></iframe>';
    }
    print "<br>";
}
?> <br>
<a href="<?php
                      print site_url('qa/evidence_form/ind/'.$ind); ?>"
                          class="btn btn-primary">
                          เพิ่มหลักฐานประกอบ
                      </a>