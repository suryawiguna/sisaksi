<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Koor;
use App\Saksi;
use App\User;
use App\Kabupaten;
use App\Kelurahan;
use App\Partai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ValidateSaksi;
use Image;

class SaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $allSaksi = Saksi::with(['koor' => function($query) {
                            $query->select(['id','kel_id','nama']);
                        }, 'koor.kelurahan.kecamatan.kabupaten', 'partai'])->orderBy('created_at', 'DESC')
                        ->latest()->get(['id','koor_id','partai_id','tps','nama','gender','alamat','no_hp']);
            return json_encode(['data' => $allSaksi]);
        }
        else {
            $this->authorize('index', Saksi::class);
            return view('saksi.index');
        }
    }

    public function mySaksi(Request $request)
    {
        if($request->ajax()) {
            $kelId = Auth::user()->kelurahan->pluck('id')->toArray();
            $koorId = Koor::whereIn('kel_id', $kelId)->pluck('id')->toArray();
            $mySaksi = Saksi::with(['koor' => function($query) {
                            $query->select(['id','kel_id','nama']);
                        }, 'koor.kelurahan.kecamatan.kabupaten', 'partai'])
                        ->whereIn('koor_id', $koorId)
                        ->latest()->get(['id','koor_id','partai_id','tps','nama','gender','alamat','no_hp']);
            return json_encode(['data' => $mySaksi]);
        }
        else {
            $this->authorize('mySaksi', Saksi::class);
            return view('saksi.mysaksi');
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Saksi::class);
        $user = Auth::user();
        $partai = Partai::all();
        return view('saksi.create', compact('user','partai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateSaksi $request)
    {
        $saksiSatuTPS = Saksi::where('koor_id', $request['koor'])
                        ->where('tps', $request['notps'])
                        ->count();
        $koorSatuTPS = Koor::find($request['koor']);

        $saksiExist = Saksi::where(function ($query) use ($request){
                        $query->where('koor_id', $request['koor'])
                        ->where('partai_id', $request['partai'])
                        ->where('tps', $request['notps']);
                    })
                    ->where(function ($query) use ($request){
                        $query->where ('nama', $request['nama'])
                        ->where ('gender', $request['gender'])
                        ->where ('alamat', $request['alamat'])
                        ->where ('no_hp', $request['nohp']);
                    })
                    ->exists();
        if($saksiExist) {
            return redirect()->back()->withErrors(['Data Saksi sudah ada']);
        }
        else if($saksiSatuTPS == 2) {
            return \Redirect::route('saksi.create')
                    ->withErrors(['TPS-'.$request['notps'].' sudah ada 2 saksi dengan koordinator '.$koorSatuTPS->nama.''])
                    ->with('id', $koorSatuTPS->id);
        }
        else {
            $newPassword = random(8);
            do {
                $newUsername = random(8);
            }while(User::where('username', $newUsername)->exists());

            $newUser = User::create([
                'role_id'   => 4,
                'username'  => $newUsername,
                'password'  => \Hash::make($newPassword)
            ]);

            $resizeKtp = Image::make($request['fotoktp'])->orientate()->widen(600)->encode('jpg');
            $pathFotoKtp = $request['fotoktp']->hashName('public/saksi/foto_ktp');
            $fotoKtp = Storage::put($pathFotoKtp, (string) $resizeKtp);
            $fileFotoKtp = basename($pathFotoKtp);
            
            $resizeDiri = Image::make($request['fotodiri'])->orientate()->widen(600)->encode('jpg');
            $pathFotoDiri = $request['fotodiri']->hashName('public/saksi/foto_diri');
            $fotoDiri = Storage::put($pathFotoDiri, (string) $resizeDiri);
            $fileFotoDiri = basename($pathFotoDiri);

            $newSaksi = Saksi::create([
                'user_id'           => $newUser->id,
                'koor_id'           => $request['koor'],
                'partai_id'         => $request['partai'],
                'tps'               => $request['notps'],
                'nama'              => $request['nama'],
                'gender'            => $request['gender'],
                'alamat'            => $request['alamat'],
                'no_hp'             => $request['nohp'],
                'foto_ktp'          => $fileFotoKtp,
                'foto_diri'         => $fileFotoDiri
            ]);
            if($newUser->exists && $newSaksi->exists) {
                // \Nexmo::message()->send([
                //     'to'   => '6282247973615',
                //     'from' => '15556666666',
                //     'text' => 'Anda sdh terdaftar sbg Koordinator Saksi dgn username: '.$newUsername.' & password: '.$newPassword
                // ]);
                return \Redirect::route('saksi.create')
                    ->with('status', 'Data Saksi berhasil disimpan dengan username: '.$newUsername.' & password: '.$newPassword)
                    ->with('id', $newSaksi->id);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Saksi $saksi)
    {
        $this->authorize('view', $saksi);
        return view('saksi.show', compact('saksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Saksi $saksi)
    {
        $this->authorize('edit', $saksi);
        $user = Auth::user();
        $partai = Partai::all();
        return view('saksi.edit', compact('saksi', 'user', 'partai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateSaksi $request, Saksi $saksi)
    {
        $this->authorize('update', $saksi);
        
        if($request->hasFile('fotoktp')) {
            // STORE NEW ONE
            $resizeKtp = Image::make($request['fotoktp'])->orientate()->widen(600)->encode('jpg');
            $pathFotoKtp = $request['fotoktp']->hashName('public/saksi/foto_ktp');
            $fotoKtp = Storage::put($pathFotoKtp, (string) $resizeKtp);
            $fileFotoKtp = basename($pathFotoKtp);

            // DELETE OLD ONE
            Storage::delete('public/saksi/foto_ktp/'.$saksi->foto_ktp);

            // UPDATE DATABASE
            $saksi->update([
                'foto_ktp'          => $fileFotoKtp
            ]);
        }
        if ($request->hasFile('fotodiri')) {
            $resizeDiri = Image::make($request['fotodiri'])->orientate()->widen(600)->encode('jpg');
            $pathFotoDiri = $request['fotodiri']->hashName('public/saksi/foto_diri');
            $fotoDiri = Storage::put($pathFotoDiri, (string) $resizeDiri);
            $fileFotoDiri = basename($pathFotoDiri);

            Storage::delete('public/saksi/foto_diri/'.$saksi->foto_diri);

            $saksi->update([
                'foto_diri'          => $fileFotoDiri
            ]);
        }

        if(Auth::user()->id === $saksi->koor->kelurahan->kecamatan->user->id) {
            $saksi->update([
                'koor_id'           => $request['koor'],
                'partai_id'         => $request['partai'],
                'tps'               => $request['notps'],
                'nama'              => $request['nama'],
                'gender'            => $request['gender'],
                'alamat'            => $request['alamat'],
                'no_hp'             => $request['nohp']
            ]);

            if($saksi) {
                return back()->with('status', 'Data Saksi berhasil diupdate');
            }
        }
        else {
            $saksi->update([
                'nama'              => $request['nama'],
                'gender'            => $request['gender'],
                'alamat'            => $request['alamat'],
                'no_hp'             => $request['nohp']
            ]);

            if($saksi) {
                return back()->with('status', 'Data Saksi berhasil diupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saksi $saksi)
    {
        $this->authorize('delete', $saksi);

        Storage::delete('public/saksi/foto_ktp/'.$saksi->foto_ktp);
        Storage::delete('public/saksi/foto_diri/'.$saksi->foto_diri);

        $saksiIsDeleted = Saksi::destroy($saksi->id);
        User::destroy($saksi->user_id);

        $saksi = Saksi::first();
        if(!$saksi)
        {
            DB::update("ALTER TABLE saksi AUTO_INCREMENT= 1");
        }
        
        if($saksiIsDeleted) {
            if(app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName() == "mysaksi") {
                return redirect()->route('mysaksi')->with('status', 'Data Saksi sudah dihapus');
            }
            else if(app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName() == "koor.show") {
                return redirect()->back()->with('status', 'Data Saksi sudah dihapus');
            }
            else {
                return redirect()->route('saksi.index')->with('status', 'Data Saksi sudah dihapus');
            }
        }
    }

    public function getKoor(Request $request, $id)
    {
        if($request->ajax()) {
            $koor = Koor::where('kel_id', $id)->pluck('nama', 'id');
            return json_encode($koor);
        }
        else {
            abort(404);
        }
    }
}
