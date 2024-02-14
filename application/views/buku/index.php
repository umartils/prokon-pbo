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
                  <div class="add_button ms-2">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addcategory" class="btn_1">Add New</a>
                  </div>
                </div>
              </div>
              <div class="QA_table mb_30">
                <table class="table lms_table_active">
                  <thead>
                    <tr>
                      <th scope="col">no</th>
                      <th scope="col" style="width: 200px;">Judul</th>
                      <th scope="col">Genre</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach ($user_card as $i => $uc) : ?>
                      <tr class="tableRow">
                        <th scope="row">
                          <?= $i + 1 ?></a>
                        </th>
                        <td ><?= $uc['Judul'] ?></td>
                        <td><?= $uc['Genre'] ?></td>
                        <td>
                            <?php
                            if ($uc['Stok'] == 0) {
                                echo "Stok Habis";
                            }else {
                                echo "Tesedia";
                            }
                            ?>
                        </td>

                        <td>
                          <a href="#" class="btn btn-success m-2"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></i></a>
                          <a href="#" class="btn btn-danger m-2"><i class="fa-solid fa-trash" style="color: #000000;"></i></a>
                          <a href="#" class="btn btn-info m-2"><i class="fa-brands fa-readme" style="color: #000000;"></i></a>

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