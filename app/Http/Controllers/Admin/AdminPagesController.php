<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminPagesController extends Controller
{
    public function admin(): Factory|View|Application
    {
        return view('pages.admin.admin');
    }
}
