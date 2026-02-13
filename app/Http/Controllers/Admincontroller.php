<?php

namespace App\Http\Controllers;

use App\Models\Lien;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Admincontroller extends Controller
{
     public function page_manage_data(){
        $allcategories = Categorie::all();
        $all_liens = Lien::all();
        $only_trashed_liens = Lien::onlyTrashed()->get();
         return view('/A_dashboard',compact('allcategories','all_liens','only_trashed_liens'));         
    }
    public function page_manage_users(){

        $all_uses = User::whereDoesntHave('role',function($e){
            $e->where('role','admin');
        })->get();
      
        return view('/A_all_users',compact('all_uses'));    

    }
    public function manage_user(User $user,Request $request){
        if($request->stat === 'unActive'){
           $user->is_active = false ;
           $user->save();
           
        }else{
            $user->is_active = true ;
            $user->save();
         
        }
                   
        return redirect('/A_all_users');
    }
}
