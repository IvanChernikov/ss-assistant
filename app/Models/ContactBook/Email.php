<?php

namespace App\Models\ContactBook;

use Illuminate\Database\Eloquent\Model;

class Email extends Model {
	protected $table = 'cb_emails';
	protected $fillable = [
		'value', 'type'
	];
	public $timestamps = false;
}
