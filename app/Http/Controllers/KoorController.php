<?php

namespace App\Http\Controllers;

use Auth;
use App\Koor;
use App\User;
use App\Kabupaten;
use App\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ValidateKoor;
use Image;

class KoorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if($request->ajax()) {
            $allKoor = Koor::with('kelurahan.kecamatan.kabupaten')->withCount('saksi')->latest()->get();
            return json_encode(['data' => $allKoor]);
        }
        else {
            $this->authorize('index', Koor::class);
            return view('koor.index');
        }
    }

    public function myKoor(Request $request)
    {
        if($request->ajax()) {
            $kelId = Auth::user()->kelurahan->pluck('id')->toArray();
            $myKoor = Koor::with('kelurahan.kecamatan.kabupaten')
                            ->withCount('saksi')
                            ->whereIn('kel_id', $kelId)->latest()->get();
            return json_encode(['data' => $myKoor]);
        }
        else {
            $this->authorize('myKoor', Koor::class);
            return view('koor.mykoor');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Koor::class);
        $user = Auth::user();
        return view('koor.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateKoor $request)
    {
        $koorExist = Koor::where('kel_id', $request['kel'])
                    ->where(function ($query) use ($request){
                        $query->where ('nama', $request['nama'])
                        ->orWhere ('no_hp', $request['nohp']);
                    });
        if($koorExist->exists()) {
            return \Redirect::route('koor.create')
                    ->withErrors(['Data koordinator saksi sudah ada'])
                    ->with('id', $koorExist->first()->id);
        }
        else {
            $newPassword = random(8);
            do {
                $newUsername = random(8);
            }while(User::where('username', $newUsername)->exists());

            $newUser = User::create([
                'role_id'   => 3,
                'username'  => $newUsername,
                'password'  => \Hash::make($newPassword)
            ]);
            
            $resizeKtp = Image::make($request['fotoktp'])->orientate()->widen(600)->encode('jpg');
            $pathFotoKtp = $request['fotoktp']->hashName('public/koor/foto_ktp');
            $fotoKtp = Storage::put($pathFotoKtp, (string) $resizeKtp);
            $fileFotoKtp = basename($pathFotoKtp);
            
            $resizeDiri = Image::make($request['fotodiri'])->orientate()->widen(600)->encode('jpg');
            $pathFotoDiri = $request['fotodiri']->hashName('public/koor/foto_diri');
            $fotoDiri = Storage::put($pathFotoDiri, (string) $resizeDiri);
            $fileFotoDiri = basename($pathFotoDiri);
            
            $newKoor = Koor::create([
                'user_id'           => $newUser->id,
                'kel_id'            => $request['kel'],
                'nama'              => $request['nama'],
                'gender'            => $request['gender'],
                'alamat'            => $request['alamat'],
                'no_hp'             => $request['nohp'],
                'foto_ktp'          => $fileFotoKtp,
                'foto_diri'         => $fileFotoDiri
            ]);
            if($newUser->exists && $newKoor->exists) {
                // \Nexmo::message()->send([
                //     'to'   => '6282247973615',
                //     'from' => '15556666666',
                //     'text' => 'Anda sdh terdaftar sbg Koordinator Saksi dgn username: '.$newUsername.' & password: '.$newPassword
                // ]);
                return \Redirect::route('koor.create')
                    ->with('status', 'Data koordinator saksi berhasil disimpan dengan username: '.$newUsername.' & password: '.$newPassword)
                    ->with('id', $newKoor->id);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Koor  $koor
     * @return \Illuminate\Http\Response
     */
    public function show(Koor $koor)
    {
        $this->authorize('view', $koor);
        return view('koor.show', compact('koor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Koor  $koor
     * @return \Illuminate\Http\Response
     */
    public function edit(Koor $koor)
    {
        $this->authorize('edit', $koor);
        $user = Auth::user();
        return view('koor.edit', compact('koor', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Koor  $koor
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateKoor $request, Koor $koor)
    {
        $this->authorize('update', $koor);
        
        if($request->hasFile('fotoktp')) {
            // STORE NEW ONE
            $resizeKtp = Image::make($request['fotoktp'])->orientate()->widen(600)->encode('jpg');
            $pathFotoKtp = $request['fotoktp']->hashName('public/koor/foto_ktp');
            $fotoKtp = Storage::put($pathFotoKtp, (string) $resizeKtp);
            $fileFotoKtp = basename($pathFotoKtp);

            // DELETE OLD ONE
            Storage::delete('public/koor/foto_ktp/'.$koor->foto_ktp);

            // UPDATE DATABASE
            $koor->update([
                'foto_ktp'          => $fileFotoKtp
            ]);
        }
        if($request->hasFile('fotodiri')) {
            $resizeDiri = Image::make($request['fotodiri'])->orientate()->widen(600)->encode('jpg');
            $pathFotoDiri = $request['fotodiri']->hashName('public/koor/foto_diri');
            $fotoDiri = Storage::put($pathFotoDiri, (string) $resizeDiri);
            $fileFotoDiri = basename($pathFotoDiri);

            Storage::delete('public/koor/foto_diri/'.$koor->foto_diri);

            $koor->update([
                'foto_diri'          => $fileFotoDiri
            ]);
        }

        if(Auth::user()->id === $koor->kelurahan->kecamatan->user->id) {
            $koor->update([
                'kel_id'            => $request['kel'],
                'nama'              => $request['nama'],
                'gender'            => $request['gender'],
                'alamat'            => $request['alamat'],
                'no_hp'             => $request['nohp']
            ]);
            if($koor) {
                return back()->with('status', 'Data koordinator saksi berhasil diupdate');
            }
        }
        else {
            $koor->update([
                'nama'              => $request['nama'],
                'gender'            => $request['gender'],
                'alamat'            => $request['alamat'],
                'no_hp'             => $request['nohp']
            ]);
            if($koor) {
                return back()->with('status', 'Data profil berhasil diupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Koor  $koor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Koor $koor)
    {
        $this->authorize('delete', $koor);
        if($koor->saksi->count() > 0) {
            return redirect()->back()->withErrors("Koordinator tidak bisa dihapus karena masih memiliki saksi");
        }

        Storage::delete('public/koor/foto_ktp/'.$koor->foto_ktp);
        Storage::delete('public/koor/foto_diri/'.$koor->foto_diri);

        $koorIsDeleted = Koor::destroy($koor->id);
        User::destroy($koor->user_id);

        $koor = Koor::first();
        if(!$koor)
        {
            DB::update("ALTER TABLE koor AUTO_INCREMENT= 1");
        }
        
        if($koorIsDeleted) {
            if(app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName() == "mykoor") {
                return redirect()->route('mykoor')->with('status', 'Data koordinator saksi sudah dihapus');
            }
            else {
                return redirect()->route('koor.index')->with('status', 'Data koordinator saksi sudah dihapus');
            }
        }
    }
}
