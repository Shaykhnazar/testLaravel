<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Get user profile
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function profile($id){
        $user=User::findOrFail($id);

        return view('user.profile',compact('user'));
    }

    /**
     * Show the form to create a new user
     */
    public function create()
    {
       return view('user.create');
    }

    /**
     * Store a new article
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'nickname'=>'required|unique:users',
            'phone'=>'required|unique:users',
            'sex'=>'required|boolean',
            'show_phone'=>'required',
            'avatar'=>'nullable|mimes:jpeg,jpg,bmp,png',
        ]);
        $data=[
            'name'=>$request->name,
            'surname'=>$request->surname,
            'nickname'=>$request->nickname,
            'sex'=>$request->sex,
            'phone'=>$request->phone,
            'show_phone'=>$request->show_phone,
        ];
        if ($avatar = $request->avatar){
            $content = ImageService::uploadWithCrop($avatar, 'users');
            $avatar = ['avatar' => $content];
            array_push($data,$avatar);
        }
        $user = User::create($data);
        return redirect()->route('user.profile', $user->id )->with('success','Пользователь успешно cоздан!');
    }

}
