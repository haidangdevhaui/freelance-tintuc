<?php
function cate_parent($data, $parent = 0, $str = "--", $select = 0)
{
    foreach ($data as $data_val) {
        $id   = $data_val->id;
        $name = $data_val->name;
        if ($data_val->parent_id == $parent) {
            if(is_array($select)){
                if (in_array($id, $select)) {
                    echo "<option selected='selected' value='$id'>$str$name</option>";
                } else {
                    echo "<option value='$id'>$str$name</option>";
                }
            }else{
                if ($id == $select) {
                    echo "<option selected='selected' value='$id'>$str$name</option>";
                } else {
                    echo "<option value='$id'>$str$name</option>";
                }
            }
            
            cate_parent($data, $id, $str . "--", $select);
        }
    }
}
function check_select($param)
{
    $url_path           = Request::path();
    return $active_list = strpos($url_path, $param);
}
function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die;
}

use Carbon\Carbon;

function postTimer($time){
    $dt = Carbon::parse($time);
    return $dt->hour.':'.$dt->minute.' '.$dt->day.'/'.$dt->month.'/'.$dt->year;
}


function positionName($position){
    foreach (config('adv') as $key => $value) {
        foreach ($value as $k) {
            if($k['value'] == $position){
                return $k['name'];
            }
        }
    }
}