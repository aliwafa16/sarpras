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
                         <a href="<?= base_url('Assets_management/add') ?>" class="btn btn-info mb-3" type="button"><i class="fa fa-plus"></i> Tambah data</a>
                         <button class="btn btn-info mb-3" type="button" data-toggle="modal" data-target="#tipeModal"><i class="fa fa-plus"></i> Tambah tipe</button>
                         <button class="btn btn-danger mb-3" type="button" data-toggle="modal" data-target="#hapustipeModal"><i class="fa fa-trash"></i> Hapus tipe</button>
                         <table id="asset_table" class="table table-striped table-bordered">
                             <thead class="text-center">
                                 <tr>
                                     <th class="text-center">No</th>
                                     <th class="text-center">Qr Code</th>
                                     <th class="text-center">Nomor Aset</th>
                                     <th class="text-center">Kategori Utama</th>
                                     <th class="text-center">Nama Aset</th>
                                     <th class="text-center">Kategori</th>
                                     <th class="text-center">Lokasi</th>
                                     <th class="text-center">Merek</th>
                                     <th class="text-center">Status</th>
                                     <th class="text-center">Kondisi</th>
                                     <th class="text-center">Created At</th>
                                     <th class="text-center">Updated At</th>
                                     <th class="text-center">Aksi</th>
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
 <div class="clearfix"></div>


 <script>
     $(document).ready(function() {
         var table = $("#asset_table");
         grid_brand = table.DataTable({
             scrollX: true,
             responsive: true,
             //  scrollCollapse: true,
             aaSorting: [],
             initComplete: function(settings, json) {},
             retrieve: true,
             processing: true,
             ajax: {
                 type: "GET",
                 url: '<?= base_url() ?>assets_management/load',
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
                 },
                 {
                     render: function(data, type, full, meta) {
                         return `<img src="${full.qr_code}" alt="" width="50%">`;
                     },
                     className: "text-center"
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.code_assets;
                     },
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.main_category;
                     },
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.name_assets;
                     },
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.category;
                     },
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.location;
                     },
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.brand;
                     },
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.status;
                     },
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.condition;
                     },
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.created_at;
                     },
                 },
                 {
                     render: function(data, type, full, meta) {
                         return full.updated_at;
                     },
                 },
                 {
                     render: function(data, type, full, meta) {
                         return `<div class="container">
                                    <button title="Edit" onclick="edit('${full.id_brand}','${full.brand}')" type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                                    <button onclick="hapus('${full.id_brand}')" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </div>`;
                     },
                     width: '10%',
                     className: "text-center",
                 },
             ],
         });
     })
 </script>