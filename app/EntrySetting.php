<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntrySetting extends Model
{
    // 设置数据表
    protected $table = 'entry_settings';

    // 获取开始时间
    public static function getStartDate($key='entry_start_time')
    {
        return static::where('key', '=', $key)->first()->value;
    }

    // 获取结束时间
    public static function getEndDate($key='entry_end_time')
    {
        return static::where('key', '=', $key)->first()->value;
    }

    // 获取站点状态
    public static function getStatus($key='entry_site_status')
    {
        return static::where('key', '=', $key)->first()->value;
    }

    // 获取title
    public static function getTitle($key='entry_site_title')
    {
        return static::where('key', '=', $key)->first()->value;
    }

    // 获取description
    public static function getDescription($key='entry_site_description')
    {
        return static::where('key', '=', $key)->first()->value;
    }

    // 获取notice
    public static function getNotice($key='entry_notice')
    {
        return static::where('key', '=', $key)->first()->value;
    }

    // 获取背景色
    public static function getEntrySiteBackgroundAttribute($key='entry_site_background')
    {
        return static::where('key', '=', $key)->first()->value;
    }

}
