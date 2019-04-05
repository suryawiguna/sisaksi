<?php

namespace App\Http\Controllers;

use App\Partai;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatePartai;

class PartaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $allPartai = Partai::withCount('saksi')->get();
            return json_encode(['data' => $allPartai]);
        }
        else {
            $this->authorize('index', Partai::class);
            return view('partai.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Partai::class);
        return view('partai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePartai $request)
    {
        $partaiExist = Partai::where('nama', $request['nama'])
                            ->orWhere('deskripsi', $request['deskripsi']);
        if($partaiExist->exists()) {
            return \Redirect::route('partai.create')
                    ->withErrors(['Data partai sudah ada']);
        }
        else {
            $newPartai = Partai::create([
                'nama'      => $request['nama'],
                'deskripsi' => $request['deskripsi']
            ]);

            if($newPartai->exists) {
                return back()->with('status', 'Partai berhasil disimpan');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partai  $partai
     * @return \Illuminate\Http\Response
     */
    public function show(Partai $partai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partai  $partai
     * @return \Illuminate\Http\Response
     */
    public function edit(Partai $partai)
    {
        $this->authorize('edit', $partai);
        return view('partai.edit', compact('partai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partai  $partai
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePartai $request, Partai $partai)
    {
        $this->authorize('update', $partai);
        $partai->update([
            'nama'      => $request['nama'],
            'deskripsi' => $request['deskripsi']
        ]);
        if($partai) {
            return back()->with('status', 'Partai berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partai  $partai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partai $partai)
    {
        $this->authorize('delete', $partai);
        $partaiIsDeleted = Partai::destroy($partai->id);
        if(!Partai::first()) {
            DB::update("ALTER TABLE partai AUTO_INCREMENT= 1");
        }
        if($partaiIsDeleted) {
            return back()->with('status', 'Partai berhasil dihapus');
        }
    }
}
