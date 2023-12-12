<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function index() {
        $directors = Director::paginate(5);
        return view('directors.index', ['directors' => $directors]);
    }

    public function create() {
        return view('directors.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $newDirector = Director::create($data);

        return redirect(route('director.index'));
    }

    public function edit(Director $director) {
        return view('directors.edit', ['director' => $director]);
    }

    public function update(Director $director, Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $director->update($data);

        return redirect(route('director.index'))->with('success', 'Director actualizado correctamente!');
    }

    public function delete(Director $director) {
        $director->delete();

        return redirect(route('director.index'))->with('success', 'Autor eliminado correctamente!');
    }
}