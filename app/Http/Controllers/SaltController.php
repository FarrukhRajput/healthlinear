<?php

namespace App\Http\Controllers;

use App\Models\Salt;
use Illuminate\Http\Request;

use App\DataTables\SaltDataTable;


class SaltController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( SaltDataTable $dataTable)
    {
        return $dataTable->render('dashboard.salt-single-page');
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
        $request->validate([
            'name' => 'required|unique:salts',
        ]);

        Salt::create($request->all());

        return redirect()->back()->withMessage('Salt Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salt  $salt
     * @return \Illuminate\Http\Response
     */
    public function show(Salt $salt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salt  $salt
     * @return \Illuminate\Http\Response
     */
    public function edit(Salt $salt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salt  $salt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $salt = Salt::find($request->id);

        $salt->update($request->all());
        $message = 'salt updated successfully';

        return redirect()->back()->withMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salt  $salt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salt $salt)
    {
        $salt->delete();

        return redirect()->back()->withMessage('Salt deleted successfully');
    }
}
