<?php

namespace app\framework\component;



abstract class Controller
{
    protected $view;

    public function index()
    {
        return 'Say hello for me!';
    }
}