<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\OpenWeatherMapService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use View;

class OpenWeatherMapController extends Controller
{
    public function search(Request $request)
    {
       $search = $request->search ?? '';
       $items = $request->items ?? 10;

       $usuarios = DB::table('users')
        ->limit($items)
        ->paginate($items);    

        $clima = json_decode(OpenWeatherMapService::consultaApi($search));

		return View::make('admin.usuarios.index')
        ->with(compact('usuarios'))
        ->with(compact('clima'));

    }

}
