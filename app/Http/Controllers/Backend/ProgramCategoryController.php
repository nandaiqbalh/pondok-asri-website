<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProgramCategoryRequest;
use App\Models\Backend\ProgramCategory;
use Illuminate\Http\Request;

class ProgramCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program_categories = ProgramCategory::paginate(10);

        return view('backend.program-categories.index', [
            'program_categories' => $program_categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.program-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramCategoryRequest $request)
    {
        $data = $request->all();

        ProgramCategory::create($data);

        $notification = array(
            'message' => 'Succeeded to Create Program Category',
            'alert-type' => 'success'
        );

        return redirect()->route('program-category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramCategory $programCategory)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramCategory $programCategory)
    {
        return view('backend.program-categories.edit', [
            'item' => $programCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramCategoryRequest $request, ProgramCategory $programCategory)
    {
        $data = $request->all();

        $programCategory->update($data);


        $notification = array(
            'message' => 'Succeeded to Update Program Category',
            'alert-type' => 'success'
        );
        return redirect()->route('program-category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramCategory $programCategory)
    {
        $programCategory->delete();

        $notification = array(
            'message' => 'Succeeded to Delete Program Category',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
