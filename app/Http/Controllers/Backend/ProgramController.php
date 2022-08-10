<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProgramRequest;
use App\Models\Backend\Program;
use App\Models\Backend\ProgramCategory;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program_categories = ProgramCategory::latest()->get();
        $programs = Program::paginate(10);

        return view('backend.programs.index', [
            'program_categories' => $program_categories,
            'programs' => $programs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program_categories = ProgramCategory::latest()->get();
        return view('backend.programs.create', [
            'program_categories' => $program_categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        $data = $request->all();

        // apakah user memasukkan photo?
        if ($request->file('thumbnail')) {
            // store photopath
            $photoPath = $request->file('thumbnail')->store('upload/programs', 'public');
            $data['thumbnail'] = $photoPath;
        }

        $data['status'] = 1;

        Program::create($data);

        $notification = array(
            'message' => 'Create Program Success!',
            'alert-type' => 'success'
        );

        return redirect()->route('programs.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $program_categories = ProgramCategory::latest()->get();

        return view('backend.programs.edit', [
            'item' => $program,
            'program_categories' => $program_categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request, Program $program)
    {
        $data = $request->all();


        // apakah user memasukkan photo?
        if ($request->file('thumbnail')) {
            // delete old photo
            $oldPath = $program->thumbnail;
            @unlink(public_path('storage/' . $oldPath));

            // store new photopath
            $photoPath = $request->file('thumbnail')->store('upload/programs', 'public');
            $data['thumbnail'] = $photoPath;
        }

        $program->update($data);

        $notification = array(
            'message' => 'Update Program Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('programs.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();

        $notification = array(
            'message' => 'Delete Program Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function programInactive($id)
    {
        Program::findOrFail($id)->update([
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Inactivated Progam Success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function programActive($id)
    {
        Program::findOrFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
            'message' => 'Activated Progam Success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
