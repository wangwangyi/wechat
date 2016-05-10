<?php
/**
 * 调试数组函数
 * @param $arr
 */
function p($arr)
{
    if (is_array($arr)) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    } else {
        echo $arr;
    }
}

/**
 * 递归生成无限极分类数组
 * @param $data
 * @param int $parent_id
 * @param int $count
 * @return array
 */
function tree(&$data, $parent_id = 0, $count = 1)
{
    static $treeList = [];

    foreach ($data as $key => $value) {
        if ($value['parent_id'] == $parent_id) {
            $value['count'] = $count;
            $treeList [] = $value;
            unset($data[$key]);
            tree($data, $value['id'], $count + 1);
        }
    }
    return $treeList;
}

/**
 * 栏目名前面加上缩进
 * @param $count
 * @return string
 */
function blank_to_category($count)
{
    $str = '';
    for ($i = 1; $i < $count; $i++) {
        $str .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    }
    return $str;
}

function order_status($status)
{
    $info = config('shop_express.order_status');
    return $info["$status"];
}

/**
 * 微信菜单, 删除空数组
 * @param $buttons
 */
function wechat_menus($request_buttons)
{
    $buttons = [];

    foreach ($request_buttons as $key => $value) {
        if ($value['name'] == "") {
            continue;
        }

        $buttons["$key"] = wechat_key_url($value);

        foreach ($value["sub_button"] as $k => $v) {
            if ($v['name'] == "") {
                continue;
            }
            $buttons["$key"]["sub_button"][] = wechat_key_url($v);
        }
    }
    return $buttons;
}


function time_format($attr, $datetime)
{
    if ($datetime == "") {
        return "";
    }
    return date($attr, strtotime($datetime));
}
/**
 * 根据类型,返回url或者key
 * @param $value
 * @return array
 */
function wechat_key_url($value)
{
    $result = [];

    $result['type'] = $value['type'];
    $result['name'] = $value['name'];
    if ($value['type'] == "click") {
        $result['key'] = $value['value'];
    } else {
        $result['url'] = $value['value'];
    }
    return $result;
}