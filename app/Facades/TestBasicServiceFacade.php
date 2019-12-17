<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

use App\Services\TestBasicService;



/**

 * @method getOne()
 * @method setName(String $var)
 * @method setAge(Int $var)
 * @method setIsMen(bool $var)
 * @method getOneValues()

 * @see \App\Services\TestBasicService

 */



class TestBasicServiceFacade  extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TestBasicService::class;
    }

}
