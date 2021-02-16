<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frog extends Model
{
    protected $fillable = ['name', 'gender','date_of_birth','date_of_death','pond_number'];

    public function pond()
    {
      return $this->belongsTo(Pond::class);
    }
}
