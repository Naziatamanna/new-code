<?php

namespace shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable =['image','title','status'];

    public static function get_slider_list()
    {
        return DB::table('sliders')->orderBy('id', 'desc')->get();
    }
    public static function get_slider_list_active()
    {
        return DB::table('sliders')->where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
    }

    public static function storeSlider($data) {
        DB::table('sliders')->insert($data);
    }

    public static function get_single_slider($id)
    {
        return DB::table('sliders')->select('*')->where('id', $id)->first();
    }

    public static function updateSlider($data, $id)
    {
        DB::table('sliders')->where('id', $id)->update($data);
    }
}
