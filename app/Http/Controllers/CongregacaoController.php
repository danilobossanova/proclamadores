<?php

namespace App\Http\Controllers;

use App\Models\Congregacao;
use Illuminate\Http\Request;

class CongregacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('congregacoes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('congregacoes.create');
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
    public function show(Congregacao $congregacao)
    {
        return view('congregacoes.show', compact('congregacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Congregacao $congregacao)
    {
        return view('congregacoes.edit', compact('congregacao'));
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
