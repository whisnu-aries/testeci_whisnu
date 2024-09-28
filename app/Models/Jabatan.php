<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
  use HasFactory;
  protected $table = 'jabatan';

  public function level()
  {
    return $this->hasOne(Level::class, 'id_level', 'id_level');
  }
}
