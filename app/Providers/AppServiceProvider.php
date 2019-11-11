<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Helper\CartHelper;
use App\Models\Users;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
         view()->composer('*',function($view){
            $product_count = Product::all();
            $blog = Blog::all();
            $cat = Category::all();
            $the_loai_sp = Category::where('status',0)->get();
            $cart = session('cart')? session('cart'):[];
            $view->with([
                'the_loai_sp'=>$the_loai_sp,
                'product_count'=>$product_count,
                'blog'=>$blog,
                'cat'=>$cat,
                'cart'=>$cart,
                'carts'=> new CartHelper(),

            ]);
        });
         view()->composer('*',function($view){
            $view->with([
                'category' => Category::where('status',1)->orderBy('name','ASC')->get(),
                'cart' => new CartHelper(),
                'productss' => Product::where('status',1)->orderBy('name','ASC')->get(),
                'blog'=>Blog::all(),
                // 'user'=> Users::where('status',0)->orderBy('name','ASC')->get(),
            ]);
        });
    }
}
