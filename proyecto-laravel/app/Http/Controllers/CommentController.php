<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function save(Request $request){

        //validacion
        $validate = $this->validate($request,[
            'image_id' => 'integer|required',
            'content' => 'string|required'
        ]);

        //recoger datos
        $user = \Auth::user();
        $content = $request->input('content');
        $image_id = $request->input('image_id');

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;
        
        //guardar en db
        $comment->save();

        //redicción
        return redirect()->route('image.detail',['id' => $image_id])
                         ->with(['message' => 'Comentario realizado']);
    }

    public function delete($id){
        //recoger datos del usuario logeado
        $user = \Auth::user();
        
        //sacar comentario
        $comment = Comment::find($id);

        //comprobar si es mio o mi foto
        if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)){
            $comment->delete();
            return redirect()->route('image.detail',['id' => $comment->image->id])
                             ->with(['message' => 'Comentario eliminado!']);
        }
        else{
            return redirect()->route('image.detail',['id' => $comment->image->id])
            ->with(['message' => 'Comentario no se ha podido eliminar!']);
        }
    }

}
