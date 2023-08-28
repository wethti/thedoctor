<?php
namespace App\Http\Controllers;
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

Route::get('/about', function () {
    return view('about');
});

Route::get('/', function () {
    return view('about');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('/find', [AboutController::class, 'find'])->name('find');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::post('/contacts/submit', [ContactController::class, 'submitForm'])->name('contact.submit');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/pages', [AdminController::class, 'pages'])->name('admin.pages');
Route::post('/admin/page/store', [PageController::class, 'store'])->name('page.store');
Route::post('/admin/page/update', [PageController::class, 'update'])->name('page.update');
Route::post('/admin/page/delete', [PageController::class, 'delete'])->name('page.delete');
Route::get('/sitemap', function () {return view('admin.sitemap');})->name('sitemap');
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.product.index');
Route::get('/admin/product/add', [ProductController::class, 'create'])->name('admin.product.add');
Route::get('/admin/product/{id}', [ProductController::class, 'adminShow'])->name('admin.product.show');
Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
Route::post('/admin/product/upload', [ProductController::class, 'upload'])->name('admin.product.upload');
Route::delete('/admin/product/{id}/delete', [ProductController::class, 'destroy'])->name('admin.product.delete');

Route::post('/menutabs/store', [MenutabController::class, 'store'])->name('menutab.store');
Route::post('/menutabs/update', [MenutabController::class, 'update'])->name('menutab.update');
Route::post('/menutabs/delete', [MenutabController::class, 'delete'])->name('menutab.delete');

Route::post('/sections/store', [SectionController::class, 'store'])->name('section.store');
Route::post('/sections/duplicate/{id}', [SectionController::class, 'duplicate'])->name('section.duplicate');
Route::post('/sections/update', [SectionController::class, 'update'])->name('section.update');
Route::post('/sections/delete', [SectionController::class, 'delete'])->name('section.delete');

Route::get('/subsections', [SubsectionController::class, 'index'])->name('subsection.index');
Route::post('/subsections/store', [SubsectionController::class, 'store'])->name('subsection.store');
Route::post('/subsections/update', [SubsectionController::class, 'update'])->name('subsection.update');
Route::post('/subsections/delete', [SubsectionController::class, 'delete'])->name('subsection.delete');

Route::get('/test', [AdminController::class, 'test']);