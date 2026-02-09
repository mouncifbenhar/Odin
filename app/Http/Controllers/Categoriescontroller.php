<?php

namespace App\Http\Controllers;

use App\Models\Lien;
use App\Models\Categorie;
use Illuminate\Http\Request;


class Categoriescontroller extends Controller
{
    public function create_Categories(Request $request){
            $incomingFields = $request->validate([
                'title' => 'required'
            ]);
            $incomingFields['user_id'] = auth()->id();
            Categorie::create($incomingFields);

            return redirect()->back()->with('success', 'Categories was created successfully');
    }
          public function show(){

          $categories = auth()->user()->categories()->get();
          return view('Categories',['categories' => $categories]);
    }
    public function delete_Categorie(Categorie $categorie){
         $categorie->delete();
         return redirect('/categories_page')->with('success', 'categorie was delete successfully');
    }
    public function edit_form(Categorie $categorie){

         return view('Edit_categorie',['categorie' => $categorie]);

    }
    public function update(Categorie $categorie,Request $request){
        $incomingFields = $request->validate([
            'title' => 'required'
        ]);
        $categorie->update($incomingFields);
        return redirect('/categories_page')->with('success', 'Categorie was updat successfully');
    }
     public function show_lien(Categorie $categorie){    
        $liens = $categorie->liens()->get();
        return view('assing_liens',['categorie'=> $categorie,'liens' => $liens]);
    }
}
