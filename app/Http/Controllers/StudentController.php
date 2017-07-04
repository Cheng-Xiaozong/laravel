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

    //在ORM中新增数据->save();
    public function orm4()
    {
        //新增数据-返回布尔值->save();
        //$student = new Student();
        //$student->name = 'books';
        //$student->age = '118';
        //$bool=$student->save();

        //数据表中时间会自动更新
        //如果不再模型中设定当前的时间格式-默认将时间保存成年份-2017
        //created_at ->2017
        //updated_at ->2017

        //如果不想维护表中的时间字段,在模型中将时间戳设置为false即可
        //public $timestamps = false;
        //created_at ->null
        //updated_at ->null

        //如果需要设置时间的格式为时间戳-在模型中添加方法getDateFormat();
        //created_at ->1499133120
        //updated_at ->1499133120

        //输出时自动格式化时间
        //$student = Student::find(1);
        //$time = $student->created_at;
        // 2017-07-04 01:52:00

        //如果想直接输出时间戳-在模型中添加一个方法asDateTime();
        //$student = Student::find(9);
        //$time = $student->created_at;  //1499133120
        //echo date('Y-m-d H:i:s',$time); //2017-07-04 01:52:00

    }

    //在ORM中新增数据->create();
    public function orm5()
    {
        //使用create新增数据必须在模型中设置批量赋值
        //指定允许批量赋值的字段
        //protected $fillable = ['name','age'];
        //指定不允许批量赋值的字段
        //protected $guarded = [];

        //使用create()方法创建数据，返回值是student对象
        //$data['name']='xiaomi';
        //$data['age']=18;
        //$sudent = Student::create($data);
    }

    //在ORM中以属性查找，没有则新增数据-返回实例
    public function orm6()
    {
        //以下会查找一个数据，因为数据库中有这条记录,返回复合条件的第一条数据的实例
        //$data['name']='xiaomi';
        //$data['age']=18;
        //$student = Student::firstOrCreate($data);

        //以下会创建一个数据，因为数据库中没有有这条记录，返回创建数据的实列
        //$data['name']='xiaomia';
        //$data['age']=188;
        //$student = Student::firstOrCreate($data);
    }

    //在ORM中以属性查找，没有则返回实例-返回实例（不保存数据，需要手动保存）
    public function orm7()
    {
        //以下会查找一个数据，因为数据库中有这条记录,返回复合条件的第一条数据的实例
        //$data['name']='xiaomi';
        //$data['age']=18;
        //$student = Student::firstOrNew($data);


        //以下会返回一个以参数为属性的实例对象，不会保存到数据库
        //$data['name']='dd';
        //$data['age']=2838;
        //$student = Student::firstOrNew($data);

        //如果需要保存到数据库，调用save()方法，返回bool值
        //$bool = $student->save();
        //dd($bool);
    }

    //在ORM中更新数据
    public function orm8()
    {
        //通过模型更新数据-返回布尔值
        //$student = Student::find(2);
        //$student->name = 'xingming2';
        //$bool = $student->save();
        //dd($bool);

        //结合查询构造器批量更新-返回影响的行数
        //$data['name']='kitty';
        //$data['age']=18;
        //$num = Student::where('id','>=',10)->update($data);
    }

    //在ORM中删除数据
    public function orm9()
    {
        //通过模型删除数据-返回布尔值
        //$student = Student::find(16);
        //$bool = $student->delete();

        //通过主键删除，返回影响行数
        //$num = Student::destroy(15);
        //$num = Student::destroy(14,13);
        //$num = Student::destroy([10,11,12]);

        //通过查询构造器删除，返回影响行数
        //$num = Student::where('id','>=',9)->delete();
    }

    //lavavel中使用blade视图模板
    public function blade()
    {
        $name = '王小二';
        $arr = ['王小二','王二小'];
        return view('student/blade',['name'=>$name,'arr'=>$arr]);
    }

    //lavavel中使用blade视图模板-流程控制
    public function ifelse()
    {

        $name = '王小二';
        $arr = ['王小二','王二小'];
        $students=Student::get();
        $nullarr=[];
        return view('student/ifelse',[
            'name'=>$name,
            'arr'=>$arr,
            'students'=>$students,
            'nullarr'=>$nullarr
        ]);
    }

    //URL中路由的使用
    public function UrlTest()
    {
        return view('student/urltest');

    }



}