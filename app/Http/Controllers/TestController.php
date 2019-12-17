<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TestBasicService;

class TestController extends Controller
{

    public function getOne()
    {
        $result = new TestBasicService();
        return response()->json($result->getOne());
    }

    public function setOne(Request $request)
    {
        $result = new TestBasicService();

        $result->setName($request->json()->get('name'));
        $result->setAge($request->json()->get('age'));
        $result->setIsMen($request->json()->get('isMen'));

        return response()->json($result->getOneValues());
    }

}
