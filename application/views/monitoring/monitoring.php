
<div class="main_content_iner">
  <div class="container-fluid p-0">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
          <div class="white_card_header">
            <div class="box_header m-0">
              <div class="main-title">
                <h4 class="m-0"><?= $title ?></h4>
              </div>
            </div>
          </div>
          <div class="white_card_body">
            <div class="QA_section">
              <div class="white_box_tittle list_header">

                <!-- <h4>Monitoring Doorlock</h4> -->
                <div class="box_right d-flex lms_block">
                  <div class="serach_field_2">
                    <div class="search_inner">
                      <form Active="#">
                        <div class="search_field">
                          <input type="text" id="searchInput" placeholder="Search content here..." />
                        </div>
                        <button type="submit">
                          <i class="ti-search"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="QA_table mb_30">
                <table class="table lms_table_active">
                  <thead>
                    <tr style="text-align: center;">
                      <th scope="col">no</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Identitas</th>
                      <th scope="col">Ruangan</th>
                      <th scope="col">Tanggal Access</th>
                      <th scope="col">Waktu Access</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                  <div class="noResults" style="display: none;">
                        No Results Found
                    </div>
                    <?php foreach ($card_monitoring as $i => $cm) : ?>
                      <tr class="tableRow" style="text-align: center;">
                        <th scope="row">
                          <?= $i + 1 ?></a>
                        </th>
                        <td><?= $cm['nama'] ?></td>
                        <td><?= $cm['identitas'] ?></td>
                        <td><?= $cm['nama_ruangan'] ?></td>
                        <td><?= $cm['time_request'] ?></td>
                        <td><?= $cm['date_request'] ?></td>

                        <td>
                          <a href="#" class="btn btn-info m-2"><i class="fa-brands fa-readme" style="color: #fff;"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12"></div>
    </div>
  </div>
</div>