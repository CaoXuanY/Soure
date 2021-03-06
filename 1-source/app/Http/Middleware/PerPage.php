<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PerPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $per_page = $request->input('per_page');
        //is null
        // if (empty($per_page)) {
        //     $per_page = 10;
        // }

        // //is string
        // if (!is_numeric($per_page)) {
        //     return redirect('error');
        // }
        //is null
        if (empty($per_page)) {
            $per_page = 10;

        }

        //is string
        if (is_string($per_page)) {
            $per_page = 10;
            
          
        }
        $number =[10,20,30,40,50];
        if(!in_array($per_page,$number))
        {
            $per_page=10;
        }
        // else{$per_page=20;}     

        $request->merge([ 'per_page' => $per_page]);

        return $next($request);
    }
}
