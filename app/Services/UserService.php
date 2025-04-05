<?php


namespace App\Services;

use App\Models\User;

class UserService{

    // view all accounts
    public function UserViewAllService(){

        $users = User::orderBy('created_at', 'DESC');

        return $users->paginate(9);
    }
    // view deleted accounts
    public function UserViewDeletedService(){

        $users = User::onlyTrashed()->orderBy('created_at', 'DESC');

        return $users->paginate(9);
    }

    // create account
    public function UserStoreService($data){

        $user = User::create($data);

        return $user;
    }

    // view an account
    public function UserViewService($id){

        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);

        return $user;
    }

    // edit and update an account
    public function UserEditService($id){
        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);

        return $user;
    }
    public function UserUpdateService($id, $data){
        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);

        return $user->update($data);
    }

    // view and delete an account
    public function UserViewDeleteService($id){

        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);

        return $user;

    }
    public function UserDeleteService($id){

        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);
        $user->usertype = 'DELETED';
        $user->delete();
        $user->save();

        return $user;
    }

}
