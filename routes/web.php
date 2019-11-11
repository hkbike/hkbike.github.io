<?php

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
//website
	//fronend--------------------------------------------------------------------------------------------------------------------



// Route::get('/', function () {
//     return view('index');
// });
Route::get('/','HomeController@index')->name('home');
// ajax
Route::post('ajax','HomeController@ajax')->name('ajax');

//--------blog-----
Route::get('blog','HomeController@blog')->name('blog');


Route::get('tre-em','HomeController@tre_em')->name('tre-em');
Route::get('dien-tro-luc','HomeController@dien_tro_luc')->name('dien-tro-luc'); 
Route::get('gioi-thieu','HomeController@gioi_thieu')->name('gioi-thieu'); 
Route::get('dia-hinh','HomeController@dia_hinh')->name('dia-hinh');
Route::get('pho-thong','HomeController@pho_thong')->name('pho-thong');
Route::get('nhap-khau','HomeController@nhap_khau')->name('nhap-khau');
Route::get('mien-bac','HomeController@mien_bac')->name('mien-bac');
Route::get('mien-trung','HomeController@mien_trung')->name('mien-trung');
Route::get('mien-nam','HomeController@mien_nam')->name('mien-nam');
Route::get('lien-he','HomeController@lien_he')->name('lien-he');
Route::get('aj','HomeController@ajaxView')->name('ajaxView');
// ------------------------------------------------------------
Route::get('singler-pro-{id}/{slug}','HomeController@singler_pro')->name('singler_pro'); 

Route::get('product-category-{id}-{slug}','HomeController@product_category')->name('product_category'); 


Route::get('search','HomeController@getSearch')->name('search');
// end website
Route::group(['prefix'=>'cart'],function(){
	Route::get('show-cart','web\CartController@show')->name('show');
	Route::get('add-cart/{id}','web\CartController@add')->name('add-cart');
	Route::post('update-cart','web\CartController@update')->name('update-cart');
	Route::get('delete-cart/{id}','web\CartController@delete')->name('delete-cart');
	Route::get('delete-all','web\CartController@deleteAll')->name('delete-all-cart');

	Route::get('thanh-toan','web\CartController@thanhtoan')->name('thanh-toan');
	Route::post('thanh-toan','web\CartController@postTT')->name('post-thanh-toan');
});

Route::get('admin/login','backend\AccountController@getDangnhapAdmin')->name('login');
Route::post('admin/login','backend\AccountController@postDangnhapAdmin');
Route::get('admin/logout','backend\AccountController@getDangXuat')->name('logout');

Route::get('admin/lay-lai-mat-khau','Auth\ForgotPasswordController@getFormResetPass')->name('get-reset-pass');
Route::post('admin/lay-lai-mat-khau','Auth\ForgotPasswordController@sendCodeResetPass')->name('post-reset-pass');
Route::get('admin/password/reset','Auth\ForgotPasswordController@resetPassword')->name('link-resetpas');
Route::post('admin/password/reset','Auth\ForgotPasswordController@saveResetPassword')->name('p-link-resetpas');



Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
		Route::get('','backend\BackendController@trangChu')->name('trang-chu-admin');


	Route::group(['prefix'=>'account'],function(){
		Route::get('','backend\AccountController@account')->name('account');
		Route::get('add-ac','backend\AccountController@postAc')->name('trang-them-tk');
		Route::post('add-ac','backend\AccountController@addAccount')->name('add-account');
		Route::get('edit-ac/{id}','backend\AccountController@editAc')->name('edit-account');
		Route::post('edit-ac/{id}','backend\AccountController@PeditAc')->name('post-edit-account');
		
		
		Route::get('delete-ac/{id}','backend\AccountController@deleteAccount')->name('delete-ac');


	});
	// end home
// category
	Route::group(['prefix'=>'category'],function(){
		Route::get('','backend\BackendController@category')->name('backend-category');
		Route::post('','backend\BackendController@store')->name('backend-store-category');

		Route::get('edit/{id}','backend\BackendController@editCate')->name('edit-category');
		Route::post('edit/{id}','backend\BackendController@postEditCate')->name('post-edit-cate');

		Route::get('deletecate/{id}','backend\BackendController@deleteCate')->name('delecate');
	});

