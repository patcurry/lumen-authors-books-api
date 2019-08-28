<?php

namespace App\Http\Controllers;

use App\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{

    public function showAllBooks()
    {
        $books = Book::all();

        return response()->json($books, 200);
    }

    public function showOneBook($author_id, $book_id)
    {
        $book = Book::find($book_id);
        $author = $book->author()->where('author_id' == $author_id);

        //if($author.id != author_id) {
        //    return response()->json('Sorry, the author id does not match the author id in the url');
        //}

        return response()->json($book, 200);
    }

    public function createBook($author_id, Request $request)
    {
        $book = Book::create([
            'book_title' => $request->book_title,
            'author_id' => $author_id
        ]);

        return response()->json($book, 201);
    }

    public function updateBook($book_id, Request $request)
    {
        $book = Book::find($book_id);
        $book->update($request->all());

        return response()->json($book, 200);
    }

    public function deleteBook($book_id)
    {
        Book::findOrFail($book_id)->delete();

        return response('Book Deleted Successfully', 200);
    }
}
