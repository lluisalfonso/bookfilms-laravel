<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index() {
        $books = Book::paginate(5);

        $total = Book::count();

        return view('books.index', ['books' => $books, 'total' => $total]);
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'author_id' => 'nullable',
            'title' => 'required',
            'rating' => 'nullable|decimal:0,2|between:0,10',
            'has_readen' => 'nullable',
            'description' => 'nullable'
        ]);

        $data['has_readen'] = $this->checkboxToBoolean($data);

        $newBook = Book::create($data);

        return redirect(route('book.index'));
    }

    public function edit(Book $book) {
        return view('books.edit', ['book' => $book]);
    }

    public function update(Book $book, Request $request) {
        $data = $request->validate([
            'author_id' => 'nullable',
            'title' => 'required',
            'rating' => 'nullable|decimal:0,2|between:0,10',
            'has_readen' => 'nullable',
            'description' => 'nullable'
        ]);

        $data['has_readen'] = $this->checkboxToBoolean($data);

        $book->update($data);

        return redirect(route('book.index'))->with('success', 'Libro actualizado correctamente!');
    }

    public function delete(Book $book) {
        $book->delete();

        return redirect(route('book.index'))->with('success', 'Autor eliminado correctamente!');
    }
}