<?php

namespace App\Http\Controllers;

use App\Models\Lien;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Sherdcontroller extends Controller
{

    public function sherd(Request $request,Lien $lien){
           $userfind = User::find($request['user_id']);
           if($request['per'] === '1'){
                 $lien->user()->syncWithoutDetaching([$userfind['id'] => ['access_type' => 'read']]);
           }else{
                 $lien->user()->syncWithoutDetaching([$userfind['id'] => ['access_type' => 'edit']]);
           }
           return redirect()->back();      
    }

}
