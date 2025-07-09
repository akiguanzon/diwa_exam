<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //


    public function createBook(Request $request){

        if(auth()->check()){
            if(auth()->user()->role == 'teacher'){
                $incoming = $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                    'image_link' => 'required'
                ]);

                $incoming['title'] = strip_tags($incoming['title']);
                $incoming['description'] = strip_tags($incoming['description']);
                $incoming['image_link'] = strip_tags($incoming['image_link']);


                Book::create($incoming);
            }
        }
        return redirect('/home');
    }

    public function assignBookPage(Book $book){

        if(auth()->user()->role == 'teacher'){

            $students = DB::table('users')->where('role', 'student')->get()->all();

            $assignments = Assignment::all();

            $i = 0;

            foreach($students as $student){
                foreach($assignments as $assignment){

                    if($assignment['user_id'] == $student->id && $assignment['book_id'] == $book['id']){
                        unset($students[$i]);
                    }
                }
                $i += 1;
            }

        
            return view('assignBook', ['students' => $students, 'book' => $book]);
        }

        return redirect('/home');
    }

    public function assignBook(Book $book, User $user, Request $request){

        if(auth()->user()->role == 'teacher'){
            Assignment::create(['user_id' => $user['id'], 'book_id' => $book['id']]);
        }

        return redirect('/home');
    }


    public function deleteBook(Book $book){

        if(auth()->user()->role == 'teacher'){
            $book->delete();
        }

        return redirect('/home');
        
    }
}
