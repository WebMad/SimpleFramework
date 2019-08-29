<?php

namespace app\controller;

use app\framework\component\Controller;
use app\framework\component\View;
use app\framework\database\DB;

class DefaultController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
            ->select(['name', 'login', 'password', 'phone'])
            ->where('users.id', '=', '1')
            ->leftJoin('phones')
            ->on('phones.user_id', '=', 'users.id')
            ->execute();
        View::renderTemplate('errors/error404.php', 'home', ['message' => $user]);
    }
}