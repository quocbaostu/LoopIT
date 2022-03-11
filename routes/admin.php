<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admins\AdminController;
use App\Http\Controllers\admins\auth\AuthController;


// <<<<<<<<<< Admin Route >>>>>>>>>>>>>
Route::middleware('IsLoginAdmin')->group(function () {
    //Login Admin
    Route::get('/login', [AuthController::class, 'getLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('admin.login_post');
});

Route::middleware('AuthAdmin')->group(function () {
    // Admin trang chủ
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    //Đăng xuất Admin
    Route::get('/logout', [AuthController::class, 'getLogout'])->name('admin.logout');

//Quản lý tài khoản
    // Quản lý thông tin cá nhân
    Route::get('/change-profile', [AdminController::class, 'getChangeProfile'])->name('admin.change_profile');
    Route::post('/change-profile', [AdminController::class, 'postChangeProfile'])->name('admin.change_profile_post');
    // Đổi mật khẩu
    Route::get('/change-password', [AdminController::class, 'getChangePassword'])->name('admin.change_password');
    Route::post('/change-password', [AdminController::class, 'postChangePassword'])->name('admin.change_password_post');

// Quản lý admin   
    // Danh sách admin
    Route::get('/administrator-list', [AdminController::class, 'getAdminList'])->name('admin.list_admin');
    // Thêm tài khoản admin mới
    Route::get('/administrator-list/create-acc', [AdminController::class, 'getCreateAdminAcc'])->name('admin.create_admin_acc');
    Route::post('/administrator-list/create-acc', [AdminController::class, 'postCreateAdminAcc'])->name('admin.create_admin_acc_post');
    // Sửa thông tin admin
    Route::get('/administrator-list/update-acc/{id_qtv}', [AdminController::class, 'getUpdateAdminAcc'])->name('admin.update_admin_acc');
    Route::post('/administrator-list/update-acc', [AdminController::class, 'postUpdateAdminAcc'])->name('admin.update_admin_acc_post');
    // Xóa tài khoản admin
    Route::get('/administrator-list/delete-acc/{id_qtv}', [AdminController::class, 'deleteAdminAcc'])->name('admin.delete_admin_acc');
    // Danh sách chức vụ
    Route::get('/position-list', [AdminController::class, 'getPositionList'])->name('admin.list_position');
    // Thêm chức vụ
    Route::get('/position-list/create-position', [AdminController::class, 'getCreatePosition'])->name('admin.create_position');
    Route::post('/position-list/create-position', [AdminController::class, 'postCreatePosition'])->name('admin.create_position_post');
    // Sửa chức vụ
    Route::get('/position-list/update-position/{id_chucvu}', [AdminController::class, 'getUpdatePosition'])->name('admin.update_position');
    Route::post('/position-list/update-position', [AdminController::class, 'postUpdatePosition'])->name('admin.update_position_post');
    // Xóa chức vụ
    Route::get('/position-list/delete-position/{id_chucvu}', [AdminController::class, 'deletePosition'])->name('admin.delete_position');
    

// Quản lý dịch vụ
    // Danh sách dịch vụ của trang
    Route::get('/list-services', [AdminController::class, 'getListServices'])->name('admin.list_services');
    // Thêm dịch vụ mới
    Route::get('/create-services', [AdminController::class, 'getCreateServices'])->name('admin.create_services');
    Route::post('/create-services', [AdminController::class, 'postCreateServices'])->name('admin.create_services_post');
    // Cập nhật dịch vụ
    Route::get('/update-services/{id_dichvu}', [AdminController::class, 'getUpdateServices'])->name('admin.update_services');
    Route::post('/update-services', [AdminController::class, 'postUpdateServices'])->name('admin.update_services_post');
    // Xóa dịch vụ
    Route::post('/delete-services', [AdminController::class, 'postDeleteServices'])->name('admin.delete_services_post');
    // Danh sách đơn hàng
    Route::get('/list-order', [AdminController::class, 'getListOrder'])->name('admin.list_order');
    // Duyệt đã thanh toán chuyển khoản
    Route::post('/apply-order', [AdminController::class, 'applyOrder'])->name('admin.apply_order');
    // Không duyệt
    Route::post('/cancel-order', [AdminController::class, 'cancelOrder'])->name('admin.cancel_order');
    
    
    
    
    
// Quản lý nhà tuyển dụng  
    // Danh sách nhà tuyển dụng
    Route::get('/recruiter-manager/list-recruiter', [AdminController::class, 'getListRecruiter'])->name('admin.recruiter.list_recruiter');
    // Khóa nhà tuyển dụng
    Route::post('/recruiter-manager/lock-recruiter', [AdminController::class, 'lockRecruiter'])->name('admin.recruiter.lock');
    // Mở khóa nhà tuyển dụng
    Route::post('/recruiter-manager/unlock-recruiter', [AdminController::class, 'unlockRecruiter'])->name('admin.recruiter.unlock');
    // Xóa nhà tuyển dụng
    Route::post('/recruiter-manager/delete-recruiter', [AdminController::class, 'deleteRecruiter'])->name('admin.recruiter.delete');

    // Danh sách tin tuyển dụng
    Route::get('/recruiter-manager/list-recruitment-pending', [AdminController::class, 'getListRecruitmentPending'])->name('admin.recruiter.list_recruitment_pending');
    // Danh sách tin tuyển dụng bị báo cáo
    Route::get('/recruiter-manager/list-recruitment-reported', [AdminController::class, 'getListRecruitmentReported'])->name('admin.recruiter.list_recruitment_reported');
    // Khóa tin tuyển dụng bị báo cáo
    Route::get('/recruiter-manager/lock-recruitment-reported/{id_tintd}', [AdminController::class, 'lockRecruitment'])->name('admin.recruiter.lock_recruitment');
    // Mở khóa tin tuyển dụng bị báo cáo
    Route::get('/recruiter-manager/unlock-recruitment-reported/{id_tintd}', [AdminController::class, 'unlockRecruitment'])->name('admin.recruiter.unlock_recruitment');
    
    
// Quản lý ứng viên  
    // Danh sách ứng viên 
    Route::get('/jobseeker-manager/list-jobseeker', [AdminController::class, 'getListJobseeker'])->name('admin.jobseeker.list_jobseeker');
    // Danh sách cv ứng viên public
    Route::get('/jobseeker-manager/list-cv-public', [AdminController::class, 'getListCVPublic'])->name('admin.jobseeker.list_cv_public');
    // Duyệt thẻ Từ khóa của CV public 
    Route::post('/jobseeker-manager/list-cv-public', [AdminController::class, 'postApplyTagsCV'])->name('admin.jobseeker.apply_tags_cv');
    

});
