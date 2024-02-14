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
                    <a href="#" data-bs-toggle="modal" data-bs-target="#tambah" class="btn_1">Add New</a>
                  </div>
                </div>
              </div>
              <div class="QA_table mb_30">
                <table class="table lms_table_active">
                  <thead>
                    <tr style="text-align: center;">
                      <th scope="col">no</th>
                      <th scope="col">Code Ruangan</th>
                      <th scope="col">Nama Ruangan</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <div class="noResults" style="display: none;">
                      No Results Found
                    </div>
                    <?php foreach ($ruang as $i => $r) : ?>
                      <tr class="tableRow" style="text-align: center;">
                        <th scope="row">
                          <?= $i + 1 ?></a>
                        </th>
                        <td><?= $r['id_ruangan'] ?></td>
                        <td><?= $r['nama_ruangan'] ?></td>

                        <td>
                          <a href="#" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#edit<?=$r['id_ruangan']?>"><i class="fa-solid fa-pen-to-square" style="color: #fff;"></i></i></a>
                          <a href="<?= base_url('monitoring/deleteRuangan?id_ruangan='.$r['id_ruangan']) ?>" class="btn btn-danger m-2"><i class="fa-solid fa-trash" style="color: #fff;"></i></a>
                          <a href="#" class="btn btn-info m-2" data-bs-toggle="modal" data-bs-target="#review<?=$r['id_ruangan']?>"><i class="fa-brands fa-readme" style="color: #fff;"></i></a>
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
<!-- Modal tambah -->
<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Ruangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('monitoring/addRuangan') ?>" method="post">
      <div class="modal-body">
        <!-- Formulir input untuk tambah data -->
          <?php foreach ($ruang as $i => $r) : ?>
            <input type="hidden" name="id_ruangan" value="<?= $r['id_ruangan'] ?>">
          <?php endforeach; ?>
          <!-- Tambahkan elemen-elemen input sesuai kebutuhan -->
          <div class="mb-3">
              <label for="id_ruangan" class="form-label">Code Ruangan</label>
              <input type="text" class="form-control" id="id_ruangan" name="id_ruangan" value="<?= $r['id_ruangan'] ?>" required>
            </div>
          <div class="mb-3">
            <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" required>
          </div>
          <!-- Tambahkan elemen-elemen input lainnya -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<?php foreach ($ruang as $i => $r) : ?>
<div class="modal fade" id="edit<?=$r['id_ruangan'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Ruangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('monitoring/editRuangan') ?>" method="post">
        <div class="modal-body">
          <!-- Formulir input untuk edit data -->
            <input type="hidden" name="id" value="<?= $r['id_ruangan'] ?>">
            <!-- Tambahkan elemen-elemen input sesuai kebutuhan -->
            <div class="mb-3">
              <label for="id_ruangan" class="form-label">Code Ruangan</label>
              <input type="text" class="form-control" id="id_ruangan" name="id_ruangan" value="<?= $r['id_ruangan'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="edit_nama_ruangan" class="form-label">Nama Ruangan</label>
              <input type="text" class="form-control" id="edit_nama_ruangan" name="nama_ruangan" value="<?= $r['nama_ruangan'] ?>" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php endforeach; ?>

<!-- Modal Review -->
<?php foreach ($ruang as $i => $r) : ?>
<div class="modal fade" id="review<?=$r['id_ruangan']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Review Data Ruangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="mb-3">
              <label for="id_ruangan" class="form-label">Code Ruangan</label>
              <input type="text" class="form-control" id="id_ruangan" name="id_ruangan" value="<?= $r['id_ruangan'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="edit_nama_ruangan" class="form-label">Nama Ruangan</label>
              <input type="text" class="form-control" id="edit_nama_ruangan" name="nama_ruangan" value="<?= $r['nama_ruangan'] ?>" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- Tambahkan tombol atau elemen lainnya sesuai kebutuhan -->
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
