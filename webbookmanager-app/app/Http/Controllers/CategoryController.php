<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class CategoryController extends Controller
{
    //show all the categories
    public function index(){
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }


    public function create(){
        $category = new Category();
        return view('categories.create', compact('category'));

    }

    public function show(Request $request, $id){

        $booksByCategory = Book::where('category_id', $id)->get();
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category', 'booksByCategory'));
    }


    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'slug'=>'required',

        ]);

        $category = $request->all();

        Category::create($category);

        return redirect()->route('categories.index');
    }


    //remove category:
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('categories.index');

    }

}
