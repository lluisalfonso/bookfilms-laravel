<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::paginate(5);
        return view('authors.index', ['authors' => $authors]);
    }

    public function create() {
        return view('authors.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $newAuthor = Author::create($data);

        return redirect(route('author.index'));
    }

    public function edit(Author $author) {
        return view('authors.edit', ['author' => $author]);
    }

    public function update(Author $author, Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $author->update($data);

        return redirect(route('author.index'))->with('success', 'Autor actualizado correctamente!');
    }


    public function delete(Author $author) {
        $author->delete();

        return redirect(route('author.index'))->with('success', 'Autor eliminado correctamente!');
    }
}