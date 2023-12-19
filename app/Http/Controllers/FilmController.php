<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Director;
use App\Models\Film;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FilmController extends Controller
{
    public function index(): View {
        $films = Film::paginate(20);

        return view('films.index', ['films' => $films]);
    }

    public function create(): View {
        return view('films.create', ['directors' => Director::all()]);
    }

    public function store(StoreFilmRequest $request): RedirectResponse {
        $data = $request->validated();

        $data['has_seen'] = $this->checkboxToBoolean($data);

        $newFilm = Film::create($data);
        
        return redirect(route('film.index'));
    }

    public function edit(Film $film): View {
        return view('films.edit', ['film' => $film, 'directors' => Director::all()]);
    }

    public function update(Film $film, StoreFilmRequest $request): RedirectResponse {
        $data = $request->validated();

        $data['has_seen'] = $this->checkboxToBoolean($data);

        $film->update($data);

        return redirect(route('film.index'))->with('success', 'Película actualizada correctamente!');
    }

    public function delete(Film $film): RedirectResponse {
        $film->delete();

        return redirect(route('film.index'))->with('success', 'Película eliminada correctamente!');
    }
}