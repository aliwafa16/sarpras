<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <div class="row justify-content-between">
                                <div class="col-md-3">
                                    <a href="/Assets/tambah" class="btn btn-primary btn-sm mb-3">Tambah data</a>
                                    <a href="/Assets/export-excel" class="btn btn-primary btn-sm mb-3">Export excel</a>
                                    <a class="btn btn-primary btn-sm mb-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Filter data
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <form action="" method="POST">
                                        <div class="input-group mb-3">
                                            <?= csrf_field() ?>
                                            <input type="hidden" value="true" name="search">
                                            <input type="text" class="form-control" value="<?php echo (!$keyword) ? '' : $keyword; ?>" placeholder="Masukan keyword pencarian..." aria-label="Recipient's username" aria-describedby="button-addon2" style="height: 2.8rem;" name="assets" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            <form action="" method="POST">
                                                <?= csrf_field() ?>
                                                <input type="hidden" value="true" name="filter">
                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label for="type" class="fw-bold">Main Kategori</label>
                                                        <select class="form-control selectpicker" name="main_category_id" data-live-search="true" required>
                                                            <option value="0"> --- Pilih main kategori ---</option>
                                                            <?php foreach ($data['main_category'] as $key) : ?>
                                                                <option value="<?= $key['id_main_category'] ?>" data-tokens="<?= $key['id_main_category'] ?>"><?= $key['main_category'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="type" class="fw-bold">Kategori</label>
                                                        <select class="form-control selectpicker" name="category_id" data-live-search="true" required>
                                                            <option value="0"> --- Pilih kategori ---</option>
                                                            <?php foreach ($data['category'] as $key) : ?>
                                                                <option value="<?= $key['id_category'] ?>" data-tokens="<?= $key['id_category'] ?>"><?= $key['category'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="type" class="fw-bold">Lokasi</label>
                                                        <select class="form-control selectpicker" name="location_id" data-live-search="true" required>
                                                            <option value="0"> --- Pilih Lokasi ---</option>
                                                            <?php foreach ($data['location'] as $key) : ?>
                                                                <option value="<?= $key['id_location'] ?>" data-tokens="<?= $key['id_location'] ?>"><?= $key['location'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="type" class="fw-bold">Kondisi</label>
                                                        <select class="form-control selectpicker" name="condition_id" data-live-search="true" required>
                                                            <option value="0"> --- Pilih kondisi ---</option>
                                                            <?php foreach ($data['condition'] as $key) : ?>
                                                                <option value="<?= $key['id_condition'] ?>" data-tokens="<?= $key['id_condition'] ?>"><?= $key['condition'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="type" class="fw-bold">Status</label>
                                                        <select class="form-control selectpicker" name="status_id" data-live-search="true" required>
                                                            <option value="0"> --- Pilih status ---</option>
                                                            <?php foreach ($data['status'] as $key) : ?>
                                                                <option value="<?= $key['id_status'] ?>" data-tokens="<?= $key['id_status'] ?>"><?= $key['status'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Filter</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if (session()->getFlashdata('message')) : ?>
                                <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
                                    <strong> <?= session()->getFlashdata('message') ?>!</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">
                                                No
                                            </th>
                                            <th>
                                                QR Code
                                            </th>
                                            <th style="width: 5%;">
                                                Main Kategori
                                            </th>
                                            <th>
                                                Kode Asset
                                            </th>
                                            <th>
                                                Nama Asset
                                            </th>
                                            <th>
                                                Kategori
                                            </th>
                                            <th>
                                                Merek
                                            </th>
                                            <th>
                                                Tipe
                                            </th>
                                            <th>
                                                Lokasi
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Kondisi
                                            </th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php foreach ($data['assets'] as $key) : ?>
                                            <tr>
                                                <td>
                                                    <?= $i ?>
                                                </td>
                                                <td>
                                                    <img src="<?= $key['qr_code'] ?>" style="width: 100px; height:100px; border-radius:0%">
                                                </td>
                                                <td>
                                                    <?= $key['main_category'] ?>
                                                </td>
                                                <td>
                                                    <?= $key['code_assets'] ?>
                                                </td>
                                                <td>
                                                    <?= $key['name_assets'] ?>
                                                </td>
                                                <td>
                                                    <?= $key['category'] ?>
                                                </td>
                                                <td>
                                                    <?= $key['brand'] ?>
                                                </td>
                                                <td>
                                                    <?= $key['type'] ?>
                                                </td>
                                                <td>
                                                    <?= $key['location'] ?>
                                                </td>
                                                <td>
                                                    <?= $key['status'] ?>
                                                </td>
                                                <td>
                                                    <?= $key['condition'] ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('Assets/edit/') ?><?= $key['id_assets'] ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="/Assets/<?= $key['id_assets'] ?>" class="d-inline" method="POST">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</button>
                                                    </form>
                                                    <div class="btn-group">
                                                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                            <span class="mdi mdi-apps"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <h6 class="dropdown-header fw-bold">Opsi perubahan data</h6>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal" onclick="modalShow(`1`,`<?= $key['id_assets'] ?>`)">Nama</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal" onclick="modalShow(`2`,`<?= $key['id_assets'] ?>`)">Main Kategori</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal" onclick="modalShow(`3`,`<?= $key['id_assets'] ?>`)">Kategori</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal" onclick="modalShow(`4`,`<?= $key['id_assets'] ?>`)">Merek</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal" onclick="modalShow(`5`,`<?= $key['id_assets'] ?>`)">Tipe</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal" onclick="modalShow(`6`,`<?= $key['id_assets'] ?>`)">Lokasi</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal" onclick="modalShow(`7`,`<?= $key['id_assets'] ?>`)">Status</a>
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal" onclick="modalShow(`8`,`<?= $key['id_assets'] ?>`)">Kondisi</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <?php if (!$data['filter_search']) : ?>
                                    <div class="float-right mt-2">
                                        <?php $pager = $data['pager']; ?>
                                        <?= $pager->links('tbl_assets', 'custom_pagination') ?>
                                    </div>
                                <?php endif ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        console.log('ok')
    });
    document.addEventListener("DOMContentLoaded", function() {
        var elements = document.getElementsByTagName("INPUT");
        for (var i = 0; i < elements.length; i++) {
            elements[i].oninvalid = function(e) {
                e.target.setCustomValidity("");
                if (!e.target.validity.valid) {
                    e.target.setCustomValidity("Tidak boleh kosong !");
                }
            };
            elements[i].oninput = function(e) {
                e.target.setCustomValidity("");
            };
        }
    })

    function modalShow(type, assets_id) {
        $.ajax({
            url: '<?= base_url() ?>Assets/editParsial',
            type: 'POST',
            dataType: 'JSON',
            data: {
                type,
                assets_id
            }
        })
    }
</script>
<?= $this->endSection('content') ?>