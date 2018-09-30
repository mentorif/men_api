<?php

namespace App\Http\Middleware;

use App\Lib\Common\Utility;
use Closure;

class CallValidate
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
        if(1 == env('LOG_INPUT_CALL')) {
            $this->logRequest($request);
        }
        if(false === $this->authenticateClient($request)) {
            return Utility::sendFailed(\Config::get('constants_en.txt.txt_invalid_request'), \Config::get('constants_en.code.code_invalid_request'));
        }
        $response = $next($request);

        if(1 == env('LOG_OUTPUT')) {
            $this->logResponse($response);
        }

        return $response;
    }

    /*
     * Authenticate a valid client
     */
    protected function authenticateClient($request) {

        $headers = $request->headers->all();
        if(!empty($headers['x-request-client'][0])) {
            if ( in_array($headers['x-request-client'][0], ['Mentorif','Mentorif Admin','Mentorif Magic Backend']) ) {
                return true;
            }
        }
        return false;
    }

    protected function logRequest($request) {

        $log = [];
        $log['params'] = $request->all();
        $log['headers'] = $request->headers->all();
        $log['hostname'] = gethostname ();
        $log['datetime'] = date('Y-m-d H:i:s');
        $log['api_endpoint'] = $request->path();
        $log['full_url'] = $request->fullurl();
        $log['method'] = $request->method();

        $file = fopen(storage_path() . "/logs/calls.log", "a");
        fwrite($file, '------------------------Request Start------------------------' . "\n");
        fwrite($file, json_encode($log) . "\n");
        fwrite($file, '------------------------Request End------------------------' . "\n");
        fclose($file);
    }

    protected function logResponse($response) {

        $file = fopen(storage_path() . "/logs/calls.log", "a");
        fwrite($file, '------------------------Response Start------------------------' . "\n");
        fwrite($file, json_encode($response) . "\n");
        fwrite($file, '------------------------Response End------------------------' . "\n");
        fclose($file);
    }

}
