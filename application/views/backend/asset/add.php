 <div class="breadcrumbs">
     <div class="breadcrumbs-inner">
         <div class="row m-0">
             <div class="col-sm-4">
                 <div class="page-header float-left">
                     <div class="page-title">
                         <h1><?= $title ?></h1>
                     </div>
                 </div>
             </div>
             <div class="col-sm-8">
                 <div class="page-header float-right">
                     <div class="page-title">
                         <ol class="breadcrumb text-right">
                             <li>Manajemen Data</li>
                             <li class="active"><?= $title ?></li>
                         </ol>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="content">
     <div class="animated fadeIn">
         <div class="row">
             <div class="col-lg-12">
                 <div class="card">
                     <div class="card-body">
                         <form action="" id="form_tambah" method="POST" enctype="multipart/form-data">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="main_category_id">Kategori Utama</label>
                                         <select class="form-control js-example-basic-single" id="main_category_id" name="main_category_id" style="width: 100%;">
                                             <?php foreach ($kategori_utama as $key) : ?>
                                                 <option value="<?= $key['id_main_category'] ?>"><?= $key['main_category'] ?></option>
                                             <?php endforeach ?>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="code_assets">Kode</label>
                                         <input type="text" class="form-control" id="code_assets" name="code_assets" value="<?= $kode_asset ?>" disabled>
                                     </div>
                                     <div class="form-group">
                                         <label for="name_assets">Nama</label>
                                         <input type="text" class="form-control" id="name_assets" name="name_assets">
                                     </div>
                                     <div class="form-group">
                                         <label for="desc_assets">Deskripsi</label>
                                         <textarea class="form-control" id="desc_assets" name="desc_assets" rows="9"></textarea>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="category_id">kategori</label>
                                         <select class="form-control js-example-basic-single" id="category_id" name="category_id" style="width: 100%;">
                                             <?php foreach ($kategori as $key) : ?>
                                                 <option value="<?= $key['id_category'] ?>"><?= $key['category'] ?></option>
                                             <?php endforeach ?>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="location_id">Lokasi</label>
                                         <select class="form-control js-example-basic-single" id="location_id" name="location_id" style="width: 100%;">
                                             <?php foreach ($lokasi as $key) : ?>
                                                 <option value="<?= $key['id_location'] ?>"><?= $key['location'] ?></option>
                                             <?php endforeach ?>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="brand_id">Merek</label>
                                         <select class="form-control js-example-basic-single" id="brand_id" name="brand_id" style="width: 100%;">
                                             <?php foreach ($merek as $key) : ?>
                                                 <option value="<?= $key['id_brand'] ?>"><?= $key['brand'] ?></option>
                                             <?php endforeach ?>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="type_brand_id">Tipe</label>
                                         <select class="form-control js-example-basic-single" id="type_brand_id" name="type_brand_id" style="width: 100%;">
                                             <?php foreach ($tipe as $key) : ?>
                                                 <option value="<?= $key['id_type_brand'] ?>"><?= $key['brand'] ?> - <?= $key['type'] ?></option>
                                             <?php endforeach ?>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="condition_id">Kondisi</label>
                                         <select class="form-control js-example-basic-single" id="condition_id" name="condition_id" style="width: 100%;">
                                             <?php foreach ($kondisi as $key) : ?>
                                                 <option value="<?= $key['id_condition'] ?>"><?= $key['condition'] ?>%</option>
                                             <?php endforeach ?>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="status_id">Status</label>
                                         <select class="form-control js-example-basic-single" id="status_id" name="status_id" style="width: 100%;">
                                             <?php foreach ($status as $key) : ?>
                                                 <option value="<?= $key['id_status'] ?>"><?= $key['status'] ?></option>
                                             <?php endforeach ?>
                                         </select>
                                     </div>
                                     <button class="btn btn-info float-right" type="submit"> <i class="fa fa-plus"></i> Tambah</button>
                                 </div>

                             </div>
                         </form>
                     </div>
                 </div>
             </div><!-- /# column -->
         </div>
     </div><!-- .animated -->
 </div>
 <div class="clearfix"></div>
 <script>
     $("#form_tambah").on("submit", function(e) {
         e.preventDefault();
         let formData = new FormData($('#form_tambah')[0])
         $.ajax({
             url: '<?= base_url() ?>assets_management/addSubmit',
             method: 'POST',
             dataType: 'JSON',
             processData: false,
             contentType: false,
             data: formData,
             success: function(results) {
                 if (results.code != 200) {
                     errors(results.message)
                 } else {
                     success(results.message)
                     $('.modal').modal('hide')
                 }
             }
         })
     });


     function success(msg) {
         toastr.options = {
             "closeButton": false,
             "debug": false,
             "newestOnTop": false,
             "progressBar": true,
             "positionClass": "toast-top-right",
             "preventDuplicates": false,
             "onclick": null,
             "showDuration": "100",
             "hideDuration": "200",
             "timeOut": "2000",
             "extendedTimeOut": "200",
             "showEasing": "swing",
             "hideEasing": "linear",
             "showMethod": "fadeIn",
             "hideMethod": "fadeOut",
             onHidden: function() {
                 window.location.href = '<?= base_url('assets_management') ?>'
             }
         }
         toastr.success(`${msg}`)

     }

     function errors(msg) {
         toastr.options = {
             "closeButton": false,
             "debug": false,
             "newestOnTop": false,
             "progressBar": true,
             "positionClass": "toast-top-right",
             "preventDuplicates": false,
             "onclick": null,
             "showDuration": "200",
             "hideDuration": "600",
             "timeOut": "5000",
             "extendedTimeOut": "600",
             "showEasing": "swing",
             "hideEasing": "linear",
             "showMethod": "fadeIn",
             "hideMethod": "fadeOut"
         }
         toastr.error(`${msg}`)
     }
 </script>