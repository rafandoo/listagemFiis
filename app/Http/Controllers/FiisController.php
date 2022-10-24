<?php

namespace App\Http\Controllers;

use App\Models\Fiis;
use Illuminate\Http\Request;

class FiisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filtro = request('filtro');
        if ($filtro) {
            $fiis = Fiis::where('nome', 'like', "%{$filtro}%")
            ->orwhere('codigo', 'like', "%{$filtro}%")
            ->get();
        } else {
            $fiis = Fiis::all();
        }
        return view('fiis.index', ['fiis' => $fiis]);
    }
}
