<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    /**
     * Returns user's full name.
     *
     * @return string
     */
    public function full_name()
    {
        return $this->entity->first_name . ' ' . $this->entity->last_name;
    }

    /**
     * Returns user roles.
     *
     * @return string
     */
    public function roles()
    {
        return $this->entity->roles->implode('name', ', ');
    }
}
