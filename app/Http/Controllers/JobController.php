<?php

namespace App\Http\Controllers;

use Auth;
use App\Job;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\JobAlert;


class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all jobs assigned to a user

        // $job  = Job::find(11111);
        // foreach ($job->users as $user) {
        //   ($user->pivot->comment);
        //
        //   // code...
        // }
        $uid = Auth::user()->id;
        $jobs = Job::whereHas('users', function ($q) use ($uid) {
          $q->where('user_id', $uid)->whereNull('comment');
        })->get();
        return view('jobs.index', ['jobs'=> $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //displays a form to add a new job
        return view('jobs.create');
    }



    public function fetch($department)
    {
      $emp = User::where('department', $department)->get();
      return json_encode($emp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //takes data from request and add to object.
        $this->validate($request, array(
            'jobtitle' => 'required|max:255',
            'jobdescription' => 'required',
            'jobdeadline' => 'required',
            )
         );

         $job = new Job;
         $job->jobtitle = $request->jobtitle;
         $job->jobdescription = $request->jobdescription;
         $job->jobdeadline = $request->jobdeadline;
         $job->jobstatus = 'pending';
         $job->jobowner = Auth::user()->id;
         $job->save();
         $job->users()->attach($request->employee);
         $user = User::findOrFail($request->employee);
         //$user->notify(new JobAlert($job));

         return redirect()->route('jobs.index')->with('success', 'You have successfully created the job');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show a single form for the specified resource
        $job = Job::findOrFail($id);
        if($job->viewcount == 0)
        {
          $job->viewcount++;
          $job->jobstatus = 'open';
        }
        $job->save();
        return view('jobs.show', ['job' => $job]);
    }

    public function status($status)
    {
        $uid = Auth::user()->id;

        $jobs = Job::whereHas('users', function ($q) use ($uid) {
          $q->where('user_id', $uid)->whereNull('comment');
        })->where('jobstatus', $status)->get();

        return view('jobs.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('jobs.edit', ['jobs' => Job::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate input
        // $request->validate([
        //   'jobtitle' => 'required:string',
        //   'jobdescription' => 'required',
        //   'jobdeadline' => 'required',
        //   'jobstatus' => 'required',
        //   'jobowner' => 'require',
        // ]);

        //call a job object with the id and Update
        $job =  Job::findOrFail($id);
        $uid = Auth::user()->id;
        $job->jobstatus = $request->jobstatus;
        $job->users()->attach($uid, ['comment' => $request->comment]);
        $job->save();


        return redirect()->route('jobs.index')->with('success', 'You have successfully updated the job');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //delete an instance of the job
        $job =  Job::findOrFail($id);
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'You have successfully deleted a job');



    }
}
