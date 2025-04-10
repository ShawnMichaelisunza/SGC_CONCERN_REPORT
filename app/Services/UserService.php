<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    // view all accounts
    public function UserViewAllService()
    {
        $users = User::orderBy('created_at', 'DESC');

        if (request()->has('search_name')) {
            $users = $users->where('name', 'like', '%' . request()->get('search_name', '') . '%');
        }

        return $users->paginate(9);
    }
    // view deleted accounts
    public function UserViewDeletedService()
    {
        $users = User::onlyTrashed()->orderBy('created_at', 'DESC');

        if (request()->has('search_name')) {
            $users = $users->where('name', 'like', '%' . request()->get('search_name', '') . '%');
        }

        return $users->paginate(9);
    }

    // create account
    public function UserStoreService($data)
    {
        $user = User::create($data);

        return $user;
    }

    // view an account
    public function UserViewService($id)
    {
        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);

        return $user;
    }

    // edit and update an account
    public function UserEditService($id)
    {
        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);

        return $user;
    }
    public function UserUpdateService($id, $data)
    {
        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);

        return $user->update($data);
    }

    // view and delete an account
    public function UserViewDeleteService($id)
    {
        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);

        return $user;
    }
    public function UserDeleteService($id)
    {
        $decrypt = decrypt($id);
        $user = User::findOrFail($decrypt);
        $user->usertype = 'DELETED';
        $user->delete();
        $user->save();

        return $user;
    }

    // view and restore an account
    public function UserViewRestoreService($id)
    {
        $decrypt = decrypt($id);
        $user = User::withTrashed()->findOrFail($decrypt);

        return $user;
    }
    public function UserRestoreService($id)
    {
        $decrypt = decrypt($id);
        $user = User::withTrashed()->findOrFail($decrypt);

        if ($user->trashed()) {
            $user->restore();
            $user->usertype = 'user';
            $user->save();

            return $user;
        }
    }
}
