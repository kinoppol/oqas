              <!-- Basic Bootstrap Table -->
              <div class="card">
                  <h5 class="card-header">รายการประเมิน</h5>
                  <div class="card-body">
                      <a href="<?= site_url('oqas/project_form') ?>"
                          class="btn btn-primary">
                          เพิ่มรายการประเมินใหม่
                      </a>
                  <div class="table-responsive text-nowrap">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>ชื่อการประเมิน</th>
                                  <th>วันที่ประเมิน</th>
                                  <th>จัดการ</th>
                              </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                              <?php
                              //print_r($projects);
                                foreach($projects as $project) {
                                    ?>
                              <tr>
                                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                                          <?php print $project['subject']; ?>
                                      </strong></td>
                                  <td><?php print $project['due_date']; ?>
                                  </td>
                                  <td>
                                      <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                              data-bs-toggle="dropdown">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                    href="<?php print site_url('oqas/indicator_list/project_id/'.$project['id']); ?>"><i
                                                      class="bx bx-check-square me-1"></i> จัดการตัวชีวัด</a>
                                              <a class="dropdown-item"
                                                    href="<?php print site_url('oqas/project_form/id/'.$project['id']); ?>"><i
                                                      class="bx bx-edit-alt me-1"></i> แก้ไข</a>
                                              <a class="dropdown-item"
                                                    href="<?php print site_url('oqas/delete_project/id/'.$project['id']); ?>"><i
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