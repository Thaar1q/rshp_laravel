<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.home');
    }
    
    public function connectTest()
    {
        try {
            \DB::connection()->getPdo();
            return 'Database connected.';
        } catch (\Exception $e) {
            return 'Database failed to connect: ' . $e->getMessage();
        }
    }
}
