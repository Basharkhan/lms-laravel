<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all(); 
        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'book_name' => 'required|string|max:255',
            'isbn' => 'required|string',
            'published_date' => 'required|integer|min:1500|max:'.date('Y'),
        ]);

        // Create a new book
        $book = Book::create($validated);

        // Return response
        return response()->json([
            'message' => 'Book created successfully!',
            'data' => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {        
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json(['data' => $book], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json(['data' => $book], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {        
        $book = Book::find($id);
    
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
           
        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
            'book_name' => 'required|string|max:255',
            'isbn' => 'required|string',
            'published_date' => 'sometimes|integer|min:1000|max:9999',
        ]);
            
        $book->update($validatedData);
    
        return response()->json(['message' => 'Book updated successfully', 'data' => $book], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the book by ID
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        // Delete the book
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully'], 200);
    }

}
