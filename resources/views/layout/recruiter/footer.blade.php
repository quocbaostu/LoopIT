<!-- footer -->
<div class="container-fluid footer-wrap  clear-left clear-right">
  <div class="container footer">
    <div class="row">
      <div class="col-md-4 col-sm-8 col-12">
        <h2 class="footer-heading">
          <span>LoopIT</span>
        </h2>

        <ul class="footer-contact">
          <li>
            <a href="#">
              <i class="fa fa-phone fticn"></i> +123 456 7890
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-envelope fticn"></i>
              loopit.test@gmail.com
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-map-marker fticn"></i>
              180 Cao Lỗ, Phường 4, Quận 8, TP.HCM
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-4 col-12"></div>
      <div class="col-md-2 col-sm-6 col-12">
        <h2 class="footer-heading">
          <span>Công ty</span>
        </h2>
        <ul class="footer-list">
          <li><a href="#">Giới thiệu</a></li>
          <li><a href="#">Bảo mật thông tin</a></li>
          <li><a href="#">Quy định sử dụng</a></li>
          <li><a href="#">Cẩm nang tuyển dụng</a></li>
        </ul>
      </div>
      <div class="col-md-4 col-sm-12 col-12">
        <h2 class="footer-heading">
          <span>Dành cho nhà tuyển dụng</span>
        </h2>
        <ul class="footer-list">
          <li><a href="#">Đăng tuyển</a></li>
          <li><a href="#">Tìm kiếm hồ sơ</a></li>
          <li><a href="#">Sản phẩm dịch vụ</a></li>
          <li><a href="#">Liên hệ</a></li>
        </ul>
      </div>



    </div>
  </div>
</div>

<footer class="container-fluid copyright-wrap">
  <div class="container copyright">
    <p class="copyright-content">
      Website Tuyển dụng và tìm kiếm việc làm <a href="{{route('recruiter.home')}}"> Loop<b>IT</b></a>
    </p>
  </div>
</footer>
<!-- (end) footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="{{ URL::asset('public/js/jquery-3.4.1.slim.min.js') }}"></script> -->
    <script src="{{ URL::asset('public/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/jobdata.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('public/js/main.js') }}"></script>
    <!-- Owl Stylesheets Javascript -->
    <script src="{{ URL::asset('public/js/owlcarousel/owl.carousel.js') }}"></script>
    <!-- Read More Plugin -->


  <!-- datatable plugins -->
  <script src="{{ URL::asset('public/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('public/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>



  <script>
      $(document).ready(function() {
        $('#test').DataTable( {
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
    $(document).ready(function() {
        $('#tblDV').DataTable({
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

<script type="text/javascript">
      $(".txtcheck input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtcheck input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      $('#password, #confirm_password').on('keyup', function () {
		if ($('#password').val() == $('#confirm_password').val()) {
			$('#message').html('Nhập lại mật khẩu đúng').css('color', 'green').addClass('alert-success').removeClass("alert-danger");
			document.getElementById("btnsubmit").disabled = false;
		} else {
			$('#message').html('Nhập lại mật khẩu sai').css('color', 'red').addClass('alert-danger');
			document.getElementById("btnsubmit").disabled = true;
		}
      });
    </script>

    <script type="text/javascript">
      const uploadLogoButton = document.getElementById("logo-img");
      const customBtn = document.getElementById("upload-logo-button");
      const customText = document.getElementById("upload-logo-span");

      customBtn.addEventListener("click", function() {
        uploadLogoButton.click();
      });

      uploadLogoButton.addEventListener("change", function() {
        if(uploadLogoButton.value) {
          customText.innerHTML = uploadLogoButton.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
        } else {
          customText.innerHTML = "Chưa có tệp nào được chọn.";
        }
      });
    </script>

    <script>
      $("img").each(function(){
        var img = $(this);
        var image = new Image();
        image.src = $(img).attr("src");
        var no_image = "{{ URL::asset('public/img/recruiter/no-image.png') }}";
        if (image.naturalWidth == 0 || image.readyState == 'uninitialized'){
            $(img).unbind("error").attr("src", no_image).css({
                height: $(img).css("height"),
                width: $(img).css("width"),
            });
        }
      });

    </script>



     <!-- Add to cart-->
     <script type="text/javascript">
      $(function() {
        $('.add-to-cart').on('click', addToCart);
      });
      function addToCart(event){
        event.preventDefault();
        let urlCart = $(this).data('url');
        $.ajax({
          type: "GET",
          url: urlCart,
          dataType: "json",
          success: function (data) {
            if(data.code === 200){
              $('#alertSuccess').show()
              setTimeout(function() {
                $("#alertSuccess").fadeTo(700, 200).slideUp(200, function(){
                    $("#alertSuccess").fadeOut();
                });
              }, 700);
            }
            if(data.message === "success") {
              $("#is-add-cart").load(location.href + " #is-add-cart");
            }
          }
        });
      }
    </script>
    <script type="text/javascript">
      $(function() {
        $('.update-cart').on('change', updateCart);
      });
      function updateCart(e){
        e.preventDefault();
        var ele = $(this);

        $.ajax({
            url: "{{ route('recruiter.update_cart') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id_dichvu: ele.parents("tr").attr("data-id_dichvu"),
                soluong: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
              if(response.message === "success") {
                window.location.reload();
              }
            }
        });
      }

      $(function() {
        $('.remove-from-cart').on('click', deleteCart);
      });
      function deleteCart(e) {
        e.preventDefault();
        var ele = $(this);

        $.ajax({
          url: "{{ route('recruiter.delete_cart') }}",
          method: "DELETE",
          data: {
              _token: '{{ csrf_token() }}',
              id_dichvu: ele.parents("tr").attr("data-id_dichvu")
          },
          success: function (response) {
              window.location.reload();
          }
        });
      }
    </script>
    @if(session('update-cart-success'))
    <script type="text/javascript">
      $('#alertSuccess').show()
      setTimeout(function() {
        $("#alertSuccess").fadeTo(700, 200).slideUp(200, function(){
            $("#alertSuccess").fadeOut();
        });
      }, 700);
    </script>
    @endif
    @if(session('error'))
    <script type="text/javascript">
      $('#alertDanger').show()
      setTimeout(function() {
        $("#alertDanger").fadeTo(700, 200).slideUp(200, function(){
            $("#alertDanger").fadeOut();
        });
      }, 700);
    </script>
    @endif




</body>
</html>
