<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\ImageService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Get list of users
     */
    public function index()
    {
        $users = User::get();
        return view('user.index',compact('users'));
    }

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
            'sex'=>'required',
            'show_phone'=>'required',
            'avatar'=>'nullable|mimes:jpeg,jpg,bmp,png',
        ]);
        $data=[
            'name'=>$request->name,
            'surname'=>$request->surname,
            'nickname'=>$request->nickname,
            'sex'=>($request->sex =="true")? true : false,
            'phone'=>$request->phone,
            'show_phone'=>($request->show_phone =="on")? true : false,
        ];
        if ($request->avatar){
            $content = ImageService::uploadWithCrop($request->file('avatar'), 'users');
            $avatar = ['avatar' => $content];
            array_push($data,$avatar);
        }
        $user = User::create($data);
        return redirect()->route('user.profile', $user->id )->with('success','Пользователь успешно cоздан!');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setExperience(Request $request)
    {
        if ($this->userService->setExperienceUser($request)) {
            return response()->json([
                'success'=>__('site.set_experience')
            ]);
        }

        return response()->json([
            'status' => __('site.warning')
        ]);
    }

    /**
     * @return mixed
     */
    public function getExperience(Request $request){
        $getExprnc = $this->userService->getExperienceUser($request);

        if ($getExprnc) {
            return response()->json([
                'success'=>__('site.get_experience'),
                'user_experience' => $getExprnc
            ]);
        }

        return response()->json([
            'status' => __('site.warning')
        ]);
    }

}
