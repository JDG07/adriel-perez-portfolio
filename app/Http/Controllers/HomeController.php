<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Stat;
use App\Models\Tool;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $siteSetting = SiteSetting::first();

        $stats = Stat::orderBy('order')->get();

        $clients = Client::orderBy('order')->get();

        $tools = Tool::orderBy('order')->get();

        $projects = Project::with('categories')
            ->orderBy('order')
            ->get();
        
        $testimonials = Testimonial::where('active', true)
            ->orderBy('order')
            ->get();

        return view('home', compact(
            'siteSetting',
            'stats',
            'clients',
            'tools',
            'projects',
            'testimonials',
        ));
    }
}