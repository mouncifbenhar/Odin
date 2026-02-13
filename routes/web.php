<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tagcontroller;
use App\Http\Controllers\liencontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Categoriescontroller;
use App\Http\Controllers\Sherdcontroller;

Route::get('/',function(){
     return redirect('login');
});
Route::get('/register',function(){
    return view('Register');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/login',[Usercontroller::class,'login']);
Route::post('/logout',[Usercontroller::class,'logout']);
Route::post('/create_user',[Usercontroller::class,'register']);
Route::get('/dashboard',[Usercontroller::class,'index'])->middleware(['inactive']);
//Admine 
Route::get('/A_dashboard',[Admincontroller::class,'page_manage_data'])->middleware(['admin']);
Route::get('/A_all_users',[Admincontroller::class,'page_manage_users'])->middleware(['admin']);
Route::post('/manage_user/{user}',[Admincontroller::class,'manage_user'])->middleware(['admin']);

//Categories
Route::get('/categories_page',[Categoriescontroller::class,'show']);
Route::post('create_Categories',[Categoriescontroller::class,'create_Categories']);
Route::post('/delete_categorie/{categorie}',[Categoriescontroller::class,'delete_Categorie']);
Route::get('/Edit_categorie/{categorie}',[Categoriescontroller::class,'edit_form']);
Route::post('/edit_Categories/{categorie}',[Categoriescontroller::class,'update']);
Route::get('/assing_liens/{categorie}',[Categoriescontroller::class,'show_lien']);

//lien
Route::get('/liens_page',[liencontroller::class,'show']);
Route::post('create_lien',[liencontroller::class,'create_line']);
Route::post('/delete_lien/{lien}',[liencontroller::class,'delete_lien'])->withTrashed();
Route::get('/add_tag_to_lien/{lien}',[liencontroller::class,'show_tag']);
Route::post('/assign_tag_to_link/{lien}',[liencontroller::class,'assign']);
Route::post('/search',[liencontroller::class,'search']);
Route::get('/bin_page',[liencontroller::class,'bin_page']);
Route::post('/recover_lien/{link}',[liencontroller::class,'recover'])->withTrashed();

//tag
Route::post('/create_tag',[Tagcontroller::class,'create_tag']);

//sherd
Route::post('/sherd/{lien}',[Sherdcontroller::class,'sherd']);

