<?php

use App\Http\Controllers\CheckPaymentController;
use App\Livewire\Bank;
use App\Livewire\ProductDetail1;
use App\Livewire\Shop;
use App\Livewire\Thankyou;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Livewire\ProductDetail;
use App\Livewire\About;
use App\Livewire\Contact;
use App\Livewire\ShippingPolicy;
use App\Livewire\PrivacyPolicy;
use App\Livewire\PaymentPolicy;
use App\Livewire\Transactions;
use App\Livewire\WarrantyPolicy;
use App\Livewire\ReturnPolicy;
use App\Livewire\OrderTracking;
use App\Livewire\Blog;
use App\Livewire\BlogPost;
use App\Livewire\Account;
use App\Livewire\AccountOrders;
use App\Livewire\ChangePassword;
use App\Livewire\AccountAddresses;
use App\Livewire\AccountOrdersDetail;
use App\Livewire\Login;
use App\Livewire\Logout;
use App\Livewire\Register;
use App\Livewire\New\Home as NewHome;
use App\Livewire\New\Search as NewSearch;
use App\Livewire\New\Category as NewCategory;
use App\Livewire\New\ProductDetail as NewProductDetail;
use App\Livewire\New\Cart as NewCart;
use App\Livewire\New\Checkout as NewCheckout;
use App\Livewire\New\Payment as NewPayment;
use App\Livewire\New\GioiThieu as NewGioiThieu;
use App\Livewire\New\LienHe as NewLienHe;
use App\Livewire\New\ThacMacKhiDatHoa as NewThacMacKhiDatHoa;
use App\Livewire\New\ChinhSachBaoMat as NewChinhSachBaoMat;
use App\Livewire\New\ChinhSachDoiTra as NewChinhSachDoiTra;
use App\Livewire\New\ChiNhanh as NewChiNhanh;
use App\Livewire\New\HuongDanDatHoa as NewHuongDanDatHoa;
use App\Livewire\New\HuongDanThanhToan as NewHuongDanThanhToan;
use App\Livewire\New\QuyDinhVanChuyen as NewQuyDinhVanChuyen;
use App\Livewire\New\YNghiaHoa as NewYNghiaHoa;
use App\Livewire\New\DoiTacTieuBieu as NewDoiTacTieuBieu;
use App\Livewire\New\DanhGiaHinhAnhThucTe as NewDanhGiaHinhAnhThucTe;
use App\Livewire\New\KhuyenMai as NewKhuyenMai;
use App\Livewire\New\CayLanChi as NewCayLanChi;
use App\Livewire\New\CuaHang as NewCuaHang;
use App\Livewire\New\Thanks as NewThanks;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', NewHome::class);
Route::get('/search', NewSearch::class);
Route::get('/categories/{slug}', NewCategory::class);
Route::get('/product/{slug}', NewProductDetail::class);
Route::get('/gio-hang', NewCart::class);
Route::get('/thanh-toan', NewCheckout::class);
Route::get('/don-hang-da-nhan/cam-on-quy-khach', NewPayment::class);
Route::get('/gioi-thieu', NewGioiThieu ::class);
Route::get('/lien-he', NewLienHe::class);
Route::get('/thac-mac-khi-dat-hoa', NewThacMacKhiDatHoa::class);
Route::get('/chinh-sach-bao-mat', NewChinhSachBaoMat::class);
Route::get('/chinh-sach-doi-tra', NewChinhSachDoiTra::class);
Route::get('/chi-nhanh', NewChiNhanh::class);
Route::get('/huong-dan-dat-hoa', NewHuongDanDatHoa::class);
Route::get('/huong-dan-thanh-toan', NewHuongDanThanhToan::class);
Route::get('/quy-dinh-van-chuyen', NewQuyDinhVanChuyen::class);
Route::get('/y-nghia-hoa', NewYNghiaHoa::class);
Route::get('/doi-tac-tieu-bieu', NewDoiTacTieuBieu::class);
Route::get('/danh-gia-hinh-anh-thuc-te', NewDanhGiaHinhAnhThucTe::class);
Route::get('/khuyen-mai', NewKhuyenMai::class);
Route::get('/cay-lan-chi', NewCayLanChi::class);
Route::get('/cua-hang', NewCuaHang::class);
Route::get('/thanks/{code}', NewThanks::class);
Route::get('/checkpayment/{orderCode}', [CheckPaymentController::class, 'checkPayment']);




// Route::get('/about', About::class);
// Route::get('/contact', Contact::class);
// Route::get('/chinh-sach-van-chuyen', ShippingPolicy::class);
// Route::get('/chinh-sach-bao-mat', PrivacyPolicy::class);
// Route::get('/chinh-sach-thanh-toan', PaymentPolicy::class);
// Route::get('/chinh-sach-bao-hanh', WarrantyPolicy::class);
// Route::get('/chinh-sach-doi-tra-hang-hoan-tien', ReturnPolicy::class);
// Route::get('/apps/kiem-tra-don-hang', OrderTracking::class);
// Route::get('/blogs', Blog::class);
// Route::get('/blog/{slug}', BlogPost::class);


// Account routes

// Route::middleware([CheckLogin::class])->group(function () {
//     Route::get('/account', Account::class);
//     Route::get('/account/orders', AccountOrders::class);
//     Route::get('/account/orders/{orderCode}', AccountOrdersDetail::class);
//     Route::get('/account/changepassword', ChangePassword::class);
//     // Route::get('/account/addresses', AccountAddresses::class);
//     Route::get('/account/logout', Logout::class);
//     Route::get('/checkout', Checkout::class);
//     Route::get('/thanks/{orderCode}', Thankyou::class)->name('thanks');
//     Route::get('/bank/{orderCode}', Bank::class)->name('bank');
// });




// Route::get('/shop', Shop::class);
// Route::get('/product/{slug}', ProductDetail::class);
// Route::get('/product1/{slug}', ProductDetail1::class);



// Route::middleware(RedirectIfAuthenticated::class)->group(function () {
//     Route::get('/auth/google', [Login::class, 'redirectToProvider'])->name('google.login');
//     Route::get('/auth/google/register', [Register::class, 'redirectToProvider'])->name('google.register');
//     Route::get('/auth/google/callback', [Login::class, 'handleGoogleCallback']);
//     Route::get('/account/login', Login::class);
//     Route::get('/account/register', Register::class);
// });
// Route::get('/checkpayment/{orderCode}', [CheckPaymentController::class, 'checkPayment']);
Route::get('/transactions', Transactions::class);
