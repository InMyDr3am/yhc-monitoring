<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $data_client = Client::all();

        return view('client.index', compact('data_client'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ],

            [
                'name.required' => 'Nama tidak boleh kosong',
                'address.required' => 'Alamat tidak boleh kosong',
                'phone.required' => 'No HP tidak boleh kosong',
            ]
        );

        $client = new Client;
        $client->name = $request->name;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->save();

        return redirect('/client')->with('success', 'Data Client berhasil ditambahkan');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('client.edit', compact('client'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ],

            [
                'name.required' => 'Nama tidak boleh kosong',
                'address.required' => 'Alamat tidak boleh kosong',
                'phone.required' => 'No HP tidak boleh kosong',
            ]
        );

        $client = Client::find($id);
        $client->name = $request->name;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->save();
        
        return redirect('/client')->with('success', 'Data Client berhasil diubah');

    }

    
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect('/client')->with('success', 'Data Client berhasil dihapus');
    }
}
