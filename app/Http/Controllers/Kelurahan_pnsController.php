<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\indikator;
use \App\Models\indikator as Model;
use App\Models\kecamatan;
use App\Models\datakec; // Pastikan Anda mengimpor model Pencapaian


class Kelurahan_pnsController extends Controller
{
    private $viewIndex = 'user_kelurahan';
    private $viewCreate = 'user_formindi';
    private $viewEdit = 'user_formindi';
    private $viewShow = 'user_show';
    private $routePrefix = 'indikator';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function index(Request $request)
    // {
    //     // Ambil semua kelurahan dan indikator untuk dropdown
    //     $kecamatan = kecamatan::all();
    //     $indikators = Indikator::all();

    //     // Ambil data pencapaian berdasarkan filter
    //     $query = datakec::query();

    //     if ($request->has('kecamatan_id') && $request->kecamatan_id != '') {
    //         $query->where('kecamatan_id', $request->kecamatan_id);
    //     }

    //     if ($request->has('indikator_id') && $request->indikator_id != '') {
    //         $query->where('indikator_id', $request->indikator_id);
    //     }
    //     // Menggunakan paginate untuk membatasi jumlah data per halaman
    //     $datakec = $query->paginate(8); // Mengambil 10 data per halaman
    //     // Siapkan data untuk view
    //     $data = compact('kecamatan', 'indikators', 'datakec');


    //     // Menggunakan format baru untuk mengembalikan view
    //     return view('Pns.' . $this->viewIndex, $data);
    // }

    public function index(Request $request)
    {
        // Ambil semua kelurahan dan indikator untuk dropdown
        $kecamatan = kecamatan::all();
        $indikators = Indikator::all();

        // Ambil data pencapaian berdasarkan filter
        $query = datakec::query();

        if ($request->has('kecamatan_id') && $request->kecamatan_id != '') {
            $query->where('kecamatan_id', $request->kecamatan_id);
        }

        if ($request->has('indikator_id') && $request->indikator_id != '') {
            $query->where('indikator_id', $request->indikator_id);
        }

        // Menggunakan paginate untuk membatasi jumlah data per halaman
        $datakec = $query->paginate(8);

        // Data untuk chart
        $chartData = [
            'labels' => $datakec->pluck('kecamatan.nama_kecamatan'),
            'target_2023' => $datakec->pluck('target_2023'),
            'realisasi_2023' => $datakec->pluck('pencapaian_2023'),
            'realisasi_2024' => $datakec->pluck('pencapaian_2024'),
        ];

        // Kirim data ke view
        return view('Pns.' . $this->viewIndex, compact('kecamatan', 'indikators', 'datakec', 'chartData'));
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
