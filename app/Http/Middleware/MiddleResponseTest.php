<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MiddleResponseTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $countSegments = count( $request->segments());
        if (  $countSegments == 1 ) {
            $oneSegment = $request->segment($countSegments);
            return $response
                ->header('Content-Type', 'text/html')
                ->header('X-count-URL-segments', $countSegments)
                ->header('X-one-URL-segment', $oneSegment);
                // ->header('X-two-URL-segment', $valueSegment);
                // ->cookie('count-URLsegments', $countSegments, 5);
        }
        elseif ( $countSegments == 2 ) {
            $oneSegment = $request->segment($countSegments-1);
            $twoSegment = $request->segment($countSegments);
            return $response
                ->header('Content-Type', 'text/html')
                ->header('X-count-URL-segments', $countSegments)
                ->header('X-one-URL-segment', $oneSegment)
                ->header('X-two-URL-segment', $twoSegment);
                // ->withHeaders([
                //     'Content-Type' => 'text/html',
                //     'X-count-URL-segments', $countSegments,
                //     'X-one-URL-segment', $oneSegment,
                //     'X-two-URL-segment', $twoSegment
                // ]);
                // ->cookie('visit-create-site', true, 5);
                // ->cookie('count-URLsegments', $countSegments, 5);
        }
        else { // $countSegments == 0, ( http://laravel-5vite.loc/ )
            return $response
            ->header('Content-Type', 'text/html')
            ->header('X-count-URL-segments', $countSegments);
            // ->cookie('visit-create-site', true, 5);
        }
    }
}
