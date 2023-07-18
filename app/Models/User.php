<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nip', 'name', 'email', 'password', 'role', 'status', 'foto'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the role associated with the user.
     */
    public function roles()
    {
        return $this->hasOne(Role::class, 'kode', 'role');
    }

    public function listing()
    {
        $query = DB::table('users')
                    ->select('users.*', 'roles.nama as nama_role')
                    ->leftJoin('roles', 'roles.kode', '=', 'users.role')
                    ->orderBy('users.nip', 'ASC')
                    ->get();
        return $query;
    }

    public function detail($id)
    {
        $query = DB::table('users')
                    ->select('users.*', 'master_pegawai.instansiKerjaNama')
                    ->leftJoin('master_pegawai', 'master_pegawai.nipBaru', '=', 'users.nip')
                    ->where('users.id', $id)
                    ->first();
        return $query;
    }
}
