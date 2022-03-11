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
<script type="text/javascript" src="js/pagination.js"></script>
<!-- Owl Stylesheets Javascript -->
<script src="{{ URL::asset('public/js/owlcarousel/owl.carousel.js') }}"></script>
<!-- Radio Chamrm Javascipt -->
<script src="{{ URL::asset('public/jQuery-Radiocharm/jquery-radiocharm.js') }}"></script>
<!--CKEditor-->
<script src="{{ URL::asset('public/ckeditor/ckeditor.js')}}"></script>

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
    CKEDITOR.replace( 'editor-per-inf' );
    CKEDITOR.replace( 'editor-add-study' );
    CKEDITOR.replace( 'editor-edit-study' );
    CKEDITOR.replace( 'editor-add-exp' );
    CKEDITOR.replace( 'editor-edit-exp' );
    CKEDITOR.replace( 'editor-certi' );
    CKEDITOR.replace( 'editor-active' );
</script>

{{-- Avatar upload and preview --}}
<script type="text/javascript">
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imgPreview').css('background-image', 'url('+e.target.result +')');
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
