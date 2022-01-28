<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HomeFormRequest;
use App\Models\Home;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $host = Home::get();

        return view('home', compact('host'));
    }

    public function create()
    {

        return view('create');
    }

    public function store(HomeFormRequest $request)
    {
        $validated = $request->validated();

        $create = Home::insert([
            'name' => $request->input('name'),
            'ip' => '192.168.178.'.$request->input('ip-address'),
            'port' => $request->input('port'),
        ]);
        return redirect()->route('home.index');
    }
    public function delete()
    {

        return view('create');
    }
}
