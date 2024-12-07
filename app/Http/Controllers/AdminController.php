<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User as Model;


class AdminController extends Controller
{
    private $viewIndex = 'user_admin';
    private $viewCreate = 'admin_form';
    private $viewEdit = 'user_form';
    private $viewShow = 'user_show';
    private $routePrefix = 'admin1';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.' . $this->viewIndex, [
            'models' => Model::where('akses', '<>', 'pns')
                ->latest()
                ->Paginate(50),
            'routePrefix' => $this->routePrefix,
            'title' => 'Data Admin'

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
            'title' => 'Form Data Admin'
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
            'name' => 'required',
            'nohp' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);
        $requestData['password'] = bcrypt($requestData['password']);
        $requestData['akses'] = 'admin';
        Model::create($requestData);
        flash('Data berhasil disimpan');
        return redirect()->route('admin1.index');
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
            'title' => 'Form Data Admin'
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
            'name' => 'required',
            'nohp' => 'required|unique:users,nohp,' . $id,
            'email' => 'required|unique:users,email,' . $id,
            'password' => 'nullable',

        ]);
        $model = Model::findOrFail($id);
        if ($requestData['password'] == "") {
            unset($requestData['password']);
        } else {
            $requestData['password'] = bcrypt($requestData['password']);
        }
        $model->fill($requestData);
        $model->save();
        flash('Data berhasil disimpan');
        return redirect()->route('admin1.index');
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
