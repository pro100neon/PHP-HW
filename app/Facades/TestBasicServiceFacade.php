<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

use App\Services\TestBasicService;



/**

 * @method static getOne()
 * @method static setName(String $var)
 * @method static setAge(Int $var)
 * @method static setIsMen(bool $var)
 * @method static getOneValues()

 * @see \App\Services\TestBasicService

 */



class TestBasicServiceFacade  extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'service.vk_basic';
    }

}
