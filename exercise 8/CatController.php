<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
const CATS = '/cats';

class CatController extends Controller
{

    public function index()
    {
        $cats = Cat::all();
        return view('cats.index', compact('cats'));
    }

    

    public function create()
    {
        return view('cats.create');
    }

 

     public function store(Request $request)
     {
     $request->validate([
     'name' => 'required',
     'date_of_birth' => 'required'
     ]);
     $cats = new Cat([
     'name' => $request->get('name'),
     'date_of_birth' => $request->get('date_of_birth')
     ]);
     $cats->save();
     return redirect(CATS)->with('success', 'Cat Details Saved!');
     }
     public function show(Cat $cat_id)
     {
     $cats = Cat::find($cat_id);
     return view('cats.show', compact('cat'));
     }

     public function edit($cat_id)
     {
     $cats = Cat::find($cat_id);
     return view('cats.edit', compact('cats'));
     }
     public function update(Request $request, $cat_id)
     {
     $request->validate([
     'name' => 'required',
     'date_of_birth' => 'required'
     ]);
     $cats = Cat::find($cat_id);
     $cats->name = $request->get('name');
     $cats->date_of_birth = $request->get('date_of_birth');
     $cats->save();
     return redirect(CATS)->with('success', 'Cat Updated!');
     }

     public function destroy($cat_id)
     {
       $cats = Cat::find($cat_id);
       $cats->delete();
       return redirect(CATS)->with('success', 'Cat Deleted!');
     }
    
}