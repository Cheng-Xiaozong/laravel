<?php
/**
 * Created by PhpStorm.
 * User: cheney
 * Date: 2017/7/3
 * Time: 18:19
 */
namespace App\Http\Controllers;
use App\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //原始sql语句查询
    public function test()
    {
        //查询数据-返回数组
        //$student=DB::select('select * from student');

        //添加数据-返回布尔值
        //$bool = DB::insert('insert into student(name,age) values(?,?)',['cheney',23]);
        //$bool = DB::insert('insert into student(name,age) values(?,?)',['cheng',18]);

        //更新数据-返回影响行数
        //$num = DB::update('update student set age = ? where name = ?',[22,'cheng']);

        //删除数据-返回删除的行数
        //$num = DB::delete('delete from student where id > ?',[1001]);
        //dd($num);
    }

    //使用查询构造器进行查询
    public function test1()
    {
        //插入数据-返回布尔值
        //$data['name']='xiaoong';
        //$data['age']=18;
        //$bool=DB::table('student')->insert($data);

        //插入数据-返回自增id
        //$data['name']='chengxz';
        //$data['age']=20;
        //$id=DB::table('student')->insertGetId($data);

        //插入多条数据-返回布尔值
        //$data[0]['name']='xiaoong';
        //$data[0]['age']=18;
        //$data[1]['name']='cxz';
        //$data[1]['age']=22;
        //$bool=DB::table('student')->insert($data);

        //更新数据-返回影响的行数
        //$data['age']=10;
        //$num=DB::table('student')->where('id',1003)->update($data);

        //更新数据-自增-返回影响的行数
        //$num=DB::table('student')->where('id',1003)->increment('age');

        //更新数据-自减-返回影响的行数
        //$num=DB::table('student')->decrement('age',5);

        //自增并修改数据-返回影响的行数
        //$num=DB::table('student')->where('id',1003)->increment('age',60,['name'=>'asd']);

    }

    //使用查询构造器进行删除数据
    public function test2()
    {
        //删除数据-返回删除的行数
        //$num=DB::table('student')->where('id',1003)->delete();

        //删除数据-大于等于-返回删除的行数
        //$num=DB::table('student')->where('id','>=',1003)->delete();

        //清空整个数据表-只保留表结构-不返回任何数据
        //DB::table('student')->truncate();

    }

    //使用查询构造器进行查询
    public function test3()
    {
        //清空表
        //DB::table('student')->truncate();
        //插入多条测试数据-返回布尔值
       /* $bool=DB::table('student')->insert([
            ['id'=>1,'name'=>'name1','age'=>18],
            ['id'=>2,'name'=>'name2','age'=>16],
            ['id'=>3,'name'=>'name3','age'=>118],
            ['id'=>4,'name'=>'name4','age'=>158],
            ['id'=>5,'name'=>'name5','age'=>158],
            ['id'=>6,'name'=>'name6','age'=>218]
        ]);*/

        //获取数据-get()
        //$students = DB::table('student')->get();

        //获取结果集中的第一条数据-first()
        //$first= DB::table('student')->first();

        //获取结果集中的第一条数据-first()
        //$first= DB::table('student')->orderBy('id','desc')->first();

        //按照单个条件进行查询-where();
        //$students = DB::table('student')->where('id','>=',3)->get();

        //按照多个条件进行查询-whereRaw();
        //$students = DB::table('student')->whereRaw('id > ? and age > ?',[2,15])->get();

        //返回指定字段->pluck();
        //$names= DB::table('student')->pluck('name','age');

        //返回指定字段->lists();
        //$names= DB::table('student')->lists('name');

        //返回指定字段(并可以指定以某个键作为下标)->返回以name为键age为值的关键数组->lists();
        //$ages= DB::table('student')->lists('age','name');

        //查询指定的字段，不需要所有的字段->select();
        //$students=DB::table('student')->select('id','name','age')->get();

        //分段查询->每次查询2条（如果有10条数据，返回5个数组，每个数组两条数据）->可以加判断条件return false 会终止掉查询->chunk()
        DB::table('student')->chunk(2,function($students){
            echo '<pre>';
            var_dump($students);
            if(true){
                return false;
            }
        });

    }

    //使用查询构造器聚合函数
    public function test4()
    {
        //返回记录的条数-count();
        $num = DB::table('student')->count();

        //返回最大值->max();
        $max = DB::table('student')->max('age');

        //返回最小值->min();
        $min = DB::table('student')->min('age');

        //返回平均数->avg();
        $avg = DB::table('student')->avg('age');

        //返回总数->sum();
        $sum = DB::table('student')->sum('age');

    }

    //使用ORM操作数据库
    public function orm1()
    {
        //返回所有数据一个集合（对象）-all();
       // $students = Student::all();

        //返回一条数据的集合（对象）,以主键形式查找-没找到返回null-find();
        //$student = Student::find('1');

        //返回一条数据的集合（对象）,以主键形式查找-没查找到报错-find();
        //$student = Student::findOrFail('32');
    }

    //在ORM中使用查询构造器
    public function orm2()
    {
        //获取数据-get()
        //$students = Student::get();

        //获取结果集中的第一条数据-first()
        //$first= Student::first();

        //获取结果集中的第一条数据-first()
        //$first= Student::orderBy('id','desc')->first();

        //按照单个条件进行查询-where();
        //$students = Student::where('id','>=',3)->get();

        //按照多个条件进行查询-whereRaw();
        //$students = Student::whereRaw('id > ? and age > ?',[2,15])->get();

        //返回指定字段->pluck();
        //$names= Student::pluck('name','age');

        //返回指定字段->lists();
        //$names= Student::lists('name');

        //返回指定字段(并可以指定以某个键作为下标)->返回以name为键age为值的关键数组->lists();
        //$ages= Student::lists('age','name');

        //查询指定的字段，不需要所有的字段->select();
        //$students=Student::select('id','name','age')->get();

        //分段查询->查询的条数->chunk()
        Student::chunk(3,function($students){
            dd($students);
        });

    }

    //在ORM中使用查询构造器聚合函数
    public function orm3()
    {
        //返回记录的条数-count();
        $num = Student::count();

        //返回最大值->max();
        $max = Student::max('age');

        //返回最小值->min();
        $min =Student::min('age');

        //返回平均数->avg();
        $avg = Student::avg('age');

        //返回总数->sum();
        $sum = Student::sum('age');

        var_dump($num,$max,$min,$avg,$sum);
    }

}