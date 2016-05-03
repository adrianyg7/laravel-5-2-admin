<?php

namespace App\Fillers;

use App\Models\Role;

class UserFiller {
    /**
     * List roles
     *
     * @return array
     */
    public function roles()
    {
        $roles = Role::lists('name', 'id')->all();

        return $this->addPlaceHolerOption($roles);
    }

    /**
     * Adds a placeholder option to a given array
     *
     * @param  array $options
     * @return array
     */
    protected function addPlaceHolerOption(array $options)
    {
        return ['' => ''] + $options;
    }
}
