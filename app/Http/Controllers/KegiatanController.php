<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\kegiatan as Model;
use App\Models\program; // Import the Program model


class KegiatanController extends Controller
{
    private $viewIndex = 'user_kegiatan';
    private $viewCreate = 'user_formkegiatan';
    private $viewEdit = 'user_formkegiatan';
    private $viewShow = 'user_show';
    private $routePrefix = 'kegiatan';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.' . $this->viewIndex, [
            'models' => Model::latest()->paginate(50), // No filtering
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Nomenklatur Kegiatan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        $data = [
            'model' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'Form Data Nomenklatur Program',
            'programs' => $programs
        ];

        return view('Admin.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'id_program' => 'required',
            'nama' => 'required',
            'indikator' => 'required',
            'target' => 'required',
        ]);
        Model::create([
            'id_program' => $request->id_program,
            'nama' => $request->nama,
            'indikator' => $request->indikator,
            'target' => $request->target,
        ]);
        flash('Data berhasil disimpan');
        return redirect()->route('kegiatan.index');
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


    public function edit($id)
    {
        $data = [
            'model' => Model::findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $id],
            'button' => 'UPDATE',
            'title' => 'Form Data OPD Terkait'
        ];
        return view('Admin.' . $this->viewEdit, $data);
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
        $requestData = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required'

        ]);
        $model = Model::findOrFail($id);
        $model->fill($requestData);
        $model->save();
        flash('Data berhasil disimpan');
        return redirect()->route('opd.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Model::findOrFail($id);

        if ($model->email == 'admin@gmail.com') {
            flash('Data tidak bisa dihapus')->error();
            return  back();
        }


        $model = Model::findOrFail($id);
        $model->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}
