<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Service\ResponseOutput\JsonResponseOutput;

class BaseController extends Controller
{
    protected JsonResponseOutput $responseOutput;

    public function __construct()
    {
        $this->responseOutput = new JsonResponseOutput();
    }
}