<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TestBasicService;

class TestController extends Controller
{
    private $testBasicService;
    public function __construct(TestBasicService $BasicService)
    {
        $this->testBasicService = $BasicService;
    }

    public function getOne()
    {
        //$result = new TestBasicService();
        return response()->json($this->testBasicService->getOne());
    }

    public function setOne(Request $request)
    {
        //$result = new TestBasicService();

        $this->testBasicService->setName($request->json()->get('name'));
        $this->testBasicService->setAge($request->json()->get('age'));
        $this->testBasicService->setIsMen($request->json()->get('isMen'));

        return response()->json($this->testBasicService->getOneValues());
    }

}
