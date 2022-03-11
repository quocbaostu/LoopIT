<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\recruiter\RecruiterController;
use App\Http\Controllers\recruiter\ServicesController;
use App\Http\Controllers\recruiter\RecruitmentController;

use App\Http\Controllers\recruiter\auth\AuthController;
use App\Http\Controllers\recruiter\SearchCVController;

// <<<<<<<<<< Nhà tuyển dụng Route >>>>>>>>>>>>>

Route::middleware('IsLoginRecruiter')->group(function () {
    //Login NTD
    Route::get('/login', [AuthController::class, 'getLogin'])->name('recruiter.login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('recruiter.login_post');
    //Register NTD
    Route::get('/register', [AuthController::class, 'getRegister'])->name('recruiter.register');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('recruiter.register_post');
    //Xác thực email sau khi đăng ký
    Route::get('/actived/{taiKhoanNTD}/{token}', [AuthController::class, 'activedEmail'])->name('recruiter.actived_email');
    //Gửi lại email Xác thực
    Route::get('/verify-mail', [AuthController::class, 'getSendMailAgain'])->name('recruiter.send_mail_again');
    Route::post('/verify-mail', [AuthController::class, 'postSendMailAgain'])->name('recruiter.send_mail_again_post');
    //Quên mệt Khẩu
    Route::get('/forget-password', [AuthController::class, 'getForgetPassword'])->name('recruiter.forget_password');
    Route::post('/forget-password', [AuthController::class, 'postForgetPassword'])->name('recruiter.forget_password_post');
    //Đổi mật khẩu
    Route::get('/change-password/{taiKhoanNTD}/{token}', [AuthController::class, 'getChangePassword'])->name('recruiter.change_password');
    Route::post('/change-password', [AuthController::class, 'postChangePassword'])->name('recruiter.change_password_post');


});

Route::middleware('AuthRecruiter')->group(function (){
    //Home
    Route::get('/', [RecruiterController::class, 'index'])->name('recruiter.home');
    //Logout NTD
    Route::get('/logout', [AuthController::class, 'getLogout'])->name('recruiter.logout');

//Quản lý tài khoản NTD
    // Thông tin cá nhân
    Route::get('/account-manage/my-info', [RecruiterController::class, 'getMyInfo'])->name('recruiter.account_my_info');
    Route::post('/account-manage/my-info', [RecruiterController::class, 'postMyInfo'])->name('recruiter.account_my_info_post');
    // Thay đổi mật khẩu
    Route::get('/account-manage/change-password', [RecruiterController::class, 'getAccChangePass'])->name('recruiter.account_change_password');
    Route::post('/account-manage/change-password', [RecruiterController::class, 'postAccChangePass'])->name('recruiter.account_change_password_post');
    // Thông tin hồ sơ công ty
    Route::get('/company-profile/company-info', [RecruiterController::class, 'getCompanyInfo'])->name('recruiter.company_info');
    Route::post('/company-profile/company-info', [RecruiterController::class, 'postCompanyInfo'])->name('recruiter.company_info_post');

//Quản lý dịch vụ
    // Danh sách dịch vụ đã đăng ký
    Route::get('/my-services', [ServicesController::class, 'getMyServices'])->name('recruiter.my_services');
    // Xóa dịch vụ đã đăng ký hết hạn
    Route::get('/my-services/delete-services/{id_dvdadk}', [ServicesController::class, 'deleteServices'])->name('recruiter.delete_services');

    // Danh sách dịch vụ để mua
    Route::get('/list-services', [ServicesController::class, 'getListServices'])->name('recruiter.list_services');
    //Ajax Add to cart
    Route::get('/list-services/add-to-cart/{id_dichvu}', [ServicesController::class, 'addToCart'])->name('recruiter.add_to_cart');
    //Check out xem giỏ hàng
    Route::get('/cart', [ServicesController::class, 'getCart'])->name('recruiter.cart');
    //Ajax Update cart
    Route::patch('/cart/update-cart', [ServicesController::class, 'updateCart'])->name('recruiter.update_cart');
    //Ajax Delete cart
    Route::delete('/cart/delete-cart', [ServicesController::class, 'deleteCart'])->name('recruiter.delete_cart');
    // Trang thanh toán
    Route::get('/check-out', [ServicesController::class, 'getCheckOut'])->name('recruiter.check_out');
    // Lưu đơn hàng
    Route::get('/save-order/{payment_success}', [ServicesController::class, 'saveOrder'])->name('recruiter.save_order');
    // Thanh toán paypal success
    Route::get('/buy-success', [ServicesController::class, 'getBuySuccess'])->name('recruiter.buy_success');
    // Danh sách Lịch sử đơn hàng
    Route::get('/my-ordered', [ServicesController::class, 'getHistoryOrders'])->name('recruiter.history_orders');
    // Lưu đơn hàng chuyển khoản
    Route::post('/save-order-transfer', [ServicesController::class, 'saveOrderTransfer'])->name('recruiter.save_order_transfer');



//Quản lý đăng tuyển
    // Danh sách tin tuyển dụng
    Route::get('/list-recruitment', [RecruitmentController::class, 'getListRecruitment'])->name('recruiter.list_recruitment');
    // Thêm tin tuyển dụng
    Route::get('/create-recruitment', [RecruitmentController::class, 'getCreateRecruitment'])->name('recruiter.create_recruitment');
    Route::post('/create-recruitment', [RecruitmentController::class, 'postCreateRecruitment'])->name('recruiter.create_recruitment_post');
    // Sửa tin tuyển dụng
    Route::get('/update-recruitment/{id_tintd}', [RecruitmentController::class, 'getUpdateRecruitment'])->name('recruiter.update_recruitment');
    Route::post('/update-recruitment', [RecruitmentController::class, 'postUpdateRecruitment'])->name('recruiter.update_recruitment_post');
    // Xóa tin tuyển dụng
    Route::get('/delete-recruitment/{id_tintd}', [RecruitmentController::class, 'deleteRecruitment'])->name('recruiter.delete_recruitment');
    // Đăng tin tuyển dụng
    Route::post('/posting-recruitment', [RecruitmentController::class, 'postingRecruitment'])->name('recruiter.posting_recruitment');
    // Hủy đăng tin tuyển dụng
    Route::post('/remove-posting-recruitment', [RecruitmentController::class, 'removePostingRecruitment'])->name('recruiter.remove_posting_recruitment');
    // Danh sách ứng viên đã ứng tuyển
    Route::get('/list-jobseeker-apply', [RecruitmentController::class, 'getListJobseekerApply'])->name('recruiter.list_jobseeker_apply');
    // Chi tiết CV ứng viên đã ứng tuyển
    Route::get('/detail-cv-jobseeker/{id_uv}/{id_cv}/{id_CVdaut}', [RecruitmentController::class, 'getDetailCVJobseeker'])->name('recruiter.detail_cv_jobseeker');
    //Đánh giá nhận xét CV
    Route::post('/reviews-cv', [RecruitmentController::class, 'postReviewsCV'])->name('recruiter.reviews_jobseeker_cv');


//Tìm kiếm hồ sơ ứng viên
    // Tìm kiếm và lọc hồ sơ CV ứng viên
    Route::get('/search/candidate-profile', [SearchCVController::class, 'searchCV'])->name('recruiter.cv_search');
    // Lưu Hồ Sơ CV ứng viên
    Route::get('/save-jobseeker-cv/{id_cv}', [SearchCVController::class, 'saveJobseekerCV'])->name('recruiter.save_jobseeker_cv');
    // Bỏ lưu hồ sơ ứng viên
    Route::get('/remove-save-jobseeker-cv/{id_cv}', [SearchCVController::class, 'removeSaveJobseekerCV'])->name('recruiter.remove_save_jobseeker_cv');
    // Xem chi tiết cv tại trang tìm kiếm
    Route::get('/candidate-profile/detail-cv/{id_cv}', [SearchCVController::class, 'getDetailCVSearch'])->name('recruiter.detail_cv_search');
    // Hiển thị thông tin được bảo vệ
    Route::post('/search/candidate-profile/detail-cv', [SearchCVController::class, 'postShowProtectedInfo'])->name('recruiter.show_protected_info');

// Quản lý hồ sơ ứng viên đã lưu và đã dùng điểm xem
    Route::get('/list-cv-save', [RecruiterController::class, 'getListCVSave'])->name('recruiter.list_cv_save');
    Route::get('/list-cv-view', [RecruiterController::class, 'getListCVView'])->name('recruiter.list_cv_view');



});
