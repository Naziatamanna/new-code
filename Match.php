<?php

namespace shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Match extends Model
{
    protected $table = 'matches';
    protected $fillable =['team1','team2','venue','date','time','vip_tickets','vip_ticket_price','normal_tickets','normal_ticket_price','dastatuste'];

    public static function storeMatch($data) {
        DB::table('matches')->insert($data);
    }
    public static function get_single_match($id)
    {
        return DB::table('matches')->select('*')->where('id', $id)->first();
    }
    public static function updateMatch($data, $id) {
        DB::table('matches')->where('id', $id)->update($data);
    }
    public static function get_match_list()
    {
        return DB::table('matches')->orderBy('id', 'desc')->get();
    }

    public static function get_match_list_active()
    {
        return DB::table('matches')->where('status', 1)->orderBy('id', 'desc')->get();
    }
}
