<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Share;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Share::all();

        return view('shares.index', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return Share::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $share = Share::find($id);

        return view('shares.edit', compact('share'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $share = Share::find($id);
        $share->delete();

        return redirect('/shares')->with('success', 'Stock has been deleted Successfully');
    }


}
