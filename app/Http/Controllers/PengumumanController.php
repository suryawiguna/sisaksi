<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatePengumuman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $pengumuman = Pengumuman::where('status', 1)->latest()->get();
            return json_encode(['data' => $pengumuman]);
        }
        else {
            $this->authorize('index', Pengumuman::class);
            return view('pengumuman.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Pengumuman::class);
        return view('pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePengumuman $request)
    {
        $status = ($request->has('status')) ? 1 : 0;
        if ($request->hasFile('lampiran')) {
            $realName = basename($request->file('lampiran')->getClientOriginalName(), '.'.$request->file('lampiran')->getClientOriginalExtension());
            $uniqueName = $realName . '_'.time().'.' . $request->file('lampiran')->getClientOriginalExtension();
            $file = $request->file('lampiran')->storeAs('public/pengumuman/lampiran', $uniqueName,'local');

            $newPengumuman = Pengumuman::create([
                'user_id'   => Auth::user()->id,
                'judul'     => $request['judul'],
                'isi'       => $request['isi'],
                'lampiran'  => $uniqueName,
                'status'    => $status
            ]);
        }
        else {
            $newPengumuman = Pengumuman::create([
                'user_id'   => Auth::user()->id,
                'judul'     => $request['judul'],
                'isi'       => $request['isi'],
                'status'    => $status
            ]);
        }
        if($newPengumuman) {
            return \Redirect::route('pengumuman.create')
                ->with('status', 'Pengumuman berhasil disimpan')
                ->with('id', $newPengumuman->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        $this->authorize('view', $pengumuman);
        return view('pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        $this->authorize('edit', $pengumuman);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePengumuman $request, Pengumuman $pengumuman)
    {
        $this->authorize('update', $pengumuman);
        if($request->has('hapus-lampiran')) {
            Storage::delete('public/pengumuman/lampiran/'.$pengumuman->lampiran);
            $pengumuman->update([
                'lampiran'  => null
            ]);
        }
        if($request->hasFile('lampiran')) {
            // STORE NEW ONE
            $realName = basename($request->file('lampiran')->getClientOriginalName(), '.'.$request->file('lampiran')->getClientOriginalExtension());
            $uniqueName = $realName . '_'.time().'.' . $request->file('lampiran')->getClientOriginalExtension();
            $file = $request->file('lampiran')->storeAs('public/pengumuman/lampiran', $uniqueName,'local');

            // DELETE OLD ONE
            Storage::delete('public/pengumuman/lampiran/'.$pengumuman->lampiran);

            // UPDATE DATABASE
            $pengumuman->update([
                'lampiran'  => $uniqueName
            ]);
        }

        if($request->has('status')) {
            $pengumuman->update([
                'status'  => 1
            ]);
        }
        else {
            $pengumuman->update([
                'status'  => 0
            ]);
        }

        $pengumuman->update([
            'judul'  => $request['judul'],
            'isi'    => $request['isi']
        ]);

        if($pengumuman) {
            return back()->with('status', 'Pengumuman berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $this->authorize('delete', $pengumuman);
        Storage::delete('public/pengumuman/lampiran/'.$pengumuman->lampiran);
        $isDeleted = Pengumuman::destroy($pengumuman->id);
        
        if(!Pengumuman::first()) {
            DB::update("ALTER TABLE pengumuman AUTO_INCREMENT= 1");
        }
        if($isDeleted) {
            if(app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName() == "pengumumanku") {
                return redirect()->back()->with('status', 'Pengumuman berhasil dihapus');
            }
            else {
                return redirect()->route('pengumumanku')->with('status', 'Pengumuman berhasil dihapus');
            }
        }
    }

    public function pengumumanku(Request $request) {
        if($request->ajax()) {
            $pengumuman = Pengumuman::latest()->get();
            return json_encode(['data' => $pengumuman]);
        }
        else {
            $this->authorize('pengumumanku', Pengumuman::class);
            return view('pengumuman.pengumumanku');
        }
    }

    public function updateStatus(Request $request, $id, $boolean) {
        if($request->ajax()) {
            $updated = Pengumuman::where('id', $id)->update(['status' => $boolean]);
        }
        else {
            abort(404);
        }
    }
}
