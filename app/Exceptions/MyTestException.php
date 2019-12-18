<?php

namespace App\Exceptions;

use Exception;

class MyTestException extends Exception
{
    public function render()
    {
        return response()->json('my first exc', 444);
    }
}
