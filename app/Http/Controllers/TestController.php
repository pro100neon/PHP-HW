<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    public function getOne()
    {
        $result = new TestOne();
        return $result->getOne();
    }

    public function setOne(Request $request)
    {
        $result = new TestOne();

        $result->setName($request->json()->get('name'));
        $result->setAge($request->json()->get('age'));
        $result->setIsMen($request->json()->get('isMen'));

        return $result->getOneValues();
    }

}

class TestOne
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

    public function getOneValues()
    {
        return ['name' => $this->name,
            'age' => $this->age,
            'isMen' => $this->isMen];
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

    public function getOne()
    {
        return $this->getType();
    }
}


