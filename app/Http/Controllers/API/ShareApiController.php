<?php

namespace App\Http\Controllers\API;

use App\Share;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShareApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Share::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $share = new Share();
        $request->validate([
            'name'=>'required',
            'age'=> 'required|integer',
            'phone' => 'required|integer'
        ]);
        if ($request->hasFile('avatar')) {
            $share->name = $request->input('name');
            $share->age = $request->input('age');
            $share->phone = $request->input('phone');
            $file = $request->avatar;
            $extension = $file->getClientOriginalName();
            $file->move('upload', $file->getClientOriginalName());
            $share->avatar = $extension;

        } else {
            $share->name = $request->input('name');
            $share->age = $request->input('age');
            $share->phone = $request->input('phone');
            $share->avatar = 'default.jpg';
        }
        $share->save();
        return redirect('/shares')->with('success', 'Stock has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Share::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $share = Share::find($id);
        $share->name = $request->input('name');
        $share->age = $request->input('age');
        $share->phone = $request->input('phone');
        $request->validate([
            'name'=>'required',
            'age'=> 'required|integer',
            'phone' => 'required|integer'
        ]);
        if ($request->file('avatar')) {
            $share->name = $request->input('name');
            $share->age = $request->input('age');
            $share->phone = $request->input('phone');
            $file = $request->avatar;
            $extension = $file->getClientOriginalName();
            $file->move('upload', $file->getClientOriginalName());
            $share->avatar = $extension;
        }else{
            $share->name = $request->input('name');
            $share->age = $request->input('age');
            $share->phone = $request->input('phone');
            //$file = $request->avatar;
            //$share->avatar = $file;
        }
        $share->save();
        return redirect('/shares')->with('success', 'student is successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $share = Share::find($id);
        $share->delete();

        return redirect('/shares')->with('success', 'Stock has been deleted Successfully');
    }
}
