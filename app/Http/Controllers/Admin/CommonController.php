<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


class CommonController extends Controller
{
    function __construct()
    {
        $admin = \Auth::user();
        view()->share('admin', $admin);
    }
    function back($info = "")
    {
        if ($info != "") {
            echo "<script>alert('" . $info . "')</script>";
        }
        echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "'</script>";
    }
}
