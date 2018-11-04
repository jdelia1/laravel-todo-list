<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait TimestampsTrait {

	public $timestamps = true;

	public function getCreatedAtAttribute() {
		return Carbon::parse($this->attributes['created_at'])->diffForHumans();
	}

	public function getUpdatedAtAttribute() {
		return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
	}

}