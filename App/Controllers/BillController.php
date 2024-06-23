<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\Session;

class BillController extends Controller
{

    public function index()
    {
        loadView(
            'bills/index',
            [
                'bills' => []
            ]
        );
    }
}