// end category
// product
	Route::group(['prefix'=>'product'],function(){
		// tim kiếm sản phẩm
		Route::get('/search','backend\ProductController@get_search')->name('search-pd');
		Route::get('/search2','backend\ProductController@get_hien')->name('search-hien'); 
		Route::get('/search3','backend\ProductController@get_an')->name('search-an');
		Route::get('/search4','backend\ProductController@get_new')->name('search-new');
		Route::get('/search5','backend\ProductController@get_hot')->name('search-hot');

		// end tìm kiếm sản phẩm

		Route::get('','backend\ProductController@product')->name('backend-product');

		Route::get('add-product','backend\ProductController@addProduct')->name('backend-add-product');
		Route::post('add-product','backend\ProductController@store')->name('store-product');
		Route::get('delete-pd/{id}','backend\ProductController@deletePd')->name('delete-pd');
		Route::get('edit-pd/{id}','backend\ProductController@editPd')->name('edit-pd');
		Route::post('edit-pd/{id}','backend\ProductController@postEditPd')->name('post-edit-pd');

		Route::get('image-pd/{id}','backend\PdImageController@imgCT')->name('anh-chi-tiet');
		Route::post('image-pd/{id}','backend\PdImageController@imgPCT')->name('anh-chi-tiet');

		Route::get('image-pd','backend\PdImageController@image')->name('image-pd');
		Route::post('image-pd','backend\PdImageController@postImage')->name('post-image-pd');

		Route::get('edit-img/{id}','backend\PdImageController@editImg')->name('get-img');
		Route::post('edit-img/{id}','backend\PdImageController@postEditImg')->name('post-img');

		Route::get('delete-img/{id}','backend\PdImageController@deleteImg')->name('delete-img');

		Route::get('chi-tiet-san-pham/{id}','backend\ProductController@chiTietSP')->name('chi-tiet-sp');

		Route::group(['prefix'=>'detail'],function(){
			Route::get('/{id}','backend\ProductController@detail2')->name('pd-detail2');
			Route::get('','backend\ProductController@detail')->name('pd-detail');
			Route::post('','backend\ProductController@addDetail')->name('add-pd-detail');
			Route::get('edit/{id}','backend\ProductController@editDetail')->name('edit-detail');
			Route::post('edit/{id}','backend\ProductController@postEditDetail')->name('post-edit-detail');

			Route::get('delete/{id}','backend\ProductController@deleteDT')->name('delete-detail');
		});
		Route::group(['prefix'=>'tenchnical'],function(){
			Route::get('ten/{id}','backend\ProductController@tenchnical2')->name('tenchnical2');

			Route::get('','backend\ProductController@tenchnical')->name('tenchnical');
			Route::get('add-ten','backend\ProductController@getTen')->name('add-ten');
			Route::post('add-ten','backend\ProductController@postTen')->name('post-add-ten');
			Route::get('edit-ten/{id}','backend\ProductController@editTen')->name('edit-ten');
			Route::post('edit-ten/{id}','backend\ProductController@postEditTen')->name('post-edit-ten');

			Route::get('delete-ten/{id}','backend\ProductController@deleteTen')->name('delete-ten');
		});
	});
// end product
// banner
	Route::group(['prefix'=>'banner'],function(){
		Route::get('','backend\BannerController@banner')->name('backend-banner');
		Route::post('','backend\BannerController@postBanner')->name('post-banner');
		Route::get('edit-banner/{id}','backend\BannerController@editBanner')->name('edit-banner');
		Route::post('edit-banner/{id}','backend\BannerController@postEditBanner')->name('edit-banner');

		Route::get('delete-banner/{id}','backend\BannerController@deleteBanner')->name('delete-banner');
	});
	
