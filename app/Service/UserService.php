<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;

class UserService
{
    private $table = 'users';

    public function getUserByEmail($email)
    {
        return DB::table($this->table)->where('email', $email)->first();
    }

    public function getUserById($id)
    {
        return DB::table($this->table)->where('id', $id)->first();
    }

    public function create($data)
    {
        return DB::table($this->table)->insert($data);
    }
}
