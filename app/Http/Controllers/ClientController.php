<?php
/**
 * Created by PhpStorm.
 * User: cheney
 * Date: 2017/7/5
 * Time: 10:15
 */
namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //顾客列表
    public function index()
    {
        $clients = Client::paginate(10);
        $data['clients']=$clients;
        return view('client.index',$data);
    }

    //新增顾客
    public function create(Request $request)
    {
        //处理添加保存数据
        if($request->isMethod('POST'))
        {
            // 1. 控制器验证
           /* $this->validate($request, [
                'Client.name' => 'required|min:2|max:20',
                'Client.age' => 'required|integer',
                'Client.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'max' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',
            ], [
                'Client.name' => '姓名',
                'Client.age' => '年龄',
                'Client.sex' => '性别',
            ]);*/

           //2.Validator类验证
            $validator = \Validator::make($request->input(), [
                'Client.name' => 'required|min:2|max:20',
                'Client.age' => 'required|integer',
                'Client.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',
            ], [
                'Client.name' => '姓名',
                'Client.age' => '年龄',
                'Client.sex' => '性别',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data=$request->input('Client');
            if(Client::create($data))
            {
                return redirect('client/index')->with('success','添加成功');
            }else{
                return redirect()->back();
            }
        }
        $client=new Client();
        $data['client']=$client;

        return view('client.create',$data);
    }

    //保存数据
    public function save(Request $request)
    {
        $data=$request->input('Client');
        $client = new Client();
        $client->name=$data['name'];
        $client->age=$data['age'];
        $client->sex=$data['sex'];
        if($client->save())
        {
            return redirect('client/index');
        }else{
            return redirect()->back();
        }
    }

    //编辑数据
    public function edit(Request $request,$id)
    {
        $client=Client::find($id);
        //保存编辑的数据
        if ($request->isMethod('POST'))
        {

            $this->validate($request, [
                'Client.name' => 'required|min:2|max:20',
                'Client.age' => 'required|integer',
                'Client.sex' => 'required|integer',
            ], [
                'required' => ':attribute 为必填项',
                'min' => ':attribute 长度不符合要求',
                'integer' => ':attribute 必须为整数',
            ], [
                'Client.name' => '姓名',
                'Client.age' => '年龄',
                'Client.sex' => '性别',
            ]);

            $data = $request->input('Client');
            $client->name = $data['name'];
            $client->age = $data['age'];
            $client->sex = $data['sex'];

            if ($client->save()) {
                return redirect('client/index')->with('success', '修改成功-' . $id);
            }else{
                return redirect()->back()->with('error', '修改失败');
            }
        }
        $data['client']=$client;
        return view('client.edit',$data);
    }

    //顾客详情
    public function detail($id)
    {
        $client = Client::find($id);
        $data['client']=$client;
        if($client){
            return view('client.detail',$data);
        }else{
            return redirect('client/index')->with('error', '没有这条数据');
        }

    }

    //删除顾客
    public function delete($id)
    {
        $client=Client::find($id);
        if($client && $client->delete()){
            return redirect('client/index')->with('success', '删除成功！');
        }else{
            return redirect('client/index')->with('error', '删除失败！');
        }
    }


}
