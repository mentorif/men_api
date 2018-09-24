<?php

namespace App\Http\Middleware;

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

            return Utility::sendFailed(\Config::get('constants_en.unauthorized_request'), \Config::get('constants_en.unauthorized_request_code'));
        }
        return $next($request);
    }

    protected function validateToken($request) {

        return true;
        $hash = $request->input('mf_token', '');
        if (in_array($hash, [
            '345B6E57D8A612A85ABE973CF20EBFE69ACE3FA2B6A851ECB944839427B506D9', // Mentorif frontend token
        ])) {
            return true;
        }
        return false;
    }
}
