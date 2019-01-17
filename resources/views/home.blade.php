@extends('layouts.skin')

@section('content')
<div class="row">
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-danger card-img-holder text-white">
      <div class="card-body">
        <img src="{{ asset('images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image"/>
        <h4 class="font-weight-normal mb-3">Closed Jobs
          <i class="mdi mdi-chart-line mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">{{ $closed }}</h2>
        <a href="{{ route('jobstatus.index', 'closed')}}" style="color: #fff; text-decoration: none"><h6 class="card-text">See all closed jobs</h6></a>      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-info card-img-holder text-white">
      <div class="card-body">
        <img src="{{ asset('images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image"/>
        <h4 class="font-weight-normal mb-3">Open Jobs
          <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">{{ $open }}</h2>
        <a href="{{ route('jobstatus.index', 'open')}}" style="color: #fff; text-decoration: none"><h6 class="card-text">See all open jobs</h6></a>
      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white">
      <div class="card-body">
        <img src="{{ asset('images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image"/>
        <h4 class="font-weight-normal mb-3">Pending Jobs
          <i class="mdi mdi-diamond mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">{{ $pending }}</h2>
        <a href="{{ route('jobstatus.index', 'pending')}}" style="color: #fff; text-decoration: none"><h6 class="card-text">See all pending jobs</h6></a>
      </div>
    </div>
  </div>
</div>

@endsection




@section('recent')
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Jobs, You've Recently Assigned</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Assignee</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Last Update</th>
                <th>Tracking ID</th>
              </tr>
            </thead>
            <tbody>
              @foreach($jobs as $job)
              <tr>
                <td><img src="{{ asset('images/faces/face29.png')}}" class="mr-2" alt="image">D. Grey</td>
                <td>{{ $job->jobtitle }}</td>
                <td><label class="@if($job->jobstatus == 'pending') badge badge-gradient-danger @elseif($job->jobstatus == 'closed') badge badge-gradient-success  @elseif($job->jobstatus == 'open') badge badge-gradient-info @endif">{{ ucfirst($job->jobstatus) }}</label></td>
                <td>{{ $job->updated_at }}</td>
                <td><a href="{{ route('jobs.show', $job->id)}}">WD-{{ $job->id }}</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
