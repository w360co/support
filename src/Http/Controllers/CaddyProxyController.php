<?php

namespace W360\Support\Http\Controllers;

use Illuminate\Http\Request;

class CaddyProxyController extends SupportController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $authorizedDomains = [
            env('APP_SERVICE'),
            'www.' . env('APP_SERVICE'),
            'localhost',
            // Add subdomains here
        ];

        if (in_array($request->query('domain'), $authorizedDomains)) {
            return response('Domain Authorized');
        }

        // Abort if there's no 200 response returned above
        abort(503);
    }
}