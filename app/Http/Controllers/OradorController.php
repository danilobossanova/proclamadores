<?php

namespace App\Http\Controllers;

use App\Models\Orador;
use Illuminate\Http\Request;

class OradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('oradores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('oradores.create');
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
    public function show(Orador $orador)
    {
        return view('oradores.show', compact('orador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orador $orador)
    {
        return view('oradores.edit', compact('orador'));
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
