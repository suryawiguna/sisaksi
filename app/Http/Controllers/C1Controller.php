<?php

namespace App\Http\Controllers;

use Auth;
use App\C1;
use App\User;
use App\Saksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class C1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $allC1 = C1::with(['saksi' => function($query) {
                            $query->select(['id','koor_id','tps','nama']);
                        }, 'saksi.koor.kelurahan.kecamatan.kabupaten'])->orderBy('created_at', 'DESC')
                        ->latest()->get();
            return json_encode(['data' => $allC1]);
        }
        else {
            $this->authorize('index', C1::class);
            return view('c1.index');
        }
    }

    public function c1Saya() {
        $this->authorize('c1Saya', C1::class);
        $user = User::find(Auth::id());
        return view('c1.c1saya', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', C1::class);
        $user = User::find(Auth::id());
        if($user->saksi->c1) {
            abort(403, "Anda sudah mengupload 1 foto formulir C1");
        }
        return view('c1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'foto_c1'   => 'required|file|mimes:jpeg,jpg,bmp,png|max:5000',
            ]);
            $user = User::find(Auth::id());
    
            $tps = 'TPS-'.$user->saksi->tps;
            $kel = $user->saksi->koor->kelurahan->nama;
            $realName = basename($request->file('foto_c1')->getClientOriginalName(), '.'.$request->file('foto_c1')->getClientOriginalExtension());
            $uniqueName = $tps . '-' . $kel . '_' . $realName . '_'.time().'.' . $request->file('foto_c1')->getClientOriginalExtension();
            $file = $request->file('foto_c1')->storeAs('public/c1', $uniqueName,'local');
    
            $newC1 = C1::create([
                'saksi_id'  => $user->saksi->id,
                'foto_c1'   => $uniqueName
            ]);
            return redirect()->route('c1saya')->with('status', 'Foto C1 berhasil disimpan');
        }
        catch(\Exception $exception) {
            abort(403, $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\C1  $c1
     * @return \Illuminate\Http\Response
     */
    public function show(C1 $c1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\C1  $c1
     * @return \Illuminate\Http\Response
     */
    public function edit(C1 $c1)
    {
        $this->authorize('edit', $c1);
        return view('c1.edit', compact('c1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\C1  $c1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, C1 $c1)
    {
        $this->authorize('update', $c1);
        if($request->has('foto_c1')) {
            try {
                $request->validate([
                    'foto_c1'   => 'required|file|mimes:jpeg,jpg,bmp,png|max:5000',
                ]);
                $user = User::find(Auth::id());
        
                $tps = 'TPS-'.$user->saksi->tps;
                $kel = $user->saksi->koor->kelurahan->nama;
                $realName = basename($request->file('foto_c1')->getClientOriginalName(), '.'.$request->file('foto_c1')->getClientOriginalExtension());
                $uniqueName = $tps . '-' . $kel . '_' . $realName . '_'.time().'.' . $request->file('foto_c1')->getClientOriginalExtension();            
                $file = $request->file('foto_c1')->storeAs('public/c1', $uniqueName,'local');
    
                Storage::delete('public/c1/'.$c1->foto_c1);
        
                $c1->update([
                    'foto_c1'   => $uniqueName
                ]);
                return back()->with('status', 'Foto C1 berhasil diupdate');
            }
            catch(\Exception $exception) {
                abort(403, $exception->getMessage());
            }
        }
        else {
            return back()->with('status', 'Foto C1 berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\C1  $c1
     * @return \Illuminate\Http\Response
     */
    public function destroy(C1 $c1)
    {
        $this->authorize('delete', $c1);
        Storage::delete('public/c1/'.$c1->foto_c1);
        $isDeleted = C1::destroy($c1->id);
        
        if(!C1::first()) {
            DB::update("ALTER TABLE c1 AUTO_INCREMENT= 1");
        }
        if($isDeleted) {
            return back()->with('status', 'Foto C1 berhasil dihapus');
        }
    }
}
