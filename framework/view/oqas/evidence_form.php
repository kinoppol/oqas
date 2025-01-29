<?php

helper('view/alert');

?>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">หลักฐานประกอบ</h5>
      <div class="card-body">
        <form
          action="<?= site_url('qa/save_evidence') ?>"
          method="post">

          <div class="mb-3 col-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="เอกสาร..."
                aria-describedby="floatingInputHelp" name="title"
                value="<?php if(!empty($indicator)) print $indicator['title']; ?>" required />
              <label for="floatingInput">ชื่อหลักฐาน</label>
              <div id="floatingInputHelp" class="form-text">

              </div>
            </div>
          </div>

            <div class="mb-3 col-12">
            <div class="form-floating">
                <select class="form-control" id="floatingInput" aria-describedby="floatingInputHelp" name="subject"/>
                <option value="text">ข้อความ</option>
                <option value="link">ลิงก์</option>
                <option value="pdf">ไฟล์ PDF</option>
                </select>
                <label for="floatingInput">ประเภทหลักฐาน</label>
                <div id="floatingInputHelp" class="form-text">

                </div>
            </div>
            </div>

            <div class="mb-3 col-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="http://..."
                aria-describedby="floatingInputHelp" name="detail"
                value="<?php if(!empty($indicator)) print $indicator['title']; ?>" required />
              <label for="floatingInput">รายละเอียดหลักฐาน</label>
              <div id="floatingInputHelp" class="form-text">

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