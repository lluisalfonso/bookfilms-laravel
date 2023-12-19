<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectorRequest;
use App\Models\Director;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DirectorController extends Controller
{
    public function index(): View {
        $directors = Director::paginate(20);
        return view('directors.index', ['directors' => $directors]);
    }

    public function create(): View {
        return view('directors.create');
    }

    public function store(StoreDirectorRequest $request): RedirectResponse {
        $data = $request->validated();

        $newDirector = Director::create($data);

        return redirect(route('director.index'));
    }

    public function edit(Director $director): View {
        return view('directors.edit', ['director' => $director]);
    }

    public function update(Director $director, StoreDirectorRequest $request): RedirectResponse {
        $data = $request->validated();

        $director->update($data);

        return redirect(route('director.index'))->with('success', 'Director actualizado correctamente!');
    }

    public function delete(Director $director): RedirectResponse {
        $director->delete();

        return redirect(route('director.index'))->with('success', 'Autor eliminado correctamente!');
    }
}