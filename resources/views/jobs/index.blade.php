@extends('layouts.skin')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">All Jobs</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#Job id</th>
                <th>Job Title</th>
                <th>Deadline </th>
                <th>Status</th>
                <th width="35%">Progress</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($jobs as $job)
              <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->jobtitle }}</td>
                <td>{{ $job->jobdeadline }}</td>
                <td><label class="@if($job->jobstatus == 'pending') badge badge-danger @elseif($job->jobstatus == 'closed') badge badge-success  @elseif($job->jobstatus == 'open') badge badge-info @endif">{{ $job->jobstatus}}</label></td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td>
                  <form method="get" action="{{ route('jobs.show', $job->id)}}">
                  <button type="submit" class="btn btn-outline-success btn-fw btn-sm">
                    <i class="mdi mdi-eye"></i>
                    View Job</button>
                  </form>
                </td>
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




@section('recent')

@endsection
