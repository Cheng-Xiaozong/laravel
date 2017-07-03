<?php
/**
 * Created by PhpStorm.
 * User: cheney
 * Date: 2017/7/3
 * Time: 16:03
 */
namespace App\Http\Controllers;
use App\Member;

class MemberController extends Controller
{
    public function info($id)
    {
        //return route('memberinfo');
       return 'member-info'.$id;
    }

    public function infoview()
    {
        return view('member/info',[
            'age'=>'18',
            'name'=>'cheney'
        ]);
    }

    public function getMember()
    {
        return Member::getMember();
    }

}