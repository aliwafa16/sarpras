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
                            <form class="forms-sample" action="/Assets/save" method="POST">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Main Kategori</label>
                                            <select class="form-control selectpicker" name="main_category_id" data-live-search="true" required>
                                                <option value="Select Part"> --- Pilih main kategori ---</option>
                                                <?php foreach ($data['main_category'] as $key) : ?>
                                                    <option value="<?= $key['id_main_category'] ?>" data-tokens="<?= $key['id_main_category'] ?>" <?= ($key['id_main_category'] == $data['assets']['main_category_id']) ? 'selected' : '' ?>><?= $key['main_category'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Kategori</label>
                                            <select class="form-control selectpicker" name="category_id" data-live-search="true" required>
                                                <option value="Select Part"> --- Pilih kategori ---</option>
                                                <?php foreach ($data['category'] as $key) : ?>
                                                    <option value="<?= $key['id_category'] ?>" data-tokens="<?= $key['id_category'] ?>" <?= ($key['id_category'] == $data['assets']['category_id']) ? 'selected' : '' ?>><?= $key['category'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="code_assets">Kode Asset</label>
                                            <input type="text" class="form-control" id="code_assets" name="code_assets" placeholder="Kode Asset" value="<?= $data['assets']['code_assets'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="name_assets">Nama Asset</label>
                                            <input type="text" class="form-control" id="name_assets" name="name_assets" placeholder="Nama Asset" value="<?= $data['assets']['name_assets'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc_assets"><?= $data['assets']['desc_assets'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Lokasi</label>
                                            <select class="form-control selectpicker" name="location_id" data-live-search="true" required>
                                                <option value="Select Part"> --- Pilih Lokasi ---</option>
                                                <?php foreach ($data['location'] as $key) : ?>
                                                    <option value="<?= $key['id_location'] ?>" data-tokens="<?= $key['id_location'] ?>" <?= ($key['id_location'] == $data['assets']['location_id']) ? 'selected' : '' ?>><?= $key['location'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Merek</label>
                                            <select class="form-control selectpicker" name="brand_id" data-live-search="true" required>
                                                <option value="Select Part"> --- Pilih merek ---</option>
                                                <?php foreach ($data['brand'] as $key) : ?>
                                                    <option value="<?= $key['id_brand'] ?>" data-tokens="<?= $key['id_brand'] ?>" <?= ($key['id_brand'] == $data['assets']['brand_id']) ? 'selected' : '' ?>><?= $key['brand'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Tipe Merek</label>
                                            <select class="form-control selectpicker" name="type_brand_id" data-live-search="true" required>
                                                <option value="Select Part"> --- Pilih tipe merek ---</option>
                                                <?php foreach ($data['type_brand'] as $key) : ?>
                                                    <option value="<?= $key['id_type_brand'] ?>" data-tokens="<?= $key['id_type_brand'] ?>" <?= ($key['id_type_brand'] == $data['assets']['type_brand_id']) ? 'selected' : '' ?>><?= $key['type'] ?> - <?= $key['brand'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Kondisi</label>
                                            <select class="form-control selectpicker" name="condition_id" data-live-search="true" required>
                                                <option value="Select Part"> --- Pilih kondisi ---</option>
                                                <?php foreach ($data['condition'] as $key) : ?>
                                                    <option value="<?= $key['id_condition'] ?>" data-tokens="<?= $key['id_condition'] ?>" <?= ($key['id_condition'] == $data['assets']['condition_id']) ? 'selected' : '' ?>><?= $key['condition'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Status</label>
                                            <select class="form-control selectpicker" name="status_id" data-live-search="true" required>
                                                <option value="Select Part"> --- Pilih status ---</option>
                                                <?php foreach ($data['status'] as $key) : ?>
                                                    <option value="<?= $key['id_status'] ?>" data-tokens="<?= $key['id_status'] ?>" <?= ($key['id_status'] == $data['assets']['status_id']) ? 'selected' : '' ?>><?= $key['status'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2 float-right">Submit</button>
                            </form>
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