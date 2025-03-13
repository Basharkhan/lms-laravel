<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        try {
            $books = Book::all();
            return response()->json( [ 'data' => $books ], 200 );
        } catch ( Exception $e ) {
            return response()->json( [ 'message' => 'Failed to fetch books' ], 500 );
        }
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {

    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        try {
            $validatedData = $request->validate( [
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'isbn' => 'required|string|unique:books',
                'published_date' => 'required|date',
            ] );

            $book = Book::create( $validatedData );

            return response()->json( [ 'message' => 'Book created successfully', 'data' => $book ], 201 );
        } catch ( Exception $e ) {
            return response()->json( [ 'message' => 'Failed to create book' ], 500 );
        }
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        try {
            $book = Book::find( $id );

            if ( !$book ) {
                return response()->json( [ 'message' => 'Book not found' ], 404 );
            }

            return response()->json( [ 'data' => $book ], 200 );
        } catch ( Exception $e ) {
            return response()->json( [ 'message' => 'Failed to fetch book' ], 500 );
        }
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        try {
            $book = Book::find( $id );

            if ( !$book ) {
                return response()->json( [ 'message' => 'Book not found' ], 404 );
            }

            return response()->json( [ 'data' => $book ], 200 );
        } catch ( Exception $e ) {
            return response()->json( [ 'message' => 'Failed to fetch book' ], 500 );
        }
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        try {
            $book = Book::find( $id );

            if ( !$book ) {
                return response()->json( [ 'message' => 'Book not found' ], 404 );
            }

            $validatedData = $request->validate( [
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'isbn' => 'required|string|unique:books,isbn,' . $id,
                'published_date' => 'required|date',
            ] );

            $book->update( $validatedData );

            return response()->json( [ 'message' => 'Book updated successfully', 'data' => $book ], 200 );
        } catch ( Exception $e ) {
            return response()->json( [ 'message' => 'Failed to update book' ], 500 );
        }
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        try {
            $book = Book::find( $id );

            if ( !$book ) {
                return response()->json( [ 'message' => 'Book not found' ], 404 );
            }

            $book->delete();

            return response()->json( [ 'message' => 'Book deleted successfully' ], 200 );
        } catch ( Exception $e ) {
            return response()->json( [ 'message' => 'Failed to delete book' ], 500 );
        }
    }

}