//end banner
// tin tuc
	Route::group(['prefix'=>'blog'],function(){
		Route::get('','backend\BlogController@blog')->name('backend-blog');

		Route::get('chi-tiet-blog/{id}','backend\BlogController@CtBlog')->name('chi-tiet-blog');

		Route::get('add-blog','backend\BlogController@addBlog')->name('backend-add-blog');
		Route::post('add-blog','backend\BlogController@postAddBlog')->name('backend-post-add-blog');

		Route::get('edit-blog/{id}','backend\BlogController@editBlog')->name('backend-edit-blog');
		Route::post('edit-blog/{id}','backend\BlogController@postEditBlog')->name('backend-post-edit-blog');
		Route::get('delete-blog/{id}','backend\BlogController@deleteBlog')->name('backend-delete-blog');

		// Route::get('img-blog','backend\BlogController@imgBlog')->name('anh-tin-tuc');

		Route::group(['prefix'=>'blog-img'],function(){
			Route::get('','backend\BlogController@blogImg')->name('blog-img');
			Route::post('','backend\BlogController@postblogImg')->name('post-blog-img');
			Route::get('edit-img/{id}','backend\BlogController@editImg')->name('edit-img');
			Route::post('edit-img/{id}','backend\BlogController@postEditImg')->name('post-edit-img');

			Route::get('delete-img/{id}','backend\BlogController@deleteImg')->name('delete-img');
		});
		
	});
	// end tin tuc
	//cửa hàng
	Route::group(['prefix'=>'store'],function(){
		Route::get('','backend\StoreController@getST')->name('cua-hang');
		Route::post('','backend\StoreController@postST')->name('them-cua-hang');

		Route::get('sua/{id}','backend\StoreController@editST')->name('sua-cua-hang');
		Route::post('sua/{id}','backend\StoreController@posteditST')->name('capnhat-cua-hang');

		Route::get('xoa/{id}','backend\StoreController@xoaST')->name('xoa-cua-hang');
	});
	//end cửa hàng
	
	// oder
	Route::group(['prefix'=>'orders','namespace'=>'backend'],function(){
		Route::get('/search-od','OrderController@get_orderTk')->name('search-OD');

		Route::get('','OrderController@getOder')->name('don-hang');
		Route::get('chi-tiet-dh/{id}','OrderController@CTOrder')->name('chi-tiet-don-hang');
		Route::post('chi-tiet-dh/{id}','OrderController@UPStatus')->name('cap-nhat-don-hang');
	});


	// end order
	


});

// ----------------------fond-end----------------------------

// Route::get('/', function () {
//     return view('index');
// });
Route::get('web.','HomeController@index')->name('home');
// ajax
Route::post('ajax','HomeController@ajax')->name('ajax');

//--------blog-----
Route::get('web.blog','HomeController@blog')->name('blog');


Route::get('web.store','HomeController@store')->name('store');
Route::get('web.dien-tro-luc','HomeController@dien_tro_luc')->name('dien-tro-luc'); 
Route::get('web.gioi-thieu','HomeController@gioi_thieu')->name('gioi-thieu'); 


Route::get('web.mien-bac','HomeController@mien_bac')->name('mien-bac');
Route::get('web.mien-trung','HomeController@mien_trung')->name('mien-trung');
Route::get('web.mien-nam','HomeController@mien_nam')->name('mien-nam');
Route::get('web.lien-he','HomeController@lien_he')->name('lien-he');
Route::get('web.aj','HomeController@ajaxView')->name('ajaxView');
// ------------------------------------------------------------
Route::get('web.singler-pro-{id}/{slug}','HomeController@singler_pro')->name('singler_pro'); 

Route::get('web.product-category-{id}-{slug}','HomeController@product_category')->name('product_category'); 


// --------------gio--hang-----------
Route::group(['prefix' => 'cart'], function(){
	Route::get('view','CartController@view')->name('cart.view');
	Route::get('add/{id}','CartController@add')->name('cart.add');
	Route::get('remove/{id}','CartController@remove')->name('cart.remove');
	Route::get('update/{id}','CartController@update')->name('cart.update');
	Route::get('clear','CartController@clear')->name('cart.clear');

});

Route::group(['prefix'=>'gio-hang','middleware'=>'web'],function(){
	Route::get('order.thanh-toan','CartController@getFormPay')->name('get.form.pay');
	Route::post('order.thanh-toan','CartController@saveInfoshoppingCart');
});

//---------------dang-ki------

// Route::group(['prefix'=>'web'], function(){
	Route::get('web.dang-ki','HomeController@get_dang_ki')->name('get_dang_ki');
	Route::post('web.dang-ki','HomeController@post_dang_ki')->name('post_dang_ki');

	Route::get('web.dang-nhap','HomeController@get_dang_nhap')->name('get_dang_nhap');
	Route::post('web.dang-nhap','HomeController@post_dang_nhap')->name('post_dang_nhap');

	Route::get('web.dang-xuat','HomeController@dang_xuat')->name('dang-xuat');
// });
//-------tim-kiem--------

Route::get('web.search','HomeController@getSearch')->name('search');


