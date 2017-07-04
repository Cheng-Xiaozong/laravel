<?php
/**
 * Created by PhpStorm.
 * User: cheney
 * Date: 2017/7/3
 * Time: 18:19
 */
namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    //laravle 中的请求-取值
    public function resquest(Request $request)
    {
        //取get参数值
        $name=$request->input('name');

        //默认值-没有参数值，就使用默认值
        $sex=$request->input('sex','默认值');

        //判断是否有某个参数
        if($request->has('name'))
        {
            echo $request->input('name');
        }else{
            echo '没有name这个参数';
        }

        //取出所有参数
        $params = $request->all();

        //请求方法
       $method=$request->method(); //GET

        //判断请求类型
        if($request->isMethod('GET')){
            echo '我是GET方法';
        }else{
            echo '我不是GET方法';
        }

        //判断是否为ajax请求
        $bool = $request->ajax();

        //判断请求路由的格式
        $bool = $request->is('student/*');

        //获取当前的URL
        $url = $request->url();  //http://192.168.1.156:81/student/resquest
    }

    //laravel 中的session
    public function session1(Request $request)
    {
        //1. HTTP request类的session()方法
        $request->session()->put('key1','value1');
        $request->session()->get('key1');

        //2. session()辅助函数
        session()->put('key2','value2');
        session()->get('key2');

        //3. Session facade laravel中的类
        Session::put('key3','value3');
        Session::get('key3');

        //不存在取默认值-但是并没有将默认值写入到session,再次获取依旧为空
        Session::get('key4','默认值');

        //以数组的形式写入session
        Session::put(['key5'=>'value5']);
        Session::get('key5');

        //把数据存储到session的数组中
        Session::push('key6','value6');
        Session::push('key6','value66');
        $arr = Session::get('key6');

        //第一次取出数据，第二次就删除数据
        $session = Session::pull('wocao');
        //var_dump($session); //第一次是one 第二次被删除，取出的是默认值

        //取出session中所有的值
        $arr = Session::all();

        //判断session是否存在
        $bool=Session::has('key2');

        //删除指定的Session
        Session::forget('key6');

        //删除所有session
        Session::flush();

        //暂存数据-第一次访问存在,第二次访问就不存在
        Session::flush('key-flush','val-flush');

    }

    //laravel中的响应 response
    public function response()
    {
        $data=[
            'errCode'=>0,
            'errMsg'=>'错误的参数Name',
            'data'=>'你是傻逼吗？'
        ];

        //输出json
        //return response()->json($data);

        //重定向
        //return redirect('student/blade');
        //携带参数的快闪数据重定向
        //return redirect('student/response1')->with('msg','快闪数据-第一次有效，第二次无效');
        //return redirect()->action('StudentController@response1')->with('msg','快闪数据-第一次有效，第二次无效');
        //return redirect()->route('response1')->with('msg','快闪数据-第一次有效，第二次无效');

        //重定向到上一个页面
        //return redirect()->back();

    }

    //重定向，接收快闪数据
    public function response1()
    {
        return Session::get('msg','暂无数据');
    }

    //活动宣传页面
    public function activity0()
    {
        return '活动快要开始了，敬请期待';
    }

    //活动进行中页面1
    public function activity1()
    {
        return '活动进行中，欢迎参与！';
    }

    //活动进行中页面2
    public function activity2()
    {
        return '活动进行中，欢迎参与！';
    }

}