<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Students extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['id', 'ten_sinh_vien', 'dia_chi'];
    public function loadListWithPager($params = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
        $lists = $query->paginate(10);
        return $lists;
    }
    public function saveNew($params)
    {
        $data = array_merge(
            $params['cols'],
            [
                'password' => Hash::make($params['cols']['password']),
                // 'leve' = 1
            ]
        );
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
}