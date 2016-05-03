<?php

namespace App\Models;

use App\Traits\LocalizedDates;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use LocalizedDates;
}
