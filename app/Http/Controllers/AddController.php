<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Add;
use DateTime;

class AddController extends Controller
{
    public function index()  {
        return view('add');
    }

    public function store(Request $request)
    {

        $fileName = $request->file("img_url")->getClientOriginalName();
        Storage::putFileAs("public/images", $request->file("img_url"), $fileName);
        $fullFilePath = "/storage/images/". $fileName;

        $startdate = DateTime::createFromFormat('H:i', $request->input('start-time'));
        $enddate = DateTime::createFromFormat('H:i', $request->input('end-time'));

        Add::create([

            "place_name" => $request->input("place_name"),
            "img_url" => $fullFilePath,
            "pref" => $request->input("pref"),
            'start_time' => $startdate,
            'end_time' => $enddate,
            "parking" => $request->input("parking"),
            "lat" => $request->input("lat"),
            "lng" => $request->input("lng"),
        ]);

        return redirect(route('home'));
    }
}