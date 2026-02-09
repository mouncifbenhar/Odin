<?php

namespace App\Http\Controllers;

use App\Models\Lien;
use Illuminate\Http\Request;

class liencontroller extends Controller
{
    public function create_line(Request $request){
            $incomingFields = $request->validate([
                'title' => 'required',
                'lien'  => 'required',
                'categories_id'=> 'required'
            ]);
            $incomingFields['user_id'] = auth()->id();
            Lien::create($incomingFields);
            return redirect('/liens_page')->with('success', 'lien was created successfully');
    }
    public function show(){
        $liens = auth()->user()->lines()->get();
        $tags = auth()->user()->tags()->get();
        $categories = auth()->user()->categories()->get();
        return view('liens',compact('categories', 'liens','tags'));
    }
     public function delete_lien(Lien $lien){
         $lien->delete();
         return redirect()->back()->with('success', 'lien was delete successfully');
    }
    public function show_tag(Lien $lien){
        $tags = auth()->user()->tags()->get();
        $tags_to_link = $lien->tags()->get();
        return view('add_tag_to_lien',compact('tags','lien','tags_to_link'));
        
    }
    public function assign(Request $request,Lien $lien){

         $incomingFields = $request->validate([
            'tag_id' => 'required'
         ]);
         
         $lien->tags()->attach([$incomingFields]);

         return redirect()->back()->with('success', 'tag was add successfully');
    }
    public function search(Request $request){
          $all_link = auth()->user()->lines();

        if($request->filled('title')){
             $all_link->where('title','like','%'.$request->title.'%');
        }
        if($request->filled('categories_id')){
           $all_link->where('categories_id',$request->categories_id);
        }
        if($request->filled('tag_id')){
          $all_link->whereHas('tags',function($l) use ($request){
            $l->where('id',$request->tag_id);
          });
        }
        $liens = $all_link->get();
        $tags = auth()->user()->tags()->get();
        $categories = auth()->user()->categories()->get();
        return view('liens',compact('categories', 'liens','tags'));
    }

}
