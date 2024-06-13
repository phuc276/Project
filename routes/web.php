<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{ UserController, CountryController,  BlogController};
use App\Http\Controllers\Auth\LoginConttroller;

use App\Http\Controllers\Frontend\MemberShopController;
use App\Http\Controllers\Frontend\BlogShopController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\MailController;
use App\Http\Controllers\Frontend\SearchController;









Route::group(['prefix' => 'user'], function () {


    Route::group(['middleware' => 'memberNotLogin'], function () {

       Route::get('/login', [MemberShopController::class, 'loginindex'])->name('loginshop');
       Route::post('/login', [MemberShopController::class, 'login']);

       Route::get('/register', [MemberShopController::class, 'registerindex'])->name('registershop');
       Route::post('/register', [MemberShopController::class, 'register']);




   });

    Route::group(['middleware' => 'member'], function () {


       Route::get('/account', function () {return view('frontend.member.account');})->name('account');
       Route::post('/account', [MemberShopController::class, 'updateuser']);

       Route::get('/home', [ProductsController::class, 'viewproduct']);

       Route::get('/logoutshop', [MemberShopController::class, 'logout'])->name('logoutshop');


       Route::get('/blog', [BlogShopController::class, 'index'])->name('blogshop');


       Route::get('/blogdetail/{id}', [BlogShopController::class, 'showDetail'])->name('blog.detail');
       Route::post('/blogdetail/{id}', [BlogShopController::class, 'comments'])->name('blog.detail.post');
       Route::post('/ajax/rate/blog', [BlogShopController::class, 'ajaxBlogDetail'])->name('ajax.blog.detail');


       Route::get('/cart', [ProductsController::class, 'postCart']);
       Route::post('ajax/postcart', [ProductsController::class, 'postCart'])->name('postcart');
       Route::post('ajax/post', [ProductsController::class, 'updateCart'])->name('post');



       Route::get('/myproduct', [ProductsController::class, 'index'])->name('myproduct');

       Route::get('/product/edit/{id}', [ProductsController::class, 'edit'])->name('edit.product');
       Route::post('/product/edit/{id}', [ProductsController::class, 'edit']);
       Route::get('/product/delete/{id}', [ProductsController::class, 'delete'])->name('delete.product');

       Route::get('/addproduct', function () {return view('frontend.product.addproduct');})->name('addproduct');
       Route::post('/addproduct', [ProductsController::class, 'add']);


       Route::get('/product-details/{id}', [ProductsController::class, 'productdetail'])->name('products-details');
        // Route::get('/productdetails/{id}', [ProductsController::class, 'productdetail'])->name('productdetails');



       Route::get('/sendemail', function () {
        return view('frontend.sendmail.sendemail');});

       // Route::get('/checkout', function () {return view('frontend.member.checkout');});
       Route::get('/checkout', [MailController::class, 'index'])->name('checkout');


       Route::get('/search', [SearchController::class, 'search']);


       Route::get('/search-advanced', [SearchController::class, 'searchAdvanced'])->name('search');


       Route::get('/contact', function () {
        return view('frontend.onepage.contact-us');

    });

   });
});


Auth::routes();


Route::group([
    'prefix' => 'admin',
    // 'namespace' => 'Auth'
], function () {

    Route::get('/login', function () {return view('auth.login');});
    Route::get('/register', function () {return view('auth.register');});

});

Route::group([
    'prefix' => 'admin',
    'middleware' => ['admin'],
], function () {

    Route::get('/profile', [UserController::class, 'index'])->middleware('auth')->name('profile');
    Route::post('/profile', [UserController::class, 'update']);

    Route::get('/country', [CountryController::class, 'index'])->name('country');

    Route::get('/addcountry', function () {
        return view('admin.blog.addcountry');
    });
    Route::post('/addcountry', [CountryController::class, 'add']);

    Route::get('/delete-country/{id}', [CountryController::class, 'delete'])->name('delete.country');

    Route::get('/listblog', [BlogController::class, 'index'])->name('listblog');

    Route::get('/createblog', function () {
        return view('admin.blog.createblog');
    });
    Route::post('/createblog', [BlogController::class, 'create']);

    Route::get('/edit-blog/{id}', [BlogController::class, 'indexEdit'])->name('edit');
    Route::post('/edit-blog/{id}', [BlogController::class, 'Edit']);

    Route::get('/deleteblog/{id}', [BlogController::class, 'delete'])->name('delete');

    Route::get('/home', function () {
        return view('dashboard');
    })->name('home');

    Route::get('/form-basic', function () {
        return view('admin.user.form-basic');
    });

    Route::get('/table', function () {
        return view('admin.user.table');
    });

    Route::get('/icon', function () {
        return view('admin.user.icon');
    });

    Route::get('/blank', function () {
        return view('admin.user.blank');
    });

    Route::get('/error-404', function () {
        return view('admin.user.error-404');
    });

});
// Route::group([
//     'prefix' => 'admin', //add "admin" before link
//     'namespace' => 'Admin',
//     'middleware' => ['admin']
// ], function () {

// }












// MAIL_MAILER=smtp
// MAIL_HOST=smtp.gmail.com
// MAIL_PORT=1025  
// MAIL_USERNAME=maihphuc27@gmail.com
// MAIL_PASSWORD=oehw qvkc mcjm ftzg
// MAIL_ENCRYPTION=tls
// MAIL_FROM_ADDRESS=maihphuc27@gmail.com
// MAIL_FROM_NAME=doan