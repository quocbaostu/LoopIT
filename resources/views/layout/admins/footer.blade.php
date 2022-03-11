<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Website Tuyển Dụng LoopIT</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Bạn có muốn đăng xuất ?</div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="{{route('admin.logout')}}">Đăng xuất</a>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="{{ URL::asset('public/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ URL::asset('public/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ URL::asset('public/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ URL::asset('public/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ URL::asset('public/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ URL::asset('public/js/demo/chart-pie-demo.js') }}"></script>

<!-- datatable plugins -->
<script src="{{ URL::asset('public/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('public/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  

  <script>
      $(document).ready(function() {
        $('#table1').DataTable( {
          "oLanguage": {
            "sSearch": "Tìm kiếm",
            "sLengthMenu": "_MENU_",
            "sZeroRecords": "",
            "sInfo": "Showing _START_ to _END_ of _TOTAL_",
            "sInfoEmpty": "",
            "sInfoFiltered": ""
          }
        });
        $('#table2').DataTable( {
          "oLanguage": {
            "sSearch": "Tìm kiếm",
            "sLengthMenu": "_MENU_",
            "sZeroRecords": "",
            "sInfo": "Showing _START_ to _END_ of _TOTAL_",
            "sInfoEmpty": "",
            "sInfoFiltered": ""
          }
        });
      });
  </script>

</body>

</html>
