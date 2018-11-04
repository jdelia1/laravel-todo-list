<?php

namespace App\Models;

use App\Http\Traits\TasksTrait;
use App\Http\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	use TimestampsTrait;
	use TasksTrait;
    protected $table = 'tasks';

	public function getDates() {
		return array('created_at', 'updated_at', 'due_date');
	}

    //created at (5 minutes ago)

    //updated at
}
