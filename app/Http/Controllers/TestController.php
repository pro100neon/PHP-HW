<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TestBasicService;
use App\Facades\TestBasicServiceFacade;

class TestController extends Controller
{
    private $testBasicService;
    public function __construct(TestBasicServiceFacade $BasicService)
    {
        $this->testBasicService = $BasicService;
    }

    public function getOne()
    {
        //$result = new TestBasicService();
        return TestBasicServiceFacade::getOne();
    }

    public function setOne(Request $request)
    {
       // $result = new TestBasicServiceFacade();

        TestBasicServiceFacade::setName($request->json()->get('name'));
        TestBasicServiceFacade::setAge($request->json()->get('age'));
        TestBasicServiceFacade::setIsMen($request->json()->get('isMen'));

        return response()->json(TestBasicServiceFacade::getOneValues());
    }

}
