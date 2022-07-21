<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\SinhVien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $v;
    public function __construct()
    {
        $this->v = [];
    }
    public function formRegister()
    {
        return view('register');
    }
    public function index()
    {
        $test = new Students();
        $this->v['lists'] = $test->loadListWithPager();
        $this->v['tieude'] = 'người dùng';

        return view('user.index', $this->v);
    }

    public function getList()
    {
        $sv = new SinhVien();
        $this->v['lists'] = $sv->loadList();
        $this->v['tieude'] = 'Sinh vien';
        return view('user.student', $this->v);
    }
    public function add(Request $request)
    {
        $this->v['_title'] = 'thêm';
        $method_route = 'Route_BackEnd_User_Add';
        if ($request->isMethod('post')) {
            $param = [];
            $param['cols'] = $request->post();
            unset($param['cols']['_token']);
            $modelUser = new User();
            $res = $modelUser->saveNew($param['cols']);
            if ($res == null) {
                return  redirect()->route($method_route);
            } elseif ($res > 1) {
                Session::flash('success', 'Thêm mới thành công');
            } else {
                Session::flash('error', 'Thêm mới thất bại');
                return redirect()->route($method_route);
            }
        }
        return view('user.add', $this->v);
    }
}