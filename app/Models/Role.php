<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['kode', 'nama', 'group'];

    public function simpeg()
    {
        $query = DB::table('roles')
                    ->where('group','simpeg')
                    ->orderBy('roles.kode', 'ASC')
                    ->get();
        return $query;
    }
}
