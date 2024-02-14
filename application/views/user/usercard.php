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
                    <tr>
                      <th scope="col">no</th>
                      <th scope="col">RFID</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Identitas</th>
                      <!-- <th scope="col">Di Edit Oleh</th> -->
                      <!-- <th scope="col">Tanggal Di ubah</th> -->
                      <!-- <th scope="col">Tanggal Di buat</th> -->
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
                        <td><?= $uc['id_rfid'] ?></td>

                        <td><?= $uc['nama'] ?></td>
                        <td><?= $uc['identitas'] ?></td>
                        <td>
                          <?php
                          if ($uc['status'] == 1) {
                            echo "Active";
                          } else {
                            echo "Disabled";
                          }
                          ?>
                        </td>

                        <td>
                          <a href="#" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#edit<?= $uc['id'] ?>"><i class="fa-solid fa-pen-to-square" style="color: #fff;"></i></i></a>
                          <a href="<?= base_url('user/deleteCard?id=' . $uc['id']) ?>" class="btn btn-danger m-2"><i class="fa-solid fa-trash" style="color: #fff;"></i></a>
                          <a href="#" class="btn btn-info m-2" data-bs-toggle="modal" data-bs-target="#review<?= $uc['id'] ?>"><i class="fa-brands fa-readme" style="color: #fff;"></i></a>
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
      <form action="<?= base_url('user/addCard') ?>" method="post">
      <div class="modal-body">
          <input type="hidden" name="id" value="">
            <div class="mb-3">
              <label for="id_rfid" class="form-label">RFID</label>
              <input type="text" class="form-control" id="id_rfid" name="id_rfid" value="" required>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="edit_nama" name="nama" value="" required>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Identitas</label>
              <select class="form-select" aria-label="Default select example" name="identitas">
                  <option selected>Choise....</option>
                  <option value="Mahasiswa">Mahasiswa</option>
                  <option value="Dosen">Dosen</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">status</label>
              <div class="form-check form-switch">
                <input name="status" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
              </div>
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
<?php foreach ($user_card as $i => $r) : ?>
<div class="modal fade" id="edit<?=$r['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Data User Card</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('user/editCard') ?>" method="post">
        <div class="modal-body">
          <!-- Formulir input untuk edit data -->
            <input type="hidden" name="id" value="<?= $r['id_rfid'] ?>">
            <!-- Tambahkan elemen-elemen input sesuai kebutuhan -->
            <div class="mb-3">
              <label for="id_rfid" class="form-label">RFID</label>
              <input type="text" class="form-control" id="id_rfid" name="id_rfid" value="<?= $r['id_rfid'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="edit_nama" name="nama" value="<?= $r['nama'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Identitas</label>
              <select class="form-select" aria-label="Default select example" name="identitas">
                  <option selected><?= $r['identitas'] ?></option>
                  <option value="Mahasiswa">Mahasiswa</option>
                  <option value="Dosen">Dosen</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">status</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" <?= $r['status'] == 1 ? 'checked' : ''?> name="status">
              </div>
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
<?php foreach ($user_card as $i => $r) : ?>
<div class="modal fade" id="review<?=$r['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Review Data Ruangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <!-- <div class="mb-3">
              <label for="id_ruangan" class="form-label">Code Ruangan</label>
              <input type="text" class="form-control" id="id_ruangan" name="id_ruangan" value="<?= $r['id_ruangan'] ?>" required>
            </div>
            <div class="mb-3">
              <label for="edit_nama_ruangan" class="form-label">Nama Ruangan</label>
              <input type="text" class="form-control" id="edit_nama_ruangan" name="nama_ruangan" value="<?= $r['nama_ruangan'] ?>" required>
            </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- Tambahkan tombol atau elemen lainnya sesuai kebutuhan -->
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>