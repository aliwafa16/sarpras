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
                         <div id='calendar'></div>
                     </div>
                 </div>
             </div><!-- /# column -->
         </div>
     </div><!-- .animated -->
 </div>
 <div class="clearfix"></div>
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         var calendarEl = document.getElementById('calendar');
         var calendar = new FullCalendar.Calendar(calendarEl, {
             initialView: 'dayGridMonth'
         });
         calendar.render();
     });
 </script>
 <!-- /.content