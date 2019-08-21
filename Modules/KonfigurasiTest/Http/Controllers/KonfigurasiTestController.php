<?php

namespace Modules\KonfigurasiTest\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class KonfigurasiTestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('konfigurasitest::index');
    }

    public function formSubmit()
    {
        return view('konfigurasitest::test_form_submit');
    }
}
