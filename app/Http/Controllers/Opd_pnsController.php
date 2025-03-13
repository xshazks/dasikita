<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use Illuminate\Http\Request;
use \App\Models\Opd as Model;
use \App\Models\Opds as Modelss;



class Opd_pnsController extends Controller
{
    private $viewIndex = 'user_opd';
    private $viewCreate = 'user_formopd';
    private $viewEdit = 'user_formopd';
    private $viewShow = 'user_opds';
    private $routePrefix = 'opd-pns';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pns.' . $this->viewIndex, [
            'models' => Model::latest()->paginate(50), // No filtering
            'routePrefix' => $this->routePrefix,
            'title' => 'Data OPD Terkait'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $test = Model::all();
        // dd($test);
        $data = [

            'indikators' => Model::all(),
            'model' => new Modelss(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'Form Data OPD Terkait'
        ];
        return view('Pns.' . $this->viewCreate, $data);

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
            'program' => 'required',
            'kegiatan' => 'required',
            'sub_kegiatan' => 'required',
            'anggaran' => 'required|numeric', // Pastikan anggaran adalah angka
            'komponen_belanja_khusus_stunting' => 'required',
            'indikator_id' => 'required|exists:indikators,id',
        ]);

        // dd($requestData);
        // Simpan data baru dan ambil model yang baru saja dibuat
        $model = Modelss::create($requestData);

        flash('Data berhasil disimpan');

        // Redirect ke halaman detail dari model yang baru saja dibuat

        // $data_indikators = Modelss::where('indikator_id', $model->indikator_id)->latest()->paginate(50);
        // return redirect()->route('opd-pns.show', ['opd' => $model->indikator_id]);
        return redirect()->route('opd-pns.show', ['opd_pn' => $model->indikator_id]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $model = Modelss::findOrFail($id);
        // dd($model);

        return view('Pns.' . $this->viewShow, [
            'models' => Modelss::where('indikator_id', $id)->latest()->paginate(50), // No filtering
            // 'model' => $model,
            'routePrefix' => $this->routePrefix,
            'title' => 'Data OPD Terkait'
        ]);
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
            'indikators' => Model::all(),
            'model' => Modelss::findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $id],
            'button' => 'UPDATE',
            'title' => 'Form Data OPD Terkait'
        ];
        return view('Pns.' . $this->viewEdit, $data);
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
            'program' => 'required',
            'kegiatan' => 'required',
            'sub_kegiatan' => 'required',
            'anggaran' => 'required|numeric',
            'komponen_belanja_khusus_stunting' => 'required',
            'indikator_id' => 'required',

        ]);

        $model = Modelss::findOrFail($id);
        $model->fill($requestData);
        $model->save();
        flash('Data berhasil disimpan');
        return redirect()->route('opd-pns.show', ['opd_pn' => $model->indikator_id]);

        // return redirect()->route('opd.show', ['id' => $model->id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Modelss::findOrFail($id);

        if ($model->email == 'admin@gmail.com') {
            flash('Data tidak bisa dihapus')->error();
            return  back();
        }


        $model = Modelss::findOrFail($id);
        $model->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}
