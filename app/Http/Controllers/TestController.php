<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    private $name = 'Petya';
    private $age = 18;
    private $isMen = true;

    private function getType()
    {
        return ['name' => gettype($this->name),
                'age' => gettype($this->age),
                'isMen' => gettype($this->isMen)];
    }

    public function getOne()
    {
        return $this->getType();
    }

    public function setName(String $var)
    {
        $this->name = $var;
    }

    public function setAge(Int $var)
    {
        $this->age = $var;
    }

    public function setIsMen(bool $var)
    {
        $this->isMen = $var;
    }
}


