<?php

namespace shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
	protected $table = 'bookings';
	public static function get_booking_list(){
		return DB::table('bookings')
			->join('customers','bookings.customer_id','=','customers.id')
			->join('booking_details', 'bookings.id', '=', 'booking_details.id')
			->select('bookings.*', 'customers.*', 'booking_details.*')
			->orderBy('bookings.id', 'desc')
			->get();
	}
}
