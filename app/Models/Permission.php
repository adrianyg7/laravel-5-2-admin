<?php

namespace App\Models;

use App\Traits\LocalizedDates;
use Adrianyg7\Acl\Permissions\Permission as PermissionModel;

class Permission extends PermissionModel
{
    use LocalizedDates;
}
