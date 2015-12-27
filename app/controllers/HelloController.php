<?php
namespace App\Controllers;

class HelloController extends Controller
{
    public function getWorld()
    {
        return $this->blade->make('index');
    }
}
