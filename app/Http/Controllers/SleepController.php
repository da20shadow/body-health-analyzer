<?php

namespace App\Http\Controllers;

use App\Models\Sleep;
use Illuminate\Http\Request;

class SleepController extends Controller
{
    public function index()
    {
        //TODO: return the current info for this day
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sleep  $sleep
     * @return \Illuminate\Http\Response
     */
    public function show(Sleep $sleep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sleep  $sleep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sleep $sleep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sleep  $sleep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sleep $sleep)
    {
        //
    }
}
