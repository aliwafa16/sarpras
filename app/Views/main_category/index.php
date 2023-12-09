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
                            <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#tambahModal" type="button">Tambah data</button>
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
                                            <th>
                                                No
                                            </th>
                                            <th>
                                                Main Kategori
                                            </th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php foreach ($data as $key) : ?>
                                            <tr>
                                                <td>
                                                    <?= $i ?>
                                                </td>
                                                <td>
                                                    <?= $key['main_category'] ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?php echo $key['id_main_category']; ?>">Edit</button>
                                                    <form action="/Main_Category/<?= $key['id_main_category'] ?>" class="d-inline" method="POST">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin ingin menghapus data ?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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

<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Main Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" action="/Main_Category/tambah" method="POST">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="main_category">Main Kategori</label>
                        <input type="text" class="form-control" id="main_category" name="main_category" placeholder="Main Kategori" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php foreach ($data as $key) : ?>
    <div class="modal fade" id="editModal<?= $key['id_main_category'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Main Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="/Main_Category/edit/<?= $key['id_main_category'] ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="main_category">Main Kategori</label>
                            <input type="text" class="form-control" id="main_category" name="main_category" placeholder="Main Kategori" required value="<?= $key['main_category'] ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
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
</script>
<?= $this->endSection('content') ?>