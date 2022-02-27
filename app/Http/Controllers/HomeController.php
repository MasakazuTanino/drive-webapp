<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Add;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // 登録情報表示
    public function index()
    {
        // DBからランダムに取り出す
        $list_values = Add::inRandomOrder()->take(5)->get();
        $pref_zip = config('prefdata.pref_zip');
        return view('home', ['list_values' => $list_values])
            ->with('pref_zip', $pref_zip);
    }

    // 検索機能ロジック
    public function search(Request $request)
    {
        $list_values = Add::where('place_name', $request->search_place_name)
            ->orwhere('pref', $request->search_pref)->get();
        $pref_zip = config('prefdata.pref_zip');
        return view('home', ['list_values' => $list_values])
            ->with('pref_zip', $pref_zip);
    }
}