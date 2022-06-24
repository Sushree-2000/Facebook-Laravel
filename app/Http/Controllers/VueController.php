<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueController extends Controller
{
    //
    public function api(){
        return response() -> json([
            'msg' => 'We should return only JSON.'
        ]);
    }
}
