<?php

use App\Http\Controllers\AdminExpensePercentageController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\AdminArtCategoryController;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminBalanceProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminHashtagController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPriceController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminProductsPriceController;
use App\Http\Controllers\AdminSitemapController;
use App\Http\Controllers\AdminStatusJobController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProductCommentsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
//   Route::resource('/calculator', CalculatorController::class);

 Route::get('/ua/articles/Rozbir_sertyfikata_IFRA_po_katehoriiam', function () {
        return redirect('https://articles.madeis.com.ua/ua/articles/Rozbir_sertyfikata_IFRA_po_katehoriiam', 301);
    });
     Route::get('/ru/articles/Rozbir_sertyfikata_IFRA_po_katehoriiam', function () {
        return redirect('https://articles.madeis.com.ua/ru/articles/Rozbir_sertyfikata_IFRA_po_katehoriiam', 301);
    });
    
    Route::get('/ua/calculator', function () {
        return redirect('https://articles.madeis.com.ua/ua/calculator', 301);
    });
    
     Route::get('/ru/calculator', function () {
        return redirect('https://articles.madeis.com.ua/ru/calculator', 301);
    });
    
 Route::get('/ru/articles/Pravyla_dodavannya_aromatyzatoriv_u_visk', function () {
        return redirect('https://articles.madeis.com.ua/ru/articles/Pravyla_dodavannya_aromatyzatoriv_u_visk', 301);
    });

    Route::get('/ua/articles/Pravyla_dodavannya_aromatyzatoriv_u_visk', function () {
        return redirect('https://articles.madeis.com.ua/ua/articles/Pravyla_dodavannya_aromatyzatoriv_u_visk', 301);
    });
    
     Route::get('/ua/articles/', function () {
        return redirect('https://articles.madeis.com.ua/ua/', 301);
    });
     Route::get('/ru/articles/', function () {
        return redirect('https://articles.madeis.com.ua/ru/', 301);
    });
    
    
    Route::get('/ru/articles/Vmist_vanilinu_u_viddushkakh', function () {
        return redirect('https://articles.madeis.com.ua/ru/articles/Vmist_vanilinu_u_viddushkakh', 301);
    });
    Route::get('/ua/articles/Vmist_vanilinu_u_viddushkakh', function () {
        return redirect('https://articles.madeis.com.ua/ua/articles/Vmist_vanilinu_u_viddushkakh', 301);
    });
    Route::get('/ru/articles/vydy_voskiv_dlya_svichok_plyusy_ta_minusy', function () {
        return redirect('https://articles.madeis.com.ua/ru/articles/vydy_voskiv_dlya_svichok_plyusy_ta_minusy', 301);
    });
    Route::get('/ua/articles/vydy_voskiv_dlya_svichok_plyusy_ta_minusy', function () {
        return redirect('https://articles.madeis.com.ua/ua/articles/vydy_voskiv_dlya_svichok_plyusy_ta_minusy', 301);
    });
    Route::get('/ru/articles/osinni_aromaty_dlia_svichok', function () {
        return redirect('https://articles.madeis.com.ua/ru/articles/osinni_aromaty_dlia_svichok', 301);
    });
    Route::get('/ua/articles/osinni_aromaty_dlia_svichok', function () {
        return redirect('https://articles.madeis.com.ua/ua/articles/osinni_aromaty_dlia_svichok', 301);
    });
    Route::get('/ru/articles/Shcho_take_sertyfikat_IFRA', function () {
        return redirect('https://articles.madeis.com.ua/ru/articles/Shcho_take_sertyfikat_IFRA', 301);
    });
    Route::get('/ua/articles/Shcho_take_sertyfikat_IFRA', function () {
        return redirect('https://articles.madeis.com.ua/ua/articles/Shcho_take_sertyfikat_IFRA', 301);
    });
   
   
   
Route::get('/',  function () {
   return redirect(app()->getLocale());
});
Route::group(
  [
   'prefix' => '{locale}',
'where' => ['locale' => '[a-zA-Z]{2}'],
'middleware' => ['setlocale', 'throttle:web']

], function() {

    Route::post('/save-survey', [SurveyController::class, 'saveSurvey']);
//     Route::get('/articles' , [ArticleController::class, 'index'])->name('arthome');
//     Route::get('articles/{article:slug}', [ArticleController::class, 'show'])->name('artshow');
    //poroducts
    Route::get('/' , [ProductController::class, 'index'])->name('home');
    Route::get('products/{product:slug}', [ProductController::class, 'show'])->name('show');
    Route::post('products/{product:slug}/comments', [ProductCommentsController::class, 'store']);
    Route::post('add-rating', [RatingController::class, 'add']);

    Route::post('newsletter', NewsletterController::class);
    Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
    Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
    Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
    Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
    Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
    //calculator
    // Route::resource('/calculator', CalculatorController::class);
// Admin Section
    Route::middleware('can:admin')->group(function () {

//        Route::get('/calculator', function () {return view('calculator');});
       //sitemapgen

        Route::resource('/admin/sitemap', AdminSitemapController::class);
        //Articles

        Route::resource('/admin/articles', AdminArticleController::class)->except('artshow');
        Route::resource('/admin/articles/categories/index', AdminArtCategoryController::class, );
        //hashtags
        Route::resource('/admin/hashtag', AdminHashtagController::class);
        //products
        Route::resource('/admin/products', AdminProductController::class)->except('show');
        Route::resource('/admin/products/price', AdminPriceController::class);
        Route::resource('/admin/products/expense', AdminExpensePercentageController::class);
        Route::resource('/admin/products/comments', AdminCommentController::class);
        Route::resource('/admin/products/categories', AdminCategoryController::class);
        Route::resource('/admin/products/status_jobs', AdminStatusJobController::class);
        Route::resource('/admin/products/balance_products', AdminBalanceProductController::class);
//        Route::resource('/admin/products/products_prices', AdminProductsPriceController::class);
        Route::resource('/admin/products/orders',  AdminOrderController::class)->missing(function (Request $request) {return redirect("/".app()->getLocale()."/admin/products/orders");
        });;
        Route::get('/admin/products/orders_sort',  [AdminOrderController::class, 'date']);
        Route::post('/admin/products/orders_sort',  [AdminOrderController::class, 'sort']);
        Route::get('/admin/products/orders_text',  [AdminOrderController::class, 'orderText']);
        Route::get('/admin/products/payment_status',  [AdminOrderController::class, 'payment']);
        Route::get('/admin/products/delivery_status',  [AdminOrderController::class, 'delivery']);

        Route::get('/admin/products/orders_statistic',  [AdminOrderController::class, 'statistic']);
        Route::post('/admin/products/orders_statistic',  [AdminOrderController::class, 'statistic']);

        Route::get('/admin/products/expense_statistic',  [AdminOrderController::class, 'expense']);
        Route::post('/admin/products/expense_statistic',  [AdminOrderController::class, 'expense']);


         Route::get('/admin/products/price_formation',  [AdminOrderController::class, 'priceFormation']);

    });
//cart
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('Condition-cart', [CartController::class, 'Condition'])->name('cart.Condition');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    Route::post('/post-form', [CartController::class, 'order'])->name('order');
    //info page
    Route::get('/info_contact', [InfoController::class, 'contact'])->name('info_contact');
    Route::get('/info_delivery', [InfoController::class, 'delivery'])->name('info_delivery');
    Route::get('/info_payment', [InfoController::class, 'payment'])->name('info_payment');

});
