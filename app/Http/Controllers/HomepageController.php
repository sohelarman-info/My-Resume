<?php

namespace App\Http\Controllers;

use App\About;
use App\Education;
use App\Fact;
use App\Footer;
use App\home;
use App\Pcat;
use App\Ppost;
use App\Profession;
use App\Resume;
use App\Service;
use App\ServicePost;
use App\Skill;
use App\Social;
use App\Summary;
use App\Testimonial;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    function Homepage(){
        return view('frontend.homepage',[
            'homes'         => home::all(),
            'abouts'        => About::all(),
            'facts'         => Fact::orderBy('id', 'desc')->get(),
            'skills'        => Skill::orderBy('id', 'desc')->get(),
            'resumes'       => Resume::all(),
            'summaries'     => Summary::all(),
            'educations'    => Education::orderBy('id', 'desc')->get(),
            'professions'   => Profession::orderBy('id', 'desc')->get(),
            'pcats'         => Pcat::all(),
            'pposts'        => Ppost::orderBy('id', 'desc')->get(),
            'services'      => ServicePost::orderBy('id', 'desc')->get(),
            'service_main'  => Service::all(),
            'testimonials'  => Testimonial::where('status', 1)->orderBy('id','desc')->get(),
            'footers'       => Footer::all(),
            'socials'       => Social::all(),
        ]);
    }
    function PortfolioDetails($slug){
        return view('frontend.portfolio-details',[
            'pcats' => Pcat::orderBy('id', 'desc')->get(),
            'ppost' => Ppost::where('slug', $slug)->first(),
        ]);
    }
    function ServiceDetails($slug){
        return view('frontend.service-details',[
            'service' => ServicePost::where('slug', $slug)->first(),
        ]);
    }
}

