<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Routing\Controller as ParentController;

class BaseController extends ParentController
{

    public function getUser($token) {

        if (!empty($token)) {
            if (User::where('persist_code', $token)->exists()) {
                return User::where('persist_code', $token)->first();
            }
        }
        return false;
    }

    public function getCheckMe(\Request $request) {

        return $request->get('tz');
    }
}