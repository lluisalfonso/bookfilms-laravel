<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthorController extends Controller
{
    public function index(): View {
        $authors = Author::paginate(20);

        return view('authors.index', ['authors' => $authors]);
    }

    public function create(): View {
        return view('authors.create');
    }

    public function store(StoreAuthorRequest $request): RedirectResponse {
        $data = $request->validated();

        $newAuthor = Author::create($data);

        return redirect(route('author.index'));
    }

    public function edit(Author $author): View {
        return view('authors.edit', ['author' => $author]);
    }

    public function update(Author $author, StoreAuthorRequest $request): RedirectResponse {
        $data = $request->validated();

        $author->update($data);

        return redirect(route('author.index'))->with('success', 'Autor actualizado correctamente!');
    }


    public function delete(Author $author): RedirectResponse {
        $author->delete();

        return redirect(route('author.index'))->with('success', 'Autor eliminado correctamente!');
    }
}