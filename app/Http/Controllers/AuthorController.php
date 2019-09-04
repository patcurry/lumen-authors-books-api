<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorController extends Controller
{
    // FIND Authors
    public function showAllAuthors()
    {
        return response()->json(Author::all());
    }

    public function showOneAuthor($author_id)
    {
        try {
            $author = Author::findOrFail($author_id);
        } catch(ModelNotFoundException $e) {
            return response('Author not found', 404);
        }

        return response()->json($author, 200);
    }

    // CRUD Authors
    public function createAuthor(Request $request)
    {
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function updateAuthor($author_id, Request $request)
    {
        try {
            $author = Author::findOrFail($author_id);
        } catch(ModelNotFoundException $e) {
            return response('Author not found', 404);
        }
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function deleteAuthor($author_id)
    {
        try {
            Author::findOrFail($author_id)->delete();
        } catch(ModelNotFoundException $e) {
            return response('Author not found', 404);
        }

        return response('Author Deleted Successfully', 200);
    }

    // To simplify validation the book controller methods will be
    // written here 
    
    // FIND Books
    public function showAllBooks()
    {
        $books = Book::all();

        return response()->json($books, 200);
    }

    
    public function showAllBooksFromAuthor($author_id)
    {
        try {
            $author = Author::findOrFail($author_id);
        } catch(ModelNotFoundException $e) {
            return response('Author not found', 404);
        }
            $books = $author->books;

            return response()->json($books, 200);

    }
     

    public function showOneBook($author_id, $book_id)
    {
        try{
            $author = Author::findOrFail($author_id);
        } catch(ModelNotFoundException $e) {
            return response('Author not found', 404);
        }
        $book = $author->books
                       ->where('id', '=', $book_id)
                       ->first();

        return response()->json($book, 200);
    }

    // CRUD Books
    public function createBook($author_id, Request $request)
    {
        try{
            $author = Author::findOrFail($author_id);
        } catch(ModelNotFoundException $e) {
            return response('Author not found', 404);
        }
        $book = Book::create([
            'title' => $request->title,
            'author_id' => $author->id
        ]);

        return response()->json($book, 201);
    }
    
    public function updateBook($author_id, $book_id, Request $request)
    {
        try{
            $author = Author::findOrFail($author_id);
        } catch(ModelNotFoundException $e) {
            return response('Author not found', 404);
        }
        $book = $author->books
                       ->where('id', '=', $book_id)
                       ->first()
                       ->update($request->all());

        $updatedBook = $author->books
                              ->where('id', '=', $book_id)
                              ->first();

        return response()->json($updatedBook, 200);
    }

    public function deleteBook($author_id, $book_id)
    {
        try{
            $author = Author::findOrFail($author_id);
        } catch(ModelNotFoundException $e) {
            return response('Author not found', 404);
        }
        $book = $author->books
                       ->where('id', '=', $book_id)
                       ->first()
                       ->delete();

        return response('Book Deleted Successfully', 200);
    }
}
