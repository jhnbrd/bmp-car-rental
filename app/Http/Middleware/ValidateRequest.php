<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateRequest
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
        // Sanitize input data
        $input = $request->all();
        array_walk_recursive($input, function (&$value) {
            if (is_string($value)) {
                $value = strip_tags($value);
                $value = trim($value);
            }
        });
        $request->merge($input);

        // Check for required headers for API requests
        if ($request->is('api/*')) {
            if (!$request->accepts('application/json')) {
                return response()->json([
                    'message' => 'Header Accept: application/json is required',
                    'status' => 'error'
                ], Response::HTTP_BAD_REQUEST);
            }
        }

        return $next($request);
    }
} 