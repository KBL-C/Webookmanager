<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    //
    public function store(Request $request){
        if(Auth::check()){

            //validate
            $validator = Validator::make($request->all(),[
                'commentBody' => 'required|string'
            ]);
            if(!$validator->validate()){
                return redirect()->back()->with('message', 'Content is mandatory');
            }

            $book = Book::where('slug', $request->bookSlug)->first();
            if($book){
                Comment::create([
                    'book_id' => $book->id,
                    'user_id' => Auth::user()->id,
                    'commentBody' => $request->commentBody

                ]);
                return redirect()->back()->with('message', 'Commented Succesfully');
            }else{
                return redirect()->back()->with('message', 'No such book found');
            }
        }else{
            return redirect()->back()->with('message', 'You must login first');
        }
    }


    public function destroy(Comment $comment)
    {
        //remove comment
        $comment->delete();
        return redirect()->back()->with('message', 'Comment removed');
    }
}
