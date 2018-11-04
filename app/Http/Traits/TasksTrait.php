<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait TasksTrait {

	public $due_date_formatting = true;

	public function getDueDateAttribute($val) {
		if ($this->due_date_formatting) {
			return Carbon::parse($val)->toFormattedDateString();
		} else {
			return $this->attributes['due_date'] = $val;
		}
	}

}