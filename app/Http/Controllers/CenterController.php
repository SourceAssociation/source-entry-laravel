<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EntryUser;
use App\Http\Middleware\CropAvatar;

class CenterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('center.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postAvatar(Request $request)
    {
        //上传头像
        $results['msg'] = $request->input('avatar_data');

        $crop = new CropAvatar(
            isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null,
            isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null,
            isset($_FILES['avatar_file']) ? $_FILES['avatar_file'] : null
        );

        $res = $this->updateData('profile_img', $crop->getResult());
        if ($res) {
            $state = 200;
            $message = $crop->getMsg();
            $url = $crop->getResult();
        }else{
            $state = 1005;
            $message = "上传头像失败！";
            $url = '';
        }
        $results = array(
            'state'  => $state,
            'message' => $message,
            'result' => $url
        );
        return response()->json($results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //更新用户信息
        $key = $request->input('key');
        $value = $request->input('value');

        $res = $this->updateData($key, $value);
        $results['error'] = $res;
        if ($res) {
            $results['msg'] = "更新成功！";
        }else{
            $results['msg'] = "更新失败！请刷新页面重试！";
        }
        return response()->json($results);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function avatar()
    {
        // 更改头像
        $user = Auth::user();
        return view('center.avatar', compact('user'));
    }

    protected function updateData($key='id', $value="0")
    {
        $res = EntryUser::where('id', Auth::user()->id)->update([$key => $value]);
        return $res;
    }
}
