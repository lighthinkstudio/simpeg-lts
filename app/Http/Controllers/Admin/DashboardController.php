<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Lighthinkstudio\Siasync\Siasync;

class DashboardController extends Controller
{
    public function index(Client $http, Siasync $siasync)
    {
        // $role = Auth::user()->role;
        // if($role != 'admin')
        // {
        //     abort(404);
        // }
        // dd($siasync->connect());

        // $get_data = $http->get('https://training-apimws.bkn.go.id:8243/api/1.0/pns/rw-jabatan/197502282009121001', $siasync->connect());

        // $data_utama =  json_decode((string) $get_data->getBody($siasync->auth())->getContents(), true);
        // dd($data_utama);
        
        $data = [
            'title'     => 'Halaman Dashboard'
        ];
        return view('admin.dashboard.index', $data);
    }
}
