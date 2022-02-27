<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Add;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function detail(Request $request)  {
        $detailed_values = Add::where('id', $request->id)->get();
        $comments_values = Add::find($request->id);
        $pref_zip = config('prefdata.pref_zip');
        $parking_zip = config('parkingdata.parking_zip');
        return view('detail', ['detailed_values' => $detailed_values ])
            ->with('comments_values', $comments_values)
            ->with('pref_zip', $pref_zip)
            ->with('parking_zip', $parking_zip);
    }

    public function comment(Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $comment = new Comment();
        $comment->add_id = $request->id;
        $comment->user_id = Auth::user()->id;
        $comment->body = $request->body;
        $comment->save();

        return redirect(route('details.index', $comment->add_id));
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();
        return redirect(route('details.index', $comment->add_id));
    }
}