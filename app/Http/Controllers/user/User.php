<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Common;
// use Illuminate\Support\Facades\DB;
use DB;

class User extends Controller
{
    
    public function index()
    {
        echo "user index";
        return view('welcome');
    }

    public function userList()
    {
        $users = DB::table('users')->get();
        echo $users[0]->fname;
        $users = json_encode($users);
        
        echo '<pre>'; print_r($users); 
    }

    public function insert()
    {        
        $post = Common::getField('users',$request->input());
        print_r($post); die;
        $result = Common::insertData('users',['fname'=>'laravel','lname'=>'tutorial','email'=>'devendra@mailinator.com','password'=>'123456']);
        print_r($result); echo '1';
    }
}
