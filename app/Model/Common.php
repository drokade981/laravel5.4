<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Common extends Model
{
    protected $fillable = ['fname','lname'];

    public function getData($table,$where="",$options=array())
	{
		if(isset($options['field'])){
			DB::select($options['field']);
		}
				
		if($where != ""){
			DB::where($where);
		}
		if(isset($options['where_in']) && isset($options['where_in'])){
			 DB::where_in($options['colname'] ,$options['where_in']);
		}

		if (isset($options['orderBy']) && isset($options['direction'])) {
			DB::order_by($options['orderBy'], $options['direction']);
		}
		
		if (isset($options['group_by']) ) {
			DB::group_by($options['group_by']);
		}
		if (isset($options['limit']) && isset($options['offset']))	{
			DB::limit($options['limit'], $options['offset']);
		}
		else {
			if (isset($options['limit'])) {
			    DB::limit($options['limit']);
			}
		}

		$query = DB::get($table);
		$result = $query->result_array();
		if (!empty($options) && in_array('count', $options)) {
			return count($result);
		}
		if($result){
			if(isset($options) && in_array('single',$options)){ 
				return $result[0];
			}else{
				return $result;
			}
		}else{
			if(isset($options) && in_array('api',$options)){ 
				return array();
			}
			return false;
		}
	}

    public static function getField($table,$data)
    {   
        $post = array();
        
        $fields = DB::getSchemaBuilder()->getColumnListing($table);
        
        foreach ($data as $key => $value) {
			if(in_array($key, $fields)){
				$post[$key] = $value;
			}
		}
		return $post;
    }

    public static function insertData($table,$data)
    {
        return DB::table($table)->insert($data);
    }

    public static function updateData($table,$data,$where = "")
    {
        return DB::table($table)->where($where)->update($data);
    }

    public static function deleteData($table,$data,$where = "")
    {
        return DB::table($table)->delete($data)->where($where);
    }
}
