<?php

namespace App\Http\Controllers;

use App\Models\Discurso;
use Illuminate\Http\Request;

class DiscursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('discursos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('discursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Discurso $discurso)
    {
        return view('discursos.show', compact('discurso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discurso $discurso)
    {
        return view('discursos.edit', compact('discurso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
