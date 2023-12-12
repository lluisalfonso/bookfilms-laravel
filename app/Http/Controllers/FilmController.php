<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index() {
        $films = Film::paginate(5);
        return view('films.index', ['films' => $films]);
    }

    public function create() {
        $directors = Director::all();
        return view('films.create', ['directors' => $directors]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'director_id' => 'nullable',
            'title' => 'required',
            'rating' => 'nullable|decimal:0,2|between:0,10',
            'has_seen' => 'nullable',
            'description' => 'nullable'
        ]);

        $data['has_seen'] = $this->checkboxToBoolean($data);

        $newFilm = Film::create($data);
        return redirect(route('film.index'));
    }

    public function edit(Film $film) {
        return view('films.edit', ['film' => $film]);
    }

    public function update(Film $film, Request $request) {
        $data = $request->validate([
            'director_id' => 'nullable',
            'title' => 'required',
            'rating' => 'nullable|decimal:0,2|between:0,10',
            'has_seen' => 'nullable',
            'description' => 'nullable'
        ]);

        $data['has_seen'] = $this->checkboxToBoolean($data);

        $film->update($data);

        return redirect(route('film.index'))->with('success', 'Película actualizada correctamente!');
    }

    public function delete(Film $film) {
        $film->delete();

        return redirect(route('film.index'))->with('success', 'Autor eliminado correctamente!');
    }
}