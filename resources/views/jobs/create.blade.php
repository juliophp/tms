@extends('layouts.skin')

@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">New Job</h4>
        <p class="card-description">
        Fill in this form to add and assign a new Job.
        </p>
        <form action="{{ route('jobs.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="jobtitle">Job Title or Subject:</label>
            <input type="text"  class="form-control{{ $errors->has('jobtitle') ? ' is-invalid' : '' }} " id="jobtitle" name="jobtitle" placeholder="Title or Subject" required>

            @if ($errors->has('jobtitle'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('jobtitle') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label for="jobdescription">Job Description:</label>
            <textarea rows="9" class="form-control{{ $errors->has('jobdescription') ? ' is-invalid' : '' }} " id="jobdescription" name="jobdescription" placeholder="Job Description" required></textarea>

            @if ($errors->has('jobdescription'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('jobdescription') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label for="jobdeadline">Deadline:</label>
            <input type="date" class="form-control{{ $errors->has('jobdeadline') ? ' is-invalid' : '' }} " id="jobdeadline" name="jobdeadline" placeholder="Password" required>

            @if ($errors->has('jobdeadline'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('jobdeadline') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label for="department">Select Department</label>
            <select  name="department" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }} " id="department" required>
              <option value="">....</option>
              <option value="Information Technology">Information Technology - IT</option>
              <option value="Sales - Marketing">Sales - Marketing</option>
              <option value="Accounts - Admin">Accounts - Administration</option>
              <option value="Operations">Operations</option>
            </select>

            @if ($errors->has('department'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('department') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label for="employee">Select Employee</label>
            <select class="form-control" id="employee" name="employee" required>
              <option>.......</option>
            </select>
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2">Add Job</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
