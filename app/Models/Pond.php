<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pond extends Model
{
    protected $fillable = ['pond_name', 'capacity','current_size'];

    public function frogs()
    {
      return $this->hasMany(Frog::class);
    }
}
