<?php

namespace App\Http\Middleware;

use App\Lib\Common\Utility;
use App\Model\User;
use Closure;

class PrivateCall
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // check private auth token
        if(false === $this->validateToken($request)) {

            return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
        }
        return $next($request);
    }

    protected function validateToken($request) {

        $hash = $request->input('mf_token', '');
        if (!empty($hash)) {
            $count = User::where('persist_code', $hash)->count();
            if ($count > 0) {
                return true;
            }
        }
        return false;
    }
}
