<?php

namespace App\Observers;

use App\Models\ContactBook\{Email,Person};
use App\User;

class UserObserver {
    public function creating(User $user) {
		if (empty($user->person_id)) {
			$person = Person::create([
				'first_name' => 'Enter first name',
				'last_name' => 'Enter last name',
				'date_of_birth' => now()
			]);
			$person->emails()->create([
				'value' => $user->email
			]);
			$user->person_id = $person->id;
		}
	}
}
