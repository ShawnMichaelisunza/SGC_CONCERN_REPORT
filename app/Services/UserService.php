<?php


namespace App\Services;

use App\Models\User;

class UserService{

    public function UserStoreService($data){

        $user = User::create($data);

        return $user;
    }

}
