<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jobseeker\JobseekerController;
use App\Http\Controllers\jobseeker\AuthController;
use App\Http\Controllers\jobseeker\SearchController;

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

//Home page
Route::get('/', [JobseekerController::class, 'gethome'])->name('Home');
//Trang tìm kiếm công việc
Route::get('/job_search', [SearchController::class, 'getJobSearch'])->name('job_search');
//Trang tìm kiếm nhà tuyển dụng
Route::get('/recruiter_search', [SearchController::class, 'getRecruiterSearch'])->name('recruiter_search');
//Job detail
Route::get('/job_detail/{id_tintd}', [JobseekerController::class, 'getJobDetail'])->name('job_detail');
//Recruiter detail
Route::get('/recruiter_detail/{id_hosontd}', [JobseekerController::class, 'getRecruiterDetail'])->name('recruiter_detail');


//Các trang bảo mật tài khoản Ứng viên
Route::group(['prefix' => 'js_auth', 'middleware' => ['AuthJobseeker']], function(){
    //Trang Đăng nhập
    Route::get('/login', [AuthController::class, 'getLogin'])->name('js_getLogin');
    //Trả dữ liệu để xử lý đăng nhập
    Route::get('/signup', [AuthController::class, 'getSignup'])->name('js_getSignup');
    //Trang Đăng ký
    Route::post('/login', [AuthController::class, 'postLogin'])->name('js_postLogin');
    //Trả dữ liệu để xử lý đăng ký
    Route::post('/signup', [AuthController::class, 'postSignup'])->name('js_postSignup');
    //Gửi xác thực email
    Route::get('/verimail', [AuthController::class, 'jsVeriMail'])->name('js_sendveriMail');
    //Kích hoạt tài khoản
    Route::get('/activeaccount/{Tkungvien}/{token}', [AuthController::class, 'activeAccount'])->name('js_activeAccount');
    //Trang gửi lại thư xác nhận email
    Route::get('/resendveri', [AuthController::class, 'getResendVeri'])->name('js_getResendveri');
    //Trang yêu cầu khôi phục mật khẩu
    Route::get('/forgotpass', [AuthController::class, 'getForgotpass'])->name('js_getForgotpass');
    //Trang Đổi mật khẩu
    Route::get('/changepass/{ungvien}', [AuthController::class, 'getChangepass'])->name('js_getChangepass');
    //Xử lý gửi lại thư xác nhận email
    Route::post('/resendveri', [AuthController::class, 'postResendVeri'])->name('js_postResendveri');
    //Xử lý khôi yêu cầu phục mật khẩu
    Route::post('/forgotpass', [AuthController::class, 'postForgotpass'])->name('js_postForgotpass');
    //Xử lý đổi mật khẩu
    Route::post('/changepass/{ungvien}', [AuthController::class, 'postChangepass'])->name('js_postChangepass');
});

