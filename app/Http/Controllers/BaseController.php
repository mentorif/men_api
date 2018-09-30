<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Routing\Controller as ParentController;

class BaseController extends ParentController
{

    public function getUser($token) {

        if (!empty($token)) {
            $userObj = User::where('persist_code', $token)->first();
            return $userObj;
        }
        return false;
    }
}