<?php

namespace shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Customer extends Model
{
	protected $table = 'customers';
	protected $fillable =['name','email','password','mobile'];
	public static function storeCustomer($data){
		return Customer::insertGetId($data);
	}
	public static function checkLogin($email,$password){
		$data = DB::table('customers')->select('*')
			->where('email', $email)
			//->where('password', $password)
			->first();
		if (count($data)>0)
			if (Hash::check($password, $data->password))
			{
				return $data->id;
			}else{
				return false;
			}


		else {
			return false;
		}
	}
}
