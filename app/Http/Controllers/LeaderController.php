<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leader;

class LeaderController extends Controller
{
    public function index()
    {
        $data_leader = Leader::all();

        return view('leader.index', compact('data_leader'));
    }

    public function create()
    {
        return view('leader.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],

            [
                'name.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'phone.required' => 'No HP tidak boleh kosong',
            ]
        );

        $leader = new Leader;
        $leader->name = $request->name;
        $leader->email = $request->email;
        $leader->phone = $request->phone;
        $leader->save();

        return redirect('/leader')->with('success', 'Data Leader berhasil ditambahkan');
    }

    public function edit($id)
    {
        $leader = Leader::findOrFail($id);

        return view('leader.edit', compact('leader'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],

            [
                'name.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'phone.required' => 'No HP tidak boleh kosong',
            ]
        );

        $leader = Leader::find($id);
        $leader->name = $request->name;
        $leader->email = $request->email;
        $leader->phone = $request->phone;
        $leader->save();
        
        return redirect('/leader')->with('success', 'Data Leader berhasil diubah');

    }

    
    public function destroy($id)
    {
        $leader = Leader::find($id);
        $leader->delete();

        return redirect('/leader')->with('success', 'Data Leader berhasil dihapus');
    }
}
