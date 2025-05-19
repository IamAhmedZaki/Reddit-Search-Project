<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FontController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\RevisionsController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\YourDesignController;
use App\Http\Controllers\DesignConfigController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Email2Controller;
use App\Models\DesignConfig;

Route::get("admin/login", [LoginController::class, "login_view"])->name("login_view");
Route::post("admin/admin-login", [LoginController::class, "admin_login"])->name("admin_login");
Route::get('logout_admin', [LoginController::class, 'logout_admin'])->name('logout_admin');

Route::get("admin-dashboard", [AdminDashboardController::class, "admin_dashboard"])->name('admin-dashboard');

Route::get("admin-users", [UserController::class, "index"])->name("admin_usres");
Route::get("create-user", [UserController::class, "create"])->name("create_users");
Route::post("store-user", [UserController::class, "store"])->name("store_user");
Route::get("edit-user/{id}", [UserController::class, "edit"])->name("edit_users");
ROute::put("update_user/{id}", [UserController::class, "update"])->name('update_user');
Route::get("delete_user/{id}", [UserController::class, "delete"])->name('delete_user');

Route::get("edit-design/{id}", [DesignController::class, "edit_design"])->name("edit_design");
ROute::put("update_design/{id}", [DesignController::class, "update_design"])->name('update_design');
Route::get("delete_design/{id}", [DesignController::class, "delete_design"])->name('delete_design');
Route::get("design", [DesignController::class, "index"])->name('design');
Route::get("delete_userdesign/{id}", [DesignController::class, "delete_userdesign"])->name('delete_userdesign');
Route::get("delete_alldesign/{id}", [DesignController::class, "delete_alldesign"])->name('delete_alldesign');
Route::get("edit_design/{key}/{id}", [DesignController::class, "edit_design"])->name('edit_design');
Route::post("/clone-design/{cloneId}",[DesignController::class,'clone']);


Route::get('login', [UserLoginController::class, "login"])->name('login');
Route::post('login_submit', [UserLoginController::class, 'login_submit'])->name('login_submit');
Route::get('logout_user', [UserLoginController::class, 'logout_user'])->name('logout_user');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('update_profile', [ProfileController::class, 'update_profile'])->name('update_profile');


Route::get('dashbaord', [UserDashboardController::class, 'dashbaord'])->name('dashbaord');

Route::get('your-design', [YourDesignController::class, "index"])->name('your_design');
Route::get('all-design', [YourDesignController::class, "all_design"])->name('all_design');
Route::get('revision-design', [YourDesignController::class, "revisionDesign"])->name('revision_design');

Route::get("/", [WebsiteController::class, "index"])->name("index");


Route::get("/configuration", [DesignConfigController::class, "user_config"])->name("config");
Route::post("copy_url_clipboard", [DesignConfigController::class, 'copy_url_clipboard'])->name('copy_url_clipboard');
Route::post('/save-canvas', [DesignConfigController::class, 'saveCanvas'])->name('saveCanvas');
Route::post('/save-canvas-update', [DesignConfigController::class, 'saveCanvasUpdate'])->name('saveCanvasUpdate');
Route::post('/img-canvas', [DesignConfigController::class, 'canvaImgset'])->name('canvaImgset');
Route::post('/form-submitdesign', [DesignConfigController::class, 'formsubmitDesign'])->name('formsubmitDesign');
Route::post('/form-submitdesign-update', [DesignConfigController::class, 'formsubmitDesignUpdate'])->name('formsubmitDesignUpdate');
Route::get("base64-data", [DesignConfigController::class, 'getBase64Data'])->name('getBase64Data');
Route::get("view_design/{key}/{id}", [DesignConfigController::class, 'view_design'])->name('view_design');
Route::get("view_design/{Gkey}",[DesignConfigController::class,'expired_design']);
Route::post('/home-sizecolor', [DesignConfigController::class, 'homeSizeColor'])->name('homeSizeColor');
Route::post('/upload_images', [DesignConfigController::class, 'upload_images'])->name('upload_images');


Route::post('/upload-font', [FontController::class, 'uploadFont'])->name('uploadFont');
Route::post('/upload-font2', [FontController::class, 'uploadFont2'])->name('uploadFont2');
Route::get('/fonts', [FontController::class, 'fonts'])->name('fonts');
Route::get('/add_font', [FontController::class, 'add_font'])->name('add_font');
Route::get('/edit-font/{id}', [FontController::class, 'edit'])->name('edit_font');
Route::get('/delete-font/{id}', [FontController::class, 'delete'])->name('delete_font');
Route::post('/updateFont2', [FontController::class, 'updateFont2'])->name('updateFont2');



Route::middleware(['auth'])->group(function () {
    Route::get('/todos/{designId}',[TodoController::class,'index']);
    Route::post('/save-todo',[TodoController::class,'store']);
    Route::post('/update-todo/{todoId}',[TodoController::class,'update']);
    Route::post('/delete-todo/{todoId}',[TodoController::class,'delete']);
    Route::get("/get-incomplete-task",[TodoController::class,'getIncompleteTask']);
    
});


Route::get('/send-email-form',[Email2Controller::class,'index'])->name('send.email.form');
Route::post('/send-email',[Email2Controller::class,'sendEmail'])->name('send.email');