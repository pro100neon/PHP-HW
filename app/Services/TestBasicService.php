<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Exceptions\MyTestException;
use App\Models\Test;

class TestOne
{
    private $name;
    private $age;
    private $isMen;
}


class TestBasicService
{
    private $name = 'Petya';
    private $age = 18;
    private $isMen = true;
    private $testOne;

    public function __construct(TestOne $Var)
    {
        $this->testOne = $Var;
    }

    private function getType()
    {
        return array(['name' => gettype($this->name),
            'age' => gettype($this->age),
            'isMen' => gettype($this->isMen)]);
    }

    public function getOneValues()
    {
        return array(['name' => $this->name,
            'age' => $this->age,
            'isMen' => $this->isMen]);
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

    public static function getException($id)
    {
        $result = Test::find($id);
        throw_if($result == null, MyTestException::class);
        return $result;
    }
}

