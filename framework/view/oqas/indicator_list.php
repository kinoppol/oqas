              <!-- Basic Bootstrap Table -->
              <div class="card">
                  <h5 class="card-header">รายการตัวชี้วัด</h5>
                  <div class="card-body">
                      <a href="<?php
                      if(!empty($project_id)){
                        $parent='/project_id/'.$project_id;
                      }
                      if(!empty($indicator_id)){
                        $parent='/project_id/'.$project_id.'/indicator_id/'.$indicator_id;
                      }
                      print site_url('oqas/indicator_form'.$parent) ?>"
                          class="btn btn-primary">
                          เพิ่มรายการตัวชี้วัดใหม่
                      </a>
                  <div class="table-responsive text-nowrap">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>ชื่อหัวข้อ</th>
                                  <th>คำอธิบาย</th>
                                  <th>ตัวชี้วัด</th>
                                  <th>จัดการ</th>
                              </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                              <?php
                              //print_r($projects);
                                foreach($indicators as $indicator) {
                                    ?>
                              <tr>
                                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                                          <?php print $indicator['title']; ?>
                                      </strong></td>
                                  <td><?php print $indicator['subject']; ?>
                                  </td>
                                  <td>
                                  <a href="<?php print site_url('oqas/indicators_list/indicator_id/'.$indicator['id']); ?>"><i class="bx bx-check-square me-1"></i> รายการตัวชี้วัด</a>
                                  </td>
                                  <td>
                                      <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                              data-bs-toggle="dropdown">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                              <a class="dropdown-item"
                                                    href="<?php print site_url('oqas/indicator_form/id/'.$indicator['id']); ?>"><i
                                                      class="bx bx-edit-alt me-1"></i> แก้ไข</a>
                                              <a class="dropdown-item"
                                                    href="<?php print site_url('oqas/delete_indicator/id/'.$indicator['id']); ?>"><i
                                                      class="bx bx-trash me-1"></i> ลบ</a>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              <?php
                                }
                      ?>
                          </tbody>
                      </table>
                      </div>
                  </div>
              </div>
              <!--/ Basic Bootstrap Table -->