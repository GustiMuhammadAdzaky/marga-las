<?php




use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\GaleriAdminController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\KategoriLayananAdminController;
use App\Http\Controllers\Admin\KontakAdminController;
use App\Http\Controllers\Admin\LayananAdminController;
use App\Http\Controllers\Admin\TransaksiAdminController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\kontakConntroller;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\SpearPartController;
use App\Http\Controllers\TentangController;
use App\Models\KontakModel;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/home', [HomeController::class, 'index']);
Route::get('/layanan', [LayananController::class, 'index']);
Route::get('/tentang', [TentangController::class, 'index']);
Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('/kontak', [kontakConntroller::class, 'index'])->name("kontak");




// admin
Route::get('/dashboard', [DashboardAdminController::class, 'index'])->middleware('checkRole:admin');
// Kategori
Route::get('/kategori_admin', [KategoriLayananAdminController::class, 'index'])->name("kategori_admin");
Route::get('/tambah_data_kategori_layanan', [KategoriLayananAdminController::class, 'tambahData']);
Route::post('/tambah_data_katogri_layanan/store', [KategoriLayananAdminController::class, 'store']);
Route::get('/kategori_admin/{id}/edit', [KategoriLayananAdminController::class, 'edit'])->name('kategori_layanan.edit');
Route::put('/kategori_admin/{id}', [KategoriLayananAdminController::class, 'update'])->name('kategori_layanan.update');
Route::delete('/kategori_admin/{id}', [KategoriLayananAdminController::class, 'destroy'])->name('kategori_layanan.destroy');

// layanan
Route::get('/layanan_admin', [LayananAdminController::class, 'index'])->name("layanan_admin");
Route::get('/tambah_data_layanan', [LayananAdminController::class, 'tambahData']);
Route::post('/tambah_data_layanan/store', [LayananAdminController::class, 'store']);
Route::get('/layanan/{id}/edit', [LayananAdminController::class, 'edit'])->name('layanan.edit');
Route::put('/layanan/{id}', [LayananAdminController::class, 'update'])->name('layanan.update');
Route::delete('/layanan/{id}', [LayananAdminController::class, 'destroy'])->name('layanan.destroy');

// galeri
Route::get('/galeri_admin', [GaleriAdminController::class, 'index']);
Route::get('/tambah_galeri', [GaleriAdminController::class, 'tambahData'])->name("tambah_galeri");
Route::post('galeri_admin/store', [GaleriAdminController::class, 'store']);




// Cart
// Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


// Transaksi User
Route::post('cart/checkout', [TransaksiController::class, 'checkout'])->name('cart.checkout');
Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi/destroy', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');


// Transaksi Admin
Route::get('transaksi_admin', [TransaksiAdminController::class, 'index'])->name("transaksi.admin");
Route::post('/update-status', [TransaksiAdminController::class, 'updateStatus'])->name('update.status');


// invoice controller
Route::get('/invoice', [InvoiceController::class, 'index'])->name("invoice.admin");
Route::post('/invoice/store', [InvoiceController::class, 'store'])->name("store_invoice.admin");



// Kontak Admin controller
Route::get('/kontak_admin', [KontakAdminController::class, 'index'])->name("kontak.admin");
Route::post('/kontak_admin/store', [KontakAdminController::class, 'store'])->name("kontak_store.admin");
Route::delete('/kontak_admin/{id}', [KontakAdminController::class, 'destroy'])->name('kontak.destroy');
