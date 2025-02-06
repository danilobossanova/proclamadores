<?php

namespace App\Http\Controllers;

use App\Models\ProgramacaoDiscurso;
use Illuminate\Http\Request;

class ProgramacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('programacao.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('programacao.create');
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
    public function show(ProgramacaoDiscurso $programacao)
    {
        return view('programacao.show', compact('programacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramacaoDiscurso $programacao)
    {
        return view('programacao.edit', compact('programacao'));
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
