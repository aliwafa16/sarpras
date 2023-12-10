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
                             <li>Master data</li>
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
                         <button class="btn btn-info mb-3" type="button" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Tambah data</button>
                         <button class="btn btn-info mb-3" type="button" data-toggle="modal" data-target="#tipeModal"><i class="fa fa-plus"></i> Tambah tipe</button>
                         <button class="btn btn-danger mb-3" type="button" data-toggle="modal" data-target="#hapustipeModal"><i class="fa fa-trash"></i> Hapus tipe</button>
                         <table id="brand_table" class="table table-striped table-bordered">
                             <thead class="text-center">
                                 <tr>
                                     <th>No</th>
                                     <th>Merek</th>
                                     <th>Tipe</th>
                                     <th>Created At</th>
                                     <th>Updated At</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody></tbody>
                         </table>
                     </div>
                 </div>
             </div><!-- /# column -->
         </div>
     </div><!-- .animated -->
 </div>

 <!-- Tambah Modal -->
 <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addModalLabel">Tambah</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="" method="POST" id="form_tambah">
                     <div class="form-group">
                         <label for="brand">Kategori</label>
                         <input type="text" class="form-control" id="brand" name="brand" aria-describedby="emailHelp" required>
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


 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Edit</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="" method="POST" id="form_edit">
                     <input type="hidden" class="form-control" id="id_brand" name="id_brand" aria-describedby="emailHelp" required>
                     <div class="form-group">
                         <label for="brand">Kategori</label>
                         <input type="text" class="form-control" id="brand" name="brand" aria-describedby="emailHelp" required>
                     </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                 <button type="submit" class="btn btn-primary">Edit</button>
             </div>
             </form>
         </div>
     </div>
 </div>

 <div class="modal fade" id="tipeModal" role="dialog" aria-labelledby="tipeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="tipeModalLabel">Tambah Tipe</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="" method=" POST" id="form_tipe">
                     <div class="form-group">
                         <label for="brand_id">Merek</label>
                         <select class="form-control js-example-basic-single" id="brand_id" name="brand_id" style="width: 100%;">
                             <?php foreach ($brand as $key) : ?>
                                 <option value="<?= $key['id_brand'] ?>"><?= $key['brand'] ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="type">Tipe</label>
                         <input type="text" class="form-control" id="type" name="type" aria-describedby="emailHelp" required>
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

 <div class="modal fade" id="hapustipeModal" role="dialog" aria-labelledby="hapustipeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="hapustipeModalLabel">Hapus Tipe</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="" method=" POST" id="form_hapus_tipe">
                     <div class="form-group">
                         <label for="brand_id">Merek</label>
                         <select class="form-control js-example-basic-multiple" id="id_type_brand" name="id_type_brand[]" style="width: 100%;" multiple="multiple">
                             <?php foreach ($type_brand as $key) : ?>
                                 <option value="<?= $key['id_type_brand'] ?>"><?= $key['brand'] ?> - <?= $key['type'] ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                 <button type="submit" class="btn btn-danger">Hapus</button>
             </div>
             </form>
         </div>
     </div>
 </div>
 <!-- /.content -->
 <div class="clearfix"></div>
 <script>
     $(document).ready(function() {
         var table = $("#brand_table");
         grid_brand = table.DataTable({
             // scrollX: true,
             // scrollCollapse: true,
             aaSorting: [],
             initComplete: function(settings, json) {},
             retrieve: true,
             processing: true,
             ajax: {
                 type: "GET",
                 url: '<?= base_url() ?>brand/load',
                 data: function(d) {
                     no = 0;
                 },
                 dataSrc: "",
             },
             columns: [{
                     render: function(data, type, full, meta) {
                         no += 1;

                         return no;
                     },
                     className: "text-center",
                     width: "1%",
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.brand;
                     },
                     width: "30%",
                 },
                 {
                     render: function(data, type, full, meta) {
                         if (Array.isArray(full.type)) {
                             // Render as a list if 'type' is an array
                             return '<ul style="list-style-type:none; padding: 0;">' +
                                 '<li>' + full.type.join('</li><li>') + '</li>' +
                                 '</ul>';
                         } else {
                             // Render as is if 'type' is not an array
                             return full.type;
                         }
                     },
                     width: "30%",
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.created_at;
                     },
                     width: "10%",
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.updated_at;
                     },
                     width: "10%",
                 },
                 {
                     render: function(data, type, full, meta) {
                         return `<div class="container">
                                    <button title="Edit" onclick="edit('${full.id_brand}','${full.brand}')" type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                    <button onclick="hapus('${full.id_brand}')" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </div>`;
                     },
                     width: "20%",
                     className: "text-center",
                 },
             ],
         });
     })

     $("#form_tambah").on("submit", function(e) {
         e.preventDefault();
         let formData = new FormData($('#form_tambah')[0])
         $.ajax({
             url: '<?= base_url() ?>brand/tambah',
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

     $("#form_tipe").on("submit", function(e) {
         e.preventDefault();
         let formData = new FormData($('#form_tipe')[0])
         $.ajax({
             url: '<?= base_url() ?>brand/tambah_tipe',
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

     $("#form_hapus_tipe").on("submit", function(e) {
         e.preventDefault();
         let formData = new FormData($('#form_hapus_tipe')[0])
         $.ajax({
             url: '<?= base_url() ?>brand/hapus_tipe',
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

     function edit(id, value) {
         $('#editModal').modal('show')
         $('#editModal #brand').val(value)
         $('#editModal #id_brand').val(id)
     }

     $("#form_edit").on("submit", function(e) {
         e.preventDefault();
         let formData = new FormData($('#form_edit')[0])
         $.ajax({
             url: '<?= base_url() ?>brand/edit',
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

     function hapus(id) {
         alertify.confirm("Yakin ingin menghapus data ?",
             function() {
                 $.ajax({
                     url: '<?= base_url() ?>brand/hapus',
                     method: 'POST',
                     dataType: 'JSON',
                     data: {
                         id
                     },
                     success: function(results) {
                         if (results.code != 200) {
                             errors(results.message)
                         } else {
                             success(results.message)
                         }
                     }
                 })
             },
         ).set('labels', {
             ok: 'Hapus',
             cancel: 'Batal'
         }).set({
             title: "Hapus data"
         });
     }


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
                 grid_brand.ajax.reload();
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
 <!-- /.content