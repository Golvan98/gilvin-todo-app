<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClearSuccessMessage
{
    public function handle(Request $request, Closure $next)
    {
        // Proceed with the request
        $response = $next($request);

        // Clear the success message after a delay
        if ($request->session()->has('success')) {
            // Remove the success message after 3 seconds (adjust as needed)
            sleep(3);
            $request->session()->forget('success');
        }

        return $response;
    }
}
