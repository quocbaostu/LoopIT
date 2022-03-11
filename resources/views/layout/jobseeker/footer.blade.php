
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/readmore.js') }}"></script>
<script type="text/javascript">
    $('.catelog-list').readmore({
    speed: 75,
    maxHeight: 150,
    moreLink: '<a href="#">Xem thêm<i class="fa fa-angle-down pl-2"></i></a>',
    lessLink: '<a href="#">Rút gọn<i class="fa fa-angle-up pl-2"></i></a>'
    });
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ URL::asset('public/js/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ URL::asset('public/js/popper.min.js') }}"></script>
<script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('public/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('public/js/jobdata.js') }}"></script>
<!-- Owl Stylesheets Javascript -->
<script src="{{ URL::asset('public/js/owlcarousel/owl.carousel.js') }}"></script>
<!-- Fileinput -->
<script src="{{ URL::asset('public/jQueryPlugin/jQuery-Fileinput/js/fileinput.min.js')}}"></script>
<script src="{{ URL::asset('public/jQueryPlugin/jQuery-Fileinput/js/locales/vi.js')}}"></script>
<!-- Tagify -->
<script src="{{ URL::asset('public/jQueryPlugin/jQuery-Tagify/dist/jQuery.tagify.min.js')}}"></script>





<!-- Script Nav tab Job manage -->
<script type="text/javascript">
    var tabLinks = document.querySelectorAll(".tablinks");
    var tabContent =document.querySelectorAll(".tabcontent");

    tabLinks.forEach(function(el) {
    el.addEventListener("click", openTabs);
    });

    function openTabs(el) {
    var btn = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
    var electronic = btn.dataset.electronic; // lấy giá trị trong data-electronic

    tabContent.forEach(function(el) {
        el.classList.remove("active");
    }); //lặp qua các tab content để remove class active

    tabLinks.forEach(function(el) {
        el.classList.remove("active");
    }); //lặp qua các tab links để remove class active

    document.querySelector("#" + electronic).classList.add("active");
    // trả về phần tử đầu tiên có id="" được add class active

    btn.classList.add("active");
    // các button mà chúng ta click vào sẽ được add class active
    }
</script>

<!--Script CKEditor-->
<script>
    CKEDITOR.replace( 'editor-add-study' );
    CKEDITOR.replace( 'editor-add-exp' );
    CKEDITOR.config.entities = false;
</script>

{{-- Avatar upload and preview --}}
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                // $('#imagePreview').hide();
                // $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgUpload").change(function() {
        readURL(this);
    });
</script>

{{-- File CV upload--}}
<script>
    $("#filecv").fileinput({
        showPreview:false,
        language:'vi',
        showRemove:false,
        showUpload:false
    });
    $("#filecv2").fileinput({
        showPreview:false,
        language:'vi',
        showRemove:false,
        showUpload:false
    });
</script>




<!-- job support -->
<div class="container-fluid job-support-wrapper">
    <div class="container-fluid job-support-wrap">
        <div class="container job-support">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-12">
                    <ul class="spp-list">
                    <li>
                        <span><i class="fa fa-question-circle pr-2 icsp"></i>Hỗ trợ nhà tuyển dụng:</span>
                    </li>
                    <li>
                        <span><i class="fa fa-phone pr-2 icsp"></i>083.578.4337</span>
                    </li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12 col-12">
                    <div class="newsletter">
                        <span class="txt6">Đăng ký nhận bản tin việc làm</span>
                        <div class="input-group frm1">
                        <input type="text" placeholder="Nhập email của bạn" class="newsletter-email form-control">
                        <a href="#" class="input-group-addon"><i class="fa fa-lg fa-envelope-o colorb"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- (end) job support -->

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

</body>

</html>


