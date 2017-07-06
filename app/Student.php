<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //指定表名
    protected $table = 'student';

    //指定主键
    protected $primaryKey = 'id';

    //指定允许批量赋值的字段
    protected $fillable = ['name', 'age', 'sex'];

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
   /* protected function asDateTime($value)
    {
        return $value;
    }*/
}
