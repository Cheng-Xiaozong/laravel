<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    const SEX_UN = 1;  //未知
    const SEX_BOY = 2; // 男
    const SEX_GRIL = 3;    //女

    //指定表名
    protected $table = 'client';

    //指定主键
    protected $primaryKey = 'id';

    //指定允许批量赋值的字段
    protected $fillable = ['name','age','sex'];

    //指定不允许批量赋值的字段
    protected $guarded = [];

    //是否自动更新时间
    public $timestamps  = true;

    //设置存储的时间格式-为时间戳
    protected function getDateFormat()
    {
        return time();
    }

    //设置输出的时间格式-为原始时间戳
    protected function asDateTime($value)
    {
        return $value;
    }

    //处理性别的函数
    public function sex($ind = null)
    {
        $arr = [
            self::SEX_UN => '未知',
            self::SEX_BOY => '男',
            self::SEX_GRIL => '女',
        ];

        if ($ind !== null) {
            return array_key_exists($ind, $arr) ? $arr[$ind] : $arr[self::SEX_UN];
        }

        return $arr;
    }

    //处理姓名的函数-如果未填写，输出匿名
    public function name($name = null)
    {
       return empty($name) ? '匿名' : $name;
    }

}
