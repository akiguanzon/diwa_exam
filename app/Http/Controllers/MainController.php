<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function home(Request $request)  {
        $books = [];

        if(auth()->check()){
            $books = Book::all();
        }


        if(auth()->check()){
            if(auth()->user()->role == 'teacher'){
            return view('home', ['books' => $books]);
            }
            else{
                $books = auth()->user()->getAssignedBooks()->get();
                $allBooks = [];

                foreach($books as $book){
                    array_push($allBooks, $book->getBook);
                }


                return view('homeStudent', ['books'=> $allBooks]);
            }
        }
        
        return redirect('/');
        
        
    }
}
