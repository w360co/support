<?php

namespace W360\Support\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class SupportController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
