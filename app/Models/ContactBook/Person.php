<?php

namespace App\Models\ContactBook;

use Illuminate\Database\Eloquent\Model;

class Person extends Model {
    protected $table = 'cb_people';
	protected $fillable = [
		'first_name', 'last_name', 'date_of_birth'
	];
	public $timestamps = false;
	
	public function emails() {
		return $this->hasMany(Email::class);
	}
}
