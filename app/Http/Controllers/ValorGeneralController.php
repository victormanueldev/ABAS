<?php

namespace ABAS\Http\Controllers;

use ABAS\ValorGeneral;
use Illuminate\Http\Request;

class ValorGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $valores = ValorGeneral::all();
        return $valores;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \ABAS\ValorGeneral  $valorGeneral
     * @return \Illuminate\Http\Response
     */
    public function show(ValorGeneral $valorGeneral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ABAS\ValorGeneral  $valorGeneral
     * @return \Illuminate\Http\Response
     */
    public function edit(ValorGeneral $valorGeneral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ABAS\ValorGeneral  $valorGeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ValorGeneral $valorGeneral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ABAS\ValorGeneral  $valorGeneral
     * @return \Illuminate\Http\Response
     */
    public function destroy(ValorGeneral $valorGeneral)
    {
        //
    }
}
