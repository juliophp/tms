<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jobtitle', 'jobdescription', 'jobdeadline', 'jobstatus', 'jobowner', 'is_active'
    ];


    public function users()
    {
      return $this->belongsToMany('App\User')->withPivot('comment')->withTimestamps();
    }

}
