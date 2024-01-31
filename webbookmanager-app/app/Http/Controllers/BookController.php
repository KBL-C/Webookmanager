<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\CategoryController;


class BookController extends Controller
{
    //show all the books

    public function index(Request $request){
        if($request==""){


            $books = Book::paginate(10);
            return view('books.index', with(compact('books')));

            return redirect()->route('shop');
        }else{
            $text =trim($request->get('text'));
            $books = Book::select('id', 'category_id', 'name', 'slug', 'description', 'author', 'price')
            ->where('name', 'LIKE', '%'.$text.'%')
            //->orWhere('category_id', 'LIKE', '%'.$text.'%')
            ->orderBy('name', 'asc')
            ->paginate(10);
            return view('books.index', with(compact('books')), with(compact('text')));

        }

    }


    /*
    public function search(Request $request){

        $text =trim($request->get('text'));

        $books = Book::select('id', 'category_id', 'name', 'slug', 'description', 'author', 'price')
            ->where('name', 'LIKE', '%'.$text.'%')
            ->orderBy('name', 'asc')
            ->paginate(10);

        return view('books.index', with(compact('books')), with(compact('text')));
    }
    */

    //
    public function show($id){
        $book = Book::findOrFail($id);
        return view('books.show', with(compact('book')));
    }

    public function create(){
        $categories = Category::all();
        $book = new Book();
        return view('books.create', compact('book', 'categories'));

    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'image_path'=>'required|image|mimes:jpeg,jpg,png|max:2048',
            'slug'=>'required',
            'description'=>'required',
            'author'=>'required',
            'price'=>'required',
            'category_id'=>'required'

        ]);

        $book = $request->all();

        if($image_path = $request->file('image_path')){
            $storeImages = 'images/';
            //$image_path->getClientOriginalExtension();
            // date('YmdHis'). "." .$image_path->getClientOriginalExtension();
            $bookImage = date('YmdHis').".".$image_path->getClientOriginalExtension();
            $image_path->move($storeImages, $bookImage);
            $book['image_path'] = $bookImage;


        }

        //dd( $book['image_path']);

        Book::create($book);
        //dd($b1);
        return redirect()->route('shop')->with('success_msg', 'Book created successfully');
    }

    //update book
    public function update(Request $request, Book $book){
        $request->validate([
            'name'=>'required',
            'image_path'=>'required|image|mimes:jpeg,jpg,png|max:2048',
            'slug'=>'required',
            'description'=>'required',
            'author'=>'required',
            'price'=>'required',
            'category_id'=>'required'
        ]);


        $modifiedBook = $request->all();
        if($image_path = $request->file('image_path')){
            $storeImages = 'images/';
            //$image_path->getClientOriginalExtension();
            // date('YmdHis'). "." .$image_path->getClientOriginalExtension();
            $bookImage = date('YmdHis').".".$image_path->getClientOriginalExtension();
            $image_path->move($storeImages, $bookImage);
            $modifiedBook['image_path'] = $bookImage;
        }else{
            unset($modifiedBook['image_path']);
        }

        $book->update($modifiedBook);

        return redirect()->route('shop');

    }

    //edit book

    public function edit(Book $book){
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }



    //remove book:
    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('shop');

    }

}
