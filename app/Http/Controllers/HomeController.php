<?php

namespace App\Http\Controllers;

use Auth;
use App\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $uid = Auth::user()->id;
      $open = count(Job::whereHas('users', function ($q) use ($uid) {
        $q->where('user_id', $uid)->whereNull('comment');
      })->where('jobstatus', 'open')->get());

      $closed = count(Job::whereHas('users', function ($q) use ($uid) {
        $q->where('user_id', $uid)->whereNull('comment');
      })->where('jobstatus', 'closed')->get());

      $pending = count(Job::whereHas('users', function ($q) use ($uid) {
        $q->where('user_id', $uid)->whereNull('comment');
      })->where('jobstatus', 'pending')->get());

      $jobs = Job::where('jobowner', $uid)->get();


        return view('home', ['open' => $open, 'closed' => $closed, 'pending' => $pending, 'jobs' => $jobs]);
    }
}
