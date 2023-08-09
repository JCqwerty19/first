<?php

namespace App\Http\Controllers\Auth\Register;

use App\Services\Auth\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
