<?php

namespace App\Models;

use App\Traits\LocalizedDates;
use App\Presenters\UserPresenter;
use Illuminate\Auth\Authenticatable;
use Adrianyg7\Acl\Users\User as UserModel;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Laracasts\Presenter\PresentableTrait;

class User extends UserModel implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, LocalizedDates, PresentableTrait;

    /**
     * The Presenter class to use
     *
     * @var string
     */
    protected $presenter = UserPresenter::class;
}
