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
        $host = Home::orderByRaw("INET_ATON(ip)")->get();

        return view('home', compact('host'));
    }

    public function create()
    {

        return view('create');
    }


    public function show($id)
    {
        $item = Home::find($id);

        return view('show', compact('id', 'item'));
    }


    public function edit($id)
    {
        $item = Home::find($id);

        return view('edit', compact('id', 'item'));
    }

    public function store(HomeFormRequest $request)
    {
        $validated = $request->validated();

        if (!Home::where('ip', '192.168.178.' . $request->input('ip-address'))) {
            return redirect()->route('create')
                ->with('error', 'Die IP-Adresse existiert bereits!');
        }

        if ($request->has('web_based')) {
            $web_based = 1;
        } else {
            $web_based = 0;
        }
        Home::insert([
            'name' => $request->input('name'),
            'web_based' => $web_based,
            'usage' => $request->input('usage'),
            'ip' => '192.168.178.' . $request->input('ip-address'),
            'port' => $request->input('port'),
        ]);
        return redirect()->route('home.index');
    }

    public function update(HomeFormRequest $request, $id)
    {
        $validated = $request->validated();
        if (Home::where('ip', '192.168.178.' . $request->input('ip-address')) != Home::find($id)->ip) {
            if (!Home::where('ip', '192.168.178.' . $request->input('ip-address'))) {
                return redirect()->route('create')
                    ->with('error', 'Die IP-Adresse existiert bereits!');
            }
        }

        if ($request->has('web_based')) {
            $web_based = 1;
        } else {
            $web_based = 0;
        }
        Home::find($id)->update([
            'name' => $request->input('name'),
            'web_based' => $web_based,
            'usage' => $request->input('usage'),
            'ip' => '192.168.178.' . $request->input('ip-address'),
            'port' => $request->input('port'),
        ]);
        return redirect()->route('home.index');
    }

    public function destroy($id)
    {
        Home::destroy($id);
        return redirect()->route('home.index');
    }
}
