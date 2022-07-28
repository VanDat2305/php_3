<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\SinhVien;
use App\Models\Students;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
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
        $sv = new User();
        $this->v['lists'] = $sv->loadListWithPager();
        $this->v['tieude'] = 'Sinh vien';
        return view('user.index', $this->v);
    }
    public function add(UserRequest $request)
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
                return  redirect()->route($method_route)->withInput();
            } elseif ($res > 1) {
                Session::flash('success', 'Thêm mới thành công');
            } else {
                Session::flash('error', 'Thêm mới thất bại');
                return redirect()->route($method_route)->withInput();
            }
        }
        return view('user.add', $this->v);
    }
    public function detail($id)
    {
        $this->v['_title'] = "chi tiết người dung";
        $user = new User();
        $obj = $user->loadOne($id);
        $this->v['objItem'] = $obj;
        return view('user.detail', $this->v);
    }
    public function update($id, Request $request)
    {
        $method_route = "route_BackEnd_User_Detail";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $test2 = new User();
        $objItem = $test2->loadOne($id);
        $params['cols']['id'] = $id;
        if (!is_null($params['cols']['password'])) {
            $params['cols']['password'] = Hash::make($params['cols']['password']);
        }
        $res = $test2->saveUpdate($params);
        if ($res == null) {
            return  redirect()->route($method_route, ['id' => $id]);
        } elseif ($res > 1) {
            Session::flash('success', 'Thêm mới thành công');
            return redirect()->route($method_route, ['id' => $id]);
        } else {
            Session::flash('error', 'Thêm mới thất bại');
            return redirect()->route($method_route, ['id' => $id]);
        }
    }
}