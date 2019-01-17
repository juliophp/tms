@extends('layouts.skin')

@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Job Details</h4>

          <div class="form-group">
            <label for="exampleInputUsername1">Job ID:</label>
            <p>{{ $job->id }}</p>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Job title:</label>
            <p>{{ $job->jobtitle }}</p>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Job owner:</label>
            <p>{{ App\User::findOrFail($job->jobowner)->name }}</p>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Job Description:</label>
            <blockquote class="blockquote">{{ $job->jobdescription }}</blockquote>
          </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Deadline:</label>
            <p>{{ $job->jobdeadline }}</p>
          </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Job Status:</label>
            <p>{{ ucfirst($job->jobstatus) }}</p>
          </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Created At:</label>
            <p>{{ $job->created_at }}</p>
          </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Job Comments</h4>


        <table class="table">
          <thead>
            <tr>
              <th>Staff</th>
              <th>Comments</th>
            </tr>
          </thead>
          <tbody>
            @foreach($job->users as $user)
            @isset($user->pivot->comment)
            <tr>
              <td>{{ App\User::findOrFail($user->pivot->user_id)->name }}:</td>
              <td>{{ $user->pivot->comment }}</td>
            </tr>
            @endisset
            @endforeach
          </tbody>
        </table>
        <p></p>
        <form action="{{ route('jobs.update', $job->id)}}" method="post">
          @csrf
          @method('patch')
          <div class="form-group">
            <input type="hidden" name="jobowner" value="{{$job->jobowner}}" />
            <label for="exampleInputUsername1">Post Comments:</label>
            <textarea class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }} " rows="10" id="comment" name="comment" placeholder="Comments" required></textarea>
            @if ($errors->has('comment'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('comment') }}</strong>
                </span>
            @endif
            <p></p>
            <label for="exampleInputConfirmPassword1">Update Job Status:</label>
            <select class="form-control" id="status" name="jobstatus" required>
              <option value="open" {{ $job->jobstatus == 'open' ? 'selected="selected"' : '' }}>Open</option>
              <option value="closed" {{ $job->jobstatus == 'closed' ? 'selected="selected"' : '' }}>Closed</option>
            </select>

            <br>
            <button type="submit" class="btn btn-gradient-success btn-fw">Submit Comment</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
