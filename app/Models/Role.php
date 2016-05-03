<?php

namespace App\Models;

use App\Traits\LocalizedDates;
use Adrianyg7\Acl\Roles\Role as RoleModel;

class Role extends RoleModel
{
    use LocalizedDates;
}
