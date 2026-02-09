<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class Tagcontroller extends Controller
{
    public function create_tag(Request $request){
        $incomingFields = $request->validate([
                'tag' => 'required',
        ]);
        $incomingFields['user_id'] = auth()->id();
        Tag::create($incomingFields);
    
        return redirect()->back()->with('success', 'tag was created successfully');
    }
}
