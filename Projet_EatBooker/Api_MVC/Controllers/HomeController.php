<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $this->render('home/index');
    }

    public function test()
    {
        $this->render('home/index');
    }

    public function test2()
    {
        $this->render('home/index');
    }
}
