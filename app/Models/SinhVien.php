<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SinhVien extends Model
{
    use HasFactory;
    protected $table = 'sinhvien';
    protected $fillable = ['id', 'tensv', 'khoa', 'tuoi'];
    public function loadList($params = [])
    {
        $query = DB::table($this->table)
            ->select($this->fillable);
        $lists = $query->paginate(10);
        return $lists;
    }
    public function saveNew($params)
    {
        $data = array_merge(
            $params,
            [
                'password' => Hash::make($params['password']),
                // 'leve' = 1
            ]
        );
        $res = DB::table('user')->insertGetId($data);
        return $res;
    }
}