<?php

helper('view/alert');

?>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">ข้อมูลรายงานการประเมิน</h5>
      <div class="card-body">
        <?php
        if(!empty($_SESSION['response']['alert'])) {
            gen_alert($_SESSION['response']['alert']);
            $_SESSION['response'] = null;
        }
?>
        <form
          action="<?= site_url('oqas/save_project') ?>"
          method="post">

          <div class="mb-3 col-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="การประเมิน..."
                aria-describedby="floatingInputHelp" name="subject"
                value="<?php if(!empty($project)) print $project['subject']; ?>" required />
              <label for="floatingInput">ชื่อการประเมิน</label>
              <div id="floatingInputHelp" class="form-text">

              </div>
            </div>
          </div>
          
          <div class="mb-3 col-12">
            <div class="form-floating">
              <input type="date" name="due_date" class="form-control" id="floatingInput"
                placeholder="<?php print date('Y-m-d'); ?>" aria-describedby="floatingInputHelp" value="<?php if(!empty($project)) print $project['due_date']; ?>"/>
              <label for="floatingInput">วันที่ประเมิน</label>
              <div id="floatingInputHelp" class="form-text">
              <?php if(!empty($project)) {
                print '<input type="hidden" name="id" value="'.$project['id'].'">';
              } ?>
              </div>
            </div>
          </div>
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