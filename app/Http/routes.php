<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//get请求
Route::get('test1', function () {
    return 'test1';
});
//post 请求
Route::post('test2', function () {
    return "test2";
});

//多请求(指定路由)
Route::match(['get','post'],'test3', function () {
    return "test3";
});

//响应所有请求
Route::any('test4', function () {
    return "test4";
});

//路由参数(必选参数)
Route::get('userid/{id}', function ($id) {
    return 'user-id：'.$id;
});

//路由参数（可填写可不填写）
Route::get('username/{name?}', function ($name=null) {
    return 'user-name：'.$name;
});

//路由参数（默认参数）
Route::get('userage/{name?}', function ($name=100) {
    return 'user-age：'.$name;
});

//路由参数（正则表达式限制参数，只能输入字母）
Route::get('user-name/{name?}', function ($name) {
    return 'user-name：'.$name;
})->where('name','[a-zA-Z]+');

//路由参数（正则表达式限制多个参数，第一个参数只能输入数字，第二个参数只能输入字母）
Route::get('user-id-name/{id}/{name?}', function ($id,$name) {
    return 'user-id：'.$id.'user-name：'.$name;
})->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);

//路由别名(取别名可以用route函数读取到当前路由的名称)
Route::get('user/member-center', ['as'=>'center',function(){
    return route('center');
}]);

//路由群组(可以对群组中所有路由进行操作)
Route::group(['prefix'=>'member'], function () {
    //自动生成路由/member/test4
    Route::any('test4', function () {
        return "member-test4";
    });
    //自动生成路由/member/test1
    Route::get('test1', function () {
        return 'member-test1';
    });
});

//----------路由绑定控制器-----
//绑定控制器
Route::get('member/info','MemberController@info');

//绑定控制器（使用数组绑定）
Route::get('member/info1',['uses'=>'MemberController@info']);

//路由区别名
Route::get('member/info2',
    [
        'uses'=>'MemberController@info',
        'as'=>'memberinfo'
    ]
);
//路由参数限制
Route::get('member/info/{id}','MemberController@info')->where('id','[0-9]+');

//输出视图
Route::get('member/infoview','MemberController@infoview');

//使用模型
Route::get('member/model','MemberController@getMember');

//使用原始sql语句操作数据库
Route::get('student/test','StudentController@test');

//使用构造器操作数据库
Route::get('student/test1','StudentController@test1');
Route::get('student/test2','StudentController@test2');
Route::get('student/test3','StudentController@test3');
Route::get('student/test4','StudentController@test4');

//使用orm操作数据库
Route::get('student/orm1','StudentController@orm1');
Route::get('student/orm2','StudentController@orm2');
Route::get('student/orm3','StudentController@orm3');
Route::get('student/orm4','StudentController@orm4');
Route::get('student/orm5','StudentController@orm5');
Route::get('student/orm6','StudentController@orm6');
Route::get('student/orm7','StudentController@orm7');
Route::get('student/orm8','StudentController@orm8');
Route::get('student/orm9','StudentController@orm9');

//lavavel中使用blade视图模板
Route::get('student/blade','StudentController@blade');
Route::get('student/ifelse','StudentController@ifelse');
Route::get('student/urltest',['as'=>'urltest','uses'=>'StudentController@UrlTest']);







