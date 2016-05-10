<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;


class IndexController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
        view()->share(['_index' => 'active']);
    }
    function index()
    {
        return view('admin.index.index');
    }

    function user()
    {
        return view('admin.index.user');
    }
}
