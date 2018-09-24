<?php

namespace App\Http\Middleware;

use Closure;
use App\Lib\Common\Utility;

class PublicCall
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
        // check public auth token
        if(false === $this->validateToken($request)) {

            // token is not authorized to make call
            return Utility::sendFailed(\Config::get('constants_en.txt.txt_unauthorized_request'), \Config::get('constants_en.code.code_unauthorized_request'));
        }
        return $next($request);
    }

    protected function validateToken($request) {
        $hash = $request->input('mf_hash', '');
        if (in_array($hash, [
            '345B6E57D8A612A85ABE973CF20EBFE69ACE3FA2B6A851ECB944839427B506D9', // Mentorif frontend token
        ])) {
            return true;
        }
        return false;
    }
}
