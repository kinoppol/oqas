<?php

helper('view/alert');

?>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">ข้อมูลตัวชี้วัด</h5>
      <div class="card-body">
        <?php
        if(!empty($_SESSION['response']['alert'])) {
            gen_alert($_SESSION['response']['alert']);
            $_SESSION['response'] = null;
        }
?>
        <form
          action="<?= site_url('oqas/save_indicator') ?>"
          method="post">

          <div class="mb-3 col-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="ตัวบ่งชี้ที่.../ตัวชี้วัดที่..."
                aria-describedby="floatingInputHelp" name="title"
                value="<?php if(!empty($indicator)) print $indicator['title']; ?>" required />
              <label for="floatingInput">หัวข้อตัวชี้วัด</label>
              <div id="floatingInputHelp" class="form-text">

              </div>
            </div>
          </div>

            <div class="mb-3 col-12">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="คุณภาพ..."
                aria-describedby="floatingInputHelp" name="subject"
                value="<?php if(!empty($indicator)) print $indicator['subject']; ?>" required />
                <label for="floatingInput">ชื่อตัวชีวัด</label>
                <div id="floatingInputHelp" class="form-text">

                </div>
            </div>
            </div>
            <?php 
                if(!empty($indicator['project_id'])) {
                print '<input type="hidden" name="project_id" value="'.$indicator['project_id'].'">';
              }
            
            if(!empty($indicator['parent_id'])) {
                  print '<input type="hidden" name="indicator_id" value="'.$indicator['parent_id'].'">';
                } 
            
            if(!empty($indicator['id'])) {
                print '<input type="hidden" name="id" value="'.$indicator['id'].'">';
              } ?>
          <div class="row">
            <div class="d-grid gap-2 col-lg-6 col-md-12 mx-auto mt-3">
            </div>
            <div class="d-grid gap-2 col-lg-6 col-md-12 mx-auto mt-3">
              <button class="btn btn-primary btn-lg" type="submit">ตกลง</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>