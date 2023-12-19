<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    public function index(): View {
        $books = Book::paginate(20);

        return view('books.index', ['books' => $books]);
    }

    public function create(): View {
        return view('books.create', ['authors' => Author::all()]);
    }

    public function store(StoreBookRequest $request): RedirectResponse {
        $data = $request->validated();

        $data['has_readen'] = $this->checkboxToBoolean($data);

        $newBook = Book::create($data);

        return redirect(route('book.index'));
    }

    public function edit(Book $book): View {
        return view('books.edit', ['book' => $book, 'authors' => Author::all()]);
    }

    public function update(Book $book, StoreBookRequest $request): RedirectResponse {
        $data = $request->validated();

        $data['has_readen'] = $this->checkboxToBoolean($data);

        $book->update($data);

        return redirect(route('book.index'))->with('success', 'Libro actualizado correctamente!');
    }

    public function delete(Book $book): RedirectResponse {
        $book->delete();

        return redirect(route('book.index'))->with('success', 'Libro eliminado correctamente!');
    }
}