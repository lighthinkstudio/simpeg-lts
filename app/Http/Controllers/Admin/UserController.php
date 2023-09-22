<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Pegawai;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $m_user)
    {
        $user = $m_user->listing();
        // dd($user);

        $data = [
            'title'     => 'DATA PENGGUNA',
            'user'      => $user,
        ];
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pegawai $m_pegawai, Role $m_role)
    {
        //
        $role = $m_role->simpeg();
        $pegawai = $m_pegawai->aktif();
        // dd($user);

        $data = [
            'title'     => 'TAMBAH DATA PENGGUNA',
            'role'      => $role,
            'pegawai'   => $pegawai,
        ];
        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request, Pegawai $m_pegawai)
    {
        // Validasi
        $validated = $request->validated();

        // Upload file
        $file_name = '';
        if($request->hasFile('foto'))
        {
            $upload_file = $request->file('foto');
            $path_file = $request->file('foto')->store('assets/uploads/images/square', 'public');
            $file_name = basename($path_file);

            // Images
            $image = storage_path('app/public/assets/uploads/images/' . $file_name);
            $m_img = Image::make($upload_file->getRealPath());
            $m_img->fit(600, 800, function ($const) {
                $const->upsize();
            }, $position = 'top')->resize(600, 800);
            $m_img->save($image);

            // Square
            $square = storage_path('app/public/assets/uploads/images/square/' . $file_name);
            $m_img = Image::make($upload_file->getRealPath());
            $m_img->fit(120, 120, function ($const) {
                $const->upsize();
            }, $position = 'top')->resize(120, 120);
            $m_img->save($square);
        }

        $pegawai = $m_pegawai->where('nip', $request->nip)->first();

        if(empty($pegawai))
        {
            abort(404);
        }

        $data = [
            'nip'       => $pegawai->nip,
            'name'      => $pegawai->nama_pegawai,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => $request->role,
            'status'    => $request->status,
            'foto'      => $file_name,
        ];
        User::create($data);
        
        return redirect()->route('admin.user')->with(['success' => 'Data berhasil di tambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $m_user, $id)
    {
        $user = $m_user->detail($id);
        // dd($user);

        $data = [
            'title' => 'DETAIL PENGGUNA: ' . $user->nama,
            'user'  => $user
        ];
        return view('admin.user.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $m_user, Pegawai $m_pegawai, Role $m_role, $id)
    {
        //
        $user = $m_user->detail($id);
        $role = $m_role->simpeg();
        $pegawai = $m_pegawai->aktif();

        $data = [
            'title'     => 'EDIT PENGGUNA',
            'user'      => $user,
            'role'      => $role,
            'pegawai'   => $pegawai,
        ];
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $m_user, Pegawai $m_pegawai, $id)
    {
        // Detail User
        $user = $m_user->detail($id);

        // Validasi
        $validated = $request->validated();
        // dd($validated);

        // Upload file
        $file_name = $user->foto;
        if($request->hasFile('foto'))
        {
            $upload_file    = $request->file('foto');
            $path_file      = './storage/assets/uploads/images/' . $user->foto;
            $square         = './storage/assets/uploads/images/square/' . $user->foto;
            // dd($path_file);

            if(!empty($file_name) && file_exists($path_file))
            {
                unlink($path_file);
            }

            if(!empty($file_name) && file_exists($square))
            {
                unlink($square);
            }

            $path_file = $request->file('foto')->store('assets/uploads/images/square', 'public');
            $file_name = basename($path_file);

            // Images
            $image = storage_path('app/public/assets/uploads/images/' . $file_name);
            $m_img = Image::make($upload_file->getRealPath());
            $m_img->fit(600, 800, function ($const) {
                $const->upsize();
            }, $position = 'top')->resize(600, 800);
            $m_img->save($image);

            // Square
            $square = storage_path('app/public/assets/uploads/images/square/' . $file_name);
            $m_img = Image::make($upload_file->getRealPath());
            $m_img->fit(120, 120, function ($const) {
                $const->upsize();
            }, $position = 'top')->resize(120, 120);
            $m_img->save($square);
        }

        $pegawai = $m_pegawai->where('nip', $request->nip)->first();

        if(empty($pegawai))
        {
            abort(404);
        }

        $data = [
            'nip'       => $pegawai->nip,
            'name'      => $pegawai->nama_pegawai,
            'email'     => $request->email,
            'role'      => $request->role,
            'status'    => $request->status,
            'foto'      => $file_name,
        ];
        User::where('id', $id)->update($data);
        
        return redirect()->route('admin.user')->with(['success' => 'Data berhasil di update.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $m_user, $id)
    {
        // User
        $user = User::find($id);

        if(is_null($user))
        {
            return redirect()->route('admin.user')->with(['danger' => 'Data tidak ditemukan.']);
        }

        try {
            $file_name  = $user->foto;
            $path_file  = './storage/assets/uploads/images/' . $user->foto;
            $square     = './storage/assets/uploads/images/square/' . $user->foto;
            // dd($path_file);

            if(!empty($file_name) && file_exists($path_file))
            {
                unlink($path_file);
            }

            if(!empty($file_name) && file_exists($square))
            {
                unlink($square);
            }
            // Schema::disableForeignKeyConstraints();
            $user->delete();
            // Schema::enableForeignKeyConstraints();

        }
        catch (Exception $e) {
            return redirect()->route('admin.user')->with(['warning' => 'Oops! Data tidak dapat di hapus karena telah di gunakan pada modul lain.']);
        }

        return redirect()->route('admin.user')->with(['success' => 'Data berhasil di hapus.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePasswordRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function password(UpdatePasswordRequest $request, User $m_user, $id)
    {
        // Detail User
        $user = $m_user->detail($id);

        // Validasi
        $validated = $request->validated();
        // dd($validated);

        $data = [
            'password'  => Hash::make($request->password),
        ];
        User::where('id', $id)->update($data);
        
        return redirect()->route('admin.user')->with(['success' => 'Data berhasil di update.']);
    }
}