//Các trang chức năng của Ứng viên
Route::group(['prefix' => 'jobseeker', 'middleware' => ['AuthJobseeker']], function(){
    //------------------- Main -------------------
    //Dashboard
    Route::get('/', [JobseekerController::class, 'getDashboard'])->name('js_dasboard');
    //Trang Nhà tuyển dụng đã xem hồ sơ
    Route::get('/recruitersee', [JobseekerController::class, 'getRecsee'])->name('js_rcsee');


    //------------------- CV -------------------
    //Trang quản lý CV file (mặc định)
    Route::get('/cvmanage', [JobseekerController::class, 'getCVManage'])->name('js_getcvmanage');
    //Post upfile
    Route::post('/cvmanage/uploadfilecv', [JobseekerController::class, 'postUploadCVFile'])->name('js_postuploadfilecv');
    //Xem file PDF
    Route::get('/cvmanage/watchfilecv/{tenfile}', [JobseekerController::class, 'getWatchFileCV'])->name('js_watchfilecv');
    //Trang quản lý CV Onl
    Route::get('/cvmanageonl', [JobseekerController::class, 'getCVOnlManage'])->name('js_getcvonlmanage');
    //Post tạo CV Onl
    Route::post('/cvmanage/createcvonl', [JobseekerController::class, 'postCreateCVOnl'])->name('js_postcreatecvonl');
    //Get Preview CV
    Route::get('/cvmanage/previewcv/{id_cv}', [JobseekerController::class, 'getPreviewCVOnl'])->name('js_getpreviewCVOnl');
    //Get Update Nội dung CV Onl mới
    Route::get('/cvmanage/updatenewcontentcv/{id_cv}/{taidulieu}', [JobseekerController::class, 'getUpdateNewContentCV'])->name('js_getupdateNewContentCV');
    //Get Update Nội dung CV Onl đã lưu
    Route::get('/cvmanage/updatendcontentcv/{id_cv}', [JobseekerController::class, 'getUpdatedContentCV'])->name('js_getupdatedContentCV');
    //Post update Nội dung CV
    Route::post('/cvmanage/updatecontentcv', [JobseekerController::class, 'postUpdateContentCV'])->name('js_postupdateContentCV');
    //Post xoá CV
    Route::post('/cvmanage/deletecv/{id_cv}', [JobseekerController::class, 'postDeleteCV'])->name('js_postdeletecv');
    //Post sửa thông tin file cv cá nhân
    Route::post('/cvmanage/settingcvfile/{id_cv}', [JobseekerController::class, 'postSettingCV'])->name('js_postsettingcv');
    //Download PDF CV File
    Route::get('/download-cv/{id_cv}', [JobseekerController::class, 'getDownloadCV'])->name('js_getDownloadCV');



    //------------------- Jobs -------------------
    //Trang Công việc của tôi
    Route::get('/jobmana', [JobseekerController::class, 'getJobMana'])->name('js_jobmana');
    //Post Lưu công việc
    Route::get('/savejob/{id_tintd}', [JobseekerController::class, 'getSaveJob'])->name('js_savejob');
    //Get bỏ lưu công việc
    Route::get('/jobmana/unsave/{id_tintd}', [JobseekerController::class, 'getUnSaveJob'])->name('js_getunsavejob');
    //Post Gửi CV Ứng Tuyển
    Route::post('/sendcv/{id_tintd}', [JobseekerController::class, 'postSendCV'])->name('js_postsendcv');
    //Post Gửi báo cáo
    Route::post('/sendreport/{id_tintd}', [JobseekerController::class, 'postSendReport'])->name('js_postsendreport');




    //------------------- Notify -------------------
    //Trang Thông báo công việc - NTD
    Route::get('/jobnotirc', [JobseekerController::class, 'getJobNotiRC'])->name('js_jobnotirc');
    //Post Lưu Nhà tuyển dụng
    Route::get('/saverc/{id_hosontd}', [JobseekerController::class, 'getSaveRc'])->name('js_getsaverc');
    //Get bỏ lưu công việc
    Route::get('/jobnotirc/unsaverc/{id_hosontd}', [JobseekerController::class, 'getUnSaveRc'])->name('js_getunsaverc');
    //Check tin mới từ nhà tuyển dụng
    Route::get('/jobnotirc/checknewjob/{id_ntddaluu}', [JobseekerController::class, 'getJobNotiRCCheck'])->name('js_getcheckrcnewjob');
    //Trang Thông báo công việc - Bộ lọc
    Route::get('/jobnotifilter', [JobseekerController::class, 'getJobNotiFilter'])->name('js_jobnotifilter');
    //Thêm bộ lọc tìm kiếm
    Route::post('/jobnotifilter/addfilter', [JobseekerController::class, 'postAddFilterNoti'])->name('js_postaddfilternoti');
    //Chỉnh Sửa bộ lọc tìm kiếm
    Route::post('/jobnotifilter/editfilter/{id_goiy}', [JobseekerController::class, 'postEditFilterNoti'])->name('js_posteditfilternoti');
    //Xoá bộ lọc tìm kiếm
    Route::post('/jobnotifilter/deletefilter/{id_goiy}', [JobseekerController::class, 'postDeleteFilterNoti'])->name('js_postdeletefilternoti');
    //Check tin mới từ bộ lọc
    Route::get('/jobnotifilter/checknewjob/{id_goiy}', [JobseekerController::class, 'getJobNotiFLCheck'])->name('js_getcheckflnewjob');

    //------------------- Account -------------------
    //Trang chỉnh sửa thông tin tài khoản
    Route::get('/security', [JobseekerController::class, 'getSecurity'])->name('js_security');
    //Xử lý cập nhật mật khẩu
    Route::post('/security/updatepass', [JobseekerController::class, 'postUpdatepass'])->name('js_postUpdatepass');
    //Xử lý cập nhật email
    Route::post('/security/updateemail', [JobseekerController::class, 'postUpdateemail'])->name('js_postUpdateemail');
    //Đăng xuất
    Route::get('/logout', [JobseekerController::class, 'getLogout'])->name('js_logout');


    //------------------- Profile and Support -------------------
    Route::get('/editprofile', [JobseekerController::class, 'getEditProfile'])->name('js_editprofile');
    //Xử lý chỉnh sửa thông tin
    Route::post('/editprofile/editinfo', [JobseekerController::class, 'postEditInfo'])->name('js_postEditinfo');
    //Xử lý thêm học vấn
    Route::post('/editprofile/addstudy', [JobseekerController::class, 'postAddStudy'])->name('js_postAddStudy');
    //Xử lý chỉnh sửa học vấn
    Route::post('/editprofile/editstudy/{id_hocvan}', [JobseekerController::class, 'postEditStudy'])->name('js_postEditStudy');
    //Xử lý xoá học vấn
    Route::post('/editprofile/deletestudy/{id_hocvan}', [JobseekerController::class, 'postDeleteStudy'])->name('js_postDeleteStudy');
    //Xử lý thêm kinh nghiệm
    Route::post('/editprofile/addexp', [JobseekerController::class, 'postAddExp'])->name('js_postAddExp');
    //Xử lý chỉnh sửa kinh nghiệm
    Route::post('/editprofile/editexp/{id_kinhnghiem}', [JobseekerController::class, 'postEditExp'])->name('js_postEditExp');
    //Xử lý xoá kinh nghiệm
    Route::post('/editprofile/deleteexp/{id_kinhnghiem}', [JobseekerController::class, 'postDeleteExp'])->name('js_postDeleteExp');
    //Xử lý thêm ngoại ngữ
    Route::post('/editprofile/addlanguage', [JobseekerController::class, 'postAddLanguage'])->name('js_postAddLanguage');
    //Xử lý chỉnh sửa ngoại ngữ
    Route::post('/editprofile/editlanguage/{id_ngoaingu}', [JobseekerController::class, 'postEditLanguage'])->name('js_postEditLanguage');
    //Xử lý xoá ngoại ngữ
    Route::post('/editprofile/deletelanguage/{id_ngoaingu}', [JobseekerController::class, 'postDeleteLanguage'])->name('js_postDeleteLanguage');
});




