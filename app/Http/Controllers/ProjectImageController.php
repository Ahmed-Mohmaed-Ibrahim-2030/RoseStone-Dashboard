<?php

namespace App\Http\Controllers;

use App\Models\Project_Image;
use App\Http\Requests\StoreProject_ImageRequest;
use App\Http\Requests\UpdateProject_ImageRequest;

class ProjectImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProject_ImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProject_ImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project_Image  $project_Image
     * @return \Illuminate\Http\Response
     */
    public function show(Project_Image $project_Image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project_Image  $project_Image
     * @return \Illuminate\Http\Response
     */
    public function edit(Project_Image $project_Image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProject_ImageRequest  $request
     * @param  \App\Models\Project_Image  $project_Image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProject_ImageRequest $request, Project_Image $project_Image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project_Image  $project_Image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project_Image $project_Image)
    {
        //
    }
}
