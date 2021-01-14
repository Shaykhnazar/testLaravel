<?php


namespace App\Services;


use App\Models\User;

class UserService
{
    /**
     * @param $request
     * @return bool
     */
    public function getExperienceUser($request)
    {
        if (empty($request)) {
            return false;
        }
        return User::find($request->user_id)->experience;
    }

    /**
     * @param $request
     * @return bool
     * @throws \Exception
     */
    public function setExperienceUser($request)
    {
        if (empty($request)) {
            return false;
        }

        $user = User::find($request->user_id);
        $user->experience = random_int(1, 50);

        if ($user->update()) {
            return true;
        }

        return false;
    }
}
