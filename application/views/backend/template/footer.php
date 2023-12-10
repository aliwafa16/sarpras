 <div class="clearfix"></div>
 <!-- Footer -->
 <footer class="site-footer">
     <div class="footer-inner bg-white">
         <div class="row">
             <div class="col-sm-6">
                 Copyright &copy; 2023 ESQ Bussiness School
             </div>
             <div class="col-sm-6 text-right">
                 Made with <i class="fa fa-heart text-danger"></i> by IT Laboran'2023
             </div>
         </div>
     </div>
 </footer>
 <!-- /.site-footer -->
 </div>
 <!-- /#right-panel -->

 <!-- Scripts -->
 <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script> -->
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
 <script src="<?= base_url('public/js/jquery.dataTables.min.js') ?>"></script>
 <script src="<?= base_url('public/js/dataTables.bootstrap4.min.js') ?>"></script>
 <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
 <!-- <script src="<?= base_url('public/backend/') ?>assets/js/main.js"></script> -->

 <!--  Chart js -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

 <!--Chartist Chart-->
 <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
 <script src="<?= base_url('public/backend/') ?>assets/js/init/weather-init.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>


 <!-- Toasts -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


 <!-- Alertify -->
 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

 <!--Local Stuff-->
 <script>
     $(document).ready(function() {
         $('.js-example-basic-single').select2();
         $('.js-example-basic-multiple').select2();
     });
     document.addEventListener("DOMContentLoaded", function() {
         var elements = document.getElementsByTagName("INPUT");
         for (var i = 0; i < elements.length; i++) {
             elements[i].oninvalid = function(e) {
                 e.target.setCustomValidity("");
                 if (!e.target.validity.valid) {
                     e.target.setCustomValidity("Wajib diisi !");
                 }
             };
             elements[i].oninput = function(e) {
                 e.target.setCustomValidity("");
             };
         }
     })
 </script>

 </body>


 </html>