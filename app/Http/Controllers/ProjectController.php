<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leader;
use App\Models\Client;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $data_project = Project::all();
        
        return view('project.index', compact('data_project'));
    }

    public function create()
    {
        $data_leader = Leader::all();
        $data_client = Client::all();

        return view('project.create', compact('data_leader', 'data_client'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'client_id' => 'required',
                'leader_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'progress' => 'required',
            ],

            [
                'name.required' => 'Nama tidak boleh kosong',
                'client_id.required' => 'Nama Client tidak boleh kosong',
                'leader_id.required' => 'Nama Leader tidak boleh kosong',
                'start_date.required' => 'Tanggal Mulai Tidak Boleh Kosong',
                'end_date.required' => 'Tanggal Akhir  tidak boleh kosong',
                'progress.required' => 'Progress tidak boleh kosong',
            ]
        );

        $project = new Project;
        $project->name = $request->name;
        $project->client_id = $request->client_id;
        $project->leader_id = $request->leader_id;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->progress = $request->progress;
        $project->save();

        return redirect('/project')->with('success', 'Data Project berhasil ditambah');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $data_client = Client::all();
        $data_leader = Leader::all();

        return view('project.edit', compact('data_leader', 'data_client', 'project'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'client_id' => 'required',
                'leader_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'progress' => 'required',
            ],

            [
                'name.required' => 'Nama tidak boleh kosong',
                'client_id.required' => 'Nama Client tidak boleh kosong',
                'leader_id.required' => 'Nama Leader tidak boleh kosong',
                'start_date.required' => 'Tanggal Mulai Tidak Boleh Kosong',
                'end_date.required' => 'Tanggal Akhir  tidak boleh kosong',
                'progress.required' => 'Progress tidak boleh kosong',
            ]
        );

        $project = Project::find($id);
        $project->name = $request->name;
        $project->client_id = $request->client_id;
        $project->leader_id = $request->leader_id;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->progress = $request->progress;
        $project->save();
        
        return redirect('/project')->with('success', 'Data Project berhasil diubah');

    }

    
    public function destroy($id)
    {
        $leader = Project::find($id);
        $leader->delete();

        return redirect('/project')->with('success', 'Data Project berhasil dihapus');;
    }
}
