<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($image_id)
    {
        //Recoger datos del usuario y la imagen
        $user = \Auth::user();

        //condicion para ver si existe
        $isset_like = Like::where('user_id', $user->id)
        ->where('image_id', $image_id)
        ->count();
      

        if ($isset_like == 0) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int) $image_id;

            //guardar el like
            $like->save();
            return response()->json([
                'like' => $like
            ]);
        } else {
            return response()->json([
                'message' => 'Ya diste like a la publicación'
            ]);
        }
    }

    public function dislike($image_id)
    {
        //Recoger datos del usuario y la imagen
        $user = \Auth::user();

        //condicion para ver si existe
        $like = Like::where('user_id', $user->id)
            ->where('image_id', $image_id)
            ->first();

        if ($like) {           
            $like->delete();

            return response()->json([
                'like' => $like,
                'message' => 'Like eliminado!'
            ]);
        } else {
            return response()->json([
                'message' => 'No existe like en la publicación'
            ]);
        }
    }

    public function index(){
        $user = \Auth::user();
        $likes = Like::where('user_id',$user->id)
                      ->orderBy('id','desc')->paginate(5);

        return view('like.index',[
            'likes'=> $likes
        ]);
    }
}
