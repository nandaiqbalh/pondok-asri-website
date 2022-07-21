<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\VillageProfileRequest;
use App\Models\Backend\Profile;
use Illuminate\Http\Request;

class ProfileVillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::paginate(10);

        return view('backend.village-profile.index', [
            'profiles' => $profiles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.village-profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VillageProfileRequest $request)
    {
        $data = $request->all();

        Profile::create($data);

        $notification = array(
            'message' => 'Succeeded to Create Village Profile',
            'alert-type' => 'success'
        );

        return redirect()->route('profiles.index')->with($notification);
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
    public function edit(Profile $profile)
    {
        return view('backend.village-profile.edit', [
            'item' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VillageProfileRequest $request, Profile $profile)
    {
        $data = $request->all();

        $profile->update($data);


        $notification = array(
            'message' => 'Succeeded to Update Village Profile',
            'alert-type' => 'success'
        );
        return redirect()->route('profiles.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        $notification = array(
            'message' => 'Succeeded to Delete Village Profile',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
