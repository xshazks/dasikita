<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\indikator as Model;
use \App\Models\indikator;



class IndikatorController extends Controller
{
    private $viewIndex = 'user_indikator';
    private $viewCreate = 'user_formindi';
    private $viewEdit = 'user_formindi';
    private $viewShow = 'user_show';
    private $routePrefix = 'indikator';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Ambil semua data indikator beserta relasi kelurahan
        $indikators = Indikator::with('kelurahan')->get();

        // Kirim data indikator ke view
        return view('Admin.' . $this->viewIndex, [
            'models' => Model::latest()->paginate(50), // No filtering
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Indikator'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'model' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'Form Data Indikator'
        ];
        return view('Admin.' . $this->viewCreate, $data);

        //
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
            'indikator' => 'required',
            'deskripsi' => 'required',
        ]);
        Model::create([
            'indikator' => $request->indikator,
            'deskripsi' => $request->deskripsi,
        ]);
        flash('Data berhasil disimpan');
        return redirect()->route('indikator.index');
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
            'title' => 'Form Data Indikator'
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
            'indikator' => 'required',
            'deskripsi' => 'required'

        ]);
        $model = Model::findOrFail($id);
        $model->fill($requestData);
        $model->save();
        flash('Data berhasil disimpan');
        return redirect()->route('indikator.index');
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
