<?php

namespace App\Http\Controllers;

use Auth;
use App\Kabupaten;
use App\Kecamatan;
use App\Target;
use App\Koor;
use App\Saksi;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(Auth::user()->is(1) || Auth::user()->is(2)) {
            $target = [
                0 => array( 'jumKoor' => Koor::count(),
                            'jumSaksi' => Saksi::count(), 
                            'targetKoor' => Target::sum('target_koor'),
                            'targetSaksi' => Target::sum('target_saksi'),
                            'persenKoor' => number_format((Koor::count()/Target::sum('target_koor'))*100,1,',',''),
                            'persenSaksi' => number_format((Saksi::count()/Target::sum('target_saksi'))*100,1,',','')
                     )
            ];
            
            for ($id = 1; $id <= 9; $id++){
                $kab = Kabupaten::find($id);
                
                $kel_id = [$kab->kelurahan->pluck('id')->toArray()];
                $kel = [];
                foreach ($kel_id as $x) {
                    $kel = array_merge($kel, $x);
                }
    
                $koor_id = [Koor::whereIn('kel_id', $kel)->pluck('id')->toArray()];
                $koor = [];
                foreach ($koor_id as $y) {
                    $koor = array_merge($koor, $y);
                }
                
                $target[$id]['nama'] = Target::find($id)->kabupaten->nama;
                $target[$id]['jumKoor'] = Koor::whereIn('kel_id', $kel)->count();
                $target[$id]['jumSaksi'] = Saksi::whereIn('koor_id', $koor)->count();
                $target[$id]['targetKoor'] = Target::find($id)->target_koor;
                $target[$id]['targetSaksi'] = Target::find($id)->target_saksi;
                $target[$id]['persenKoor'] = round(($target[$id]['jumKoor']/$target[$id]['targetKoor'])*100, 1);
                $target[$id]['persenSaksi'] = round(($target[$id]['jumSaksi']/$target[$id]['targetSaksi'])*100, 1);
            }
          
            $totalKoor = Target::sum('target_koor');
            $totalSaksi = Target::sum('target_saksi');
    
            return view('target.index', compact('target'));
        }
        else {
            return redirect()->route('pengumuman.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function show(Target $target)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function edit(Target $target)
    {
        $this->authorize('edit', $target);
        return view('target.edit', compact('target'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Target $target)
    {
        $request->validate([
            'target_koor'   => 'required|numeric|between:0,9999',
            'target_saksi'  => 'required|numeric|between:0,9999',
        ]);
        $target->update([
            'target_koor'   => $request['target_koor'],
            'target_saksi'  => $request['target_saksi'],
        ]);
        if($target) {
            return back()->with('status', 'Target berhasil diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Target  $target
     * @return \Illuminate\Http\Response
     */
    public function destroy(Target $target)
    {
        //
    }
}
