<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Common;
use DB;

class APIController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = User::all();

        if($result){           
            $this->response(true,'Post added successfully',array('data'=>$result));
        }else{
            $this->response(false,'Some error occured');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Common::getField('users',$request->input());   
        $result = Common::insertData('users',$post);
        print_r($result); echo '1';
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Common::getField('users',$request->input());
        $post['updated_at'] = date('Y-m-d H:i:s');        
        $result = Common::insertData('users',$post);  
        if($result){
            unset($post['password']);
            $this->response(true,'Post added successfully',array('data'=>$post));
        }else{
            $this->response(false,'Some error occured');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = User::find(1);
        if($result){
            unset($result['password']);
            $this->response(true,'Data fetched successfully',array('data'=>$result));
        }else{
            $this->response(false,'Some error occured');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo $id;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Common::getField('users',$request->input());
        $post['updated_at'] = date('Y-m-d H:i:s');   
        $where['id'] = [$id];
        $result = Common::updateData('users',$post,$where);        

        if($result){            
            $this->response(true,'Data updated successfully');
        }else{
            $this->response(false,'Some error occured');
        } 
        
        // $user = User::find(1);
        // $user->name = $request->input('name');
        // $result = $user->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //orm method
        // $user = User::find($id);
        // $result = $user->delete();
        // orm end
        $result = User::destroy($id);
        if($result){            
            $this->response(true,'Data deleted successfully');
        }else{
            $this->response(false,'Some error occured');
        } 
    }
}
