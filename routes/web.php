<?php

use App\Http\Controllers\Admin\HocsinhController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\InfoAdminController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MainController as ControllersMainController;
use App\Http\Controllers\ProductHomeController;
use App\Models\Hocsinh;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
Route::post('/create_info_admin/{id}', [InfoAdminController::class, 'create_info_admin']);
Route::post('/create_password_admin/{id}', [InfoAdminController::class, 'create_password_admin']);

Route::middleware(['auth'])->group(function () {

  Route::prefix('admin')->group(function () {

    Route::get('/', [MainController::class, 'index'])->name('admin');
    Route::get('/main', [MainController::class, 'index']);


    // Đăng xuất 
    Route::get('/admin-dangxuat', [LoginController::class, 'admin_dangxuat']);
    // Thông tin admin
    Route::get('/admin-info', [InfoAdminController::class, 'admin_info']);
    // show view đổi mật khẩu
    Route::get('/edit-user', [InfoAdminController::class, 'edit_user']);
    // Tiến hành đổi mật khẩu Admin
    Route::post('/updatePasswordAdmin/{user}', [InfoAdminController::class, 'updatePassword_Admin']);
    //shơ view đổi thông tin cá nhân ADmin
    Route::get('/edit-info-admin/{infoAdmin}', [InfoAdminController::class, 'edit_info_admin']);
    //tiến hành đổi thông tin các nhân admin
    Route::post('/edit-info-admin/{infoAdmin}', [InfoAdminController::class, 'updateInfoAdmin']);
    // tiến hành khởi tạo thông tin cá nhân admin




    //Menu co show - add
    Route::prefix('menus')->group(function () {
      Route::get('add', [MenuController::class, 'create']);
      Route::POST('add', [MenuController::class, 'store']);
      Route::get('list', [MenuController::class, 'show']);

      Route::DELETE('destroy', [MenuController::class, 'destroy']);
      Route::get('destroy1/{menu}', [MenuController::class, 'destroy1']);
      Route::get('edit/{menu}', [MenuController::class, 'showedit']);
      Route::POST('edit/{menu}', [MenuController::class, 'updatedanhmuc']);
      Route::get('editactive/{menu}', [MenuController::class, 'updateactive']);

      // hoc sinh
      Route::get('addhocsinh', [HocsinhController::class, 'create']);
      Route::POST('addhocsinh', [HocsinhController::class, 'store']);
      Route::get('listhocsinh', [HocsinhController::class, 'listhocsinh']);
      Route::DELETE('delete', [HocsinhController::class, 'delete']);
      Route::get('ediths/{hocsinh}', [HocsinhController::class, 'showediths']);
      Route::POST('ediths/{hocsinh}', [HocsinhController::class, 'updatehocsinh']);
      Route::get('updateactivehs/{hocsinh}', [HocsinhController::class, 'updateactivehs']);
    });
    // product
    Route::prefix('products')->group(function () {
      Route::get('add', [ProductController::class, 'addproduct']);
      Route::POST('add', [ProductController::class, 'createproduct']);
      Route::get('list', [ProductController::class, 'listproduct']);
      Route::get('productactive/{product}', [ProductController::class, 'productactive']);
      //ajax
      Route::post('/update-active-product', [ProductController::class, 'updateActivePRodcut']);

      Route::get('deleteproduct/{product}', [ProductController::class, 'deleteproduct']);
      Route::get('removeproduct', [ProductController::class, 'removeproduct']);
      Route::get('editproduct/{product}', [ProductController::class, 'editproduct']);
      Route::get('editproductimage/{product}', [ProductController::class, 'editproductimage']);

      Route::post('/change-image-product/{id}', [ProductController::class, 'changeImageProductAjax']);
      // xóa hình ảnh chi tiết sản phẩm bằng ajax ở trang list product 
      Route::post('/delete-image-product/{id}', [ProductController::class, 'deleteImageProductAjax']);

      //Thêm hình ảnh chi tiết của sản phẩm bằng route
      Route::post('/add-images-product/{id}', [ProductController::class, 'add_images_product']);

      Route::POST('editproduct/{product}', [ProductController::class, 'updateproduct']);
    });

    //Slider
    Route::prefix('sliders')->group(function () {
      Route::get('add', [SliderController::class, 'addslider']);
      Route::POST('add', [SliderController::class, 'createslider']);
      Route::get('list', [SliderController::class, 'listproduct']);
      Route::get('slidertactive/{slider}', [SliderController::class, 'slidertactive']);
      Route::get('deleteslider/{slider}', [SliderController::class, 'deleteslider']);
      // Route::get('removeproduct',[ProductController::class,'removeproduct']);
      Route::get('editslider/{slider}', [SliderController::class, 'editslider']);
      Route::POST('editslider/{slider}', [SliderController::class, 'updateslider']);
    });

    Route::prefix('order')->group(function () {
      Route::get('list', [OrderController::class, 'index']);
      Route::get('vieworder/{order}', [OrderController::class, 'vieworder']);
    });

    //Upload image product
    Route::post('/upload/services', [UploadController::class, 'store']);
    // upload nhieu image
    Route::post('/upload/services/images', [UploadController::class, 'stores']);

    //upload image slider
    Route::post('/upload/slider', [UploadController::class, 'store_slider']);
    // avatarAdmin
    Route::post('/upload/avatarAdmin', [UploadController::class, 'store_avatarAdmin']);
  });
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/test', [HomeController::class, 'trangtest']);

// Route::POST('/services/load-product111', [HomeController::class, 'loadProduct']);
// Route::get('admin1/user1', [LoginController::class, 'index']);
Route::get('/danh-muc/{id}-{slug}.html', [ProductHomeController::class, 'productMenu']);
//xem chi tiết sản phẩm từ main
Route::get('/san-pham/{id}-{slug}.html', [ProductHomeController::class, 'detailProduct']);

// Gio hang
// hàm này thêm sản phẩm vào giỏ hàng- từ trang details
Route::post('/add-cart', [CartController::class, 'addcart']);
// show. chuyển vào trang giỏ hàng
Route::get('/addcart', [CartController::class, 'show']);

Route::get('/update-cart', [CartController::class, 'updatecart']);
Route::get('/cartdelete/{id}', [CartController::class, 'deletecart']);
Route::get('/deleteall-cart', [CartController::class, 'deleteall']);
// Thanh toan
Route::get('/showcheckout1', [CheckoutController::class, 'showcheckout']);
Route::get('/showcheckoutheader', [CheckoutController::class, 'showcheckoutheader']);
Route::post('/checkout1', [CheckoutController::class, 'checkout']);

// dang nhap - dang ky
Route::post('/dangnhap', [HomeController::class, 'dangnhap']);
Route::post('/dangky', [HomeController::class, 'dangky']);
Route::get('/dang-xuat', [HomeController::class, 'dangxuat']);

// Thong tin khach hang
Route::get('/infoCustomer/{customer}', [HomeController::class, 'infoCustomer']);
Route::get('/viewOrder/{order}', [HomeController::class, 'viewOrder']);


// 2 cái này load more sản phẩm product ở home
Route::post('/loadmore', [HomeController::class, 'loadmore']);
Route::post('/load-product', [HomeController::class, 'loadmoreProduct']);


// ajax js cái đầu đổi trạng thái Active sản phẩm. cái 2 xóa sản phẩm
Route::post('/load-product1111/{id}/{idActive}', [HomeController::class, 'loadmoreProduct11111']);
Route::post('/delete-product/{id}', [ProductController::class, 'deleteProductAjax']);

// ajax them san pham tu main
Route::post('/addProductCart/{id}/{num}', [CartController::class, 'addProductCart']);

// Menu


// test call API từ front end
Route::get('/callapi', [LoginController::class, 'call_api']);


//test gửi email
Route::get('/test-mail/{id}', [HomeController::class, 'testMail']);


//test nhiều image
Route::get('/testimage', [UploadController::class, 'testimage']);
Route::get('/testimagestore', [UploadController::class, 'testimagestore']);
