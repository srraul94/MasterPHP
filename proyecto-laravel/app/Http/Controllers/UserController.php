<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\User;

class UserController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function config(){
        return view ('user.config');
    }

    public function index($search = null){
        if(!empty($search)){
            $users = User::where('nick','LIKE','%'.$search.'%')
                          ->orWhere('name','LIKE','%'.$search.'%')
                          ->orWhere('surname','LIKE','%'.$search.'%')
                          ->orderBy('id','desc')
                          ->paginate(5);
        }
        else{
            $users = User::orderBy('id','desc')->paginate(5);
        }
        return view('user.index',[
            'users' => $users
        ]);
    }

    public function update(Request $request){

        //Conseguir el usuario identificado
        $user = \Auth::user();    
        $id = $user->id;

        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id
        ]);
        
        //reocoger los datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        //asignar nuevos valores.

        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        //subir la imagen
        $image_path = $request->file(('image'));
        if($image_path){
            //nombre unico
            $image_path_full = time().$image_path->getClientOriginalName();
            
            //guardar en el disco users
            Storage::disk('users')->put($image_path_full,File::get($image_path));
            
            //seteo el nombre de la imagene en el objeto
            $user->image = $image_path_full;
        }
        $user->update();

        return redirect()->route('config')
                         ->with(['message'=>'Usuario actualizado!']);        
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);
    }

    public function profile($id){
        $user = User::find($id);

        return view('user.profile',[
            'user'=> $user
        ]);
    }

    
}
