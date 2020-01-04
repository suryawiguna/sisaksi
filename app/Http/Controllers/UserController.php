<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Koor;
use App\Saksi;
use App\Kelurahan;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $allUser = User::with(['role' => function($query) {
                            $query->select(['id','name']);
                        }])->get(['id','role_id','username']);
            return json_encode(['data' => $allUser]);
        }
        else {
            $this->authorize('index', User::class);
            return view('user.index');
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        if($user->role_id == 1) {
            return view('user.pimpinan', compact('user'));
        }
        else if($user->role_id == 2) {
            $koor = Koor::whereIn('kel_id', $user->kelurahan->pluck('id')->toArray());
            $saksi = Saksi::whereIn('koor_id', $koor->pluck('id')->toArray());
            return view('user.komisisaksi', compact('user', 'koor', 'saksi'));
        }
        else if($user->role_id == 3) {
            return view('user.koor', compact('user'));
        }
        else if($user->role_id == 4) {
            return view('user.saksi', compact('user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateUser $request, User $user)
    {
        $this->authorize('update', $user);
        if($request->has('reset-username')) {
            do {
                $newUsername = random(8);
            }while(User::where('username', $newUsername)->exists());
            $user->username = $newUsername;
            $user->save();

            if($user->save()) {
                if(app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName() == "koor.show") {
                    return back()->with('status', 'Username koordinator saksi berhasil direset. Username : '.$newUsername);
                }
                else if(app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName() == "saksi.show") {
                    return back()->with('status', 'Username saksi berhasil direset. Username : '.$newUsername);
                }
            }
        }
        else if($request->has('username')){
            $user->username = $request['username'];
            $user->save();
            if($user->save()) {
                return back()->with('status', 'Username Anda berhasil diubah. Username : '.$request['username']);
            }
        }

        if($request->has('reset-password')) {
            $newPassword = random(8);
            $user->password = \Hash::make($newPassword);
            $user->save();
            if($user->save()) {
                if(app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName() == "koor.show") {
                    return back()->with('status', 'Password koordinator saksi berhasil direset. Password : '.$newPassword);
                }
                else if(app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName() == "saksi.show") {
                    return back()->with('status', 'Password saksi berhasil direset. Password : '.$newPassword);
                }
                else if(app('router')->getRoutes()->match(app('request')->create(\URL::previous()))->getName() == "user.show") {
                    return back()->with('status', 'Password pengguna berhasil direset. Password : '.$newPassword);
                }
            }
        }
        else if($request->has('password-lama', 'password', 'password-baru')){
            if(\Hash::check($request['password-lama'], Auth::user()->password)) {
                $user->password = \Hash::make($request['password']);
                $user->save();
                if($user->save()) {
                    return back()->with('status', 'Password Anda berhasil direset. Password : '.$request['password']);
                }
            }
            else {
                return redirect()->back()->withErrors("Ubah password gagal. Password lama tidak cocok.");
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function akunSaya() {
        $user = User::find(Auth::user()->id);

        if($user->role_id == 1) {
            return view('user.pimpinan', compact('user'));
        }
        else if($user->role_id == 2) {
            $koor = Koor::whereIn('kel_id', $user->kelurahan->pluck('id')->toArray());
            $saksi = Saksi::whereIn('koor_id', $koor->pluck('id')->toArray());
            return view('user.komisisaksi', compact('user', 'koor', 'saksi'));
        }
        else if($user->role_id == 3) {
            return view('user.koor', compact('user'));
        }
        else if($user->role_id == 4) {
            return view('user.saksi', compact('user'));
        }
    }

    public function checkPassword(Request $request, $password) {
        if($request->ajax()) {
            $result = \Hash::check($password, Auth::user()->password);
            return json_encode($result);
        }
        else {
            abort(404);
        }
    }

    public function editProfilSaya() {
        $this->authorize('editProfil', User::class);
        $user = User::find(Auth::id());
        if($user->role_id === 3) {
            return view('user.edit.koor', compact('user'));
        }
        else if($user->role_id === 4) {
            return view('user.edit.saksi', compact('user'));            
        }
    }
}
