<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
 use HasFactory;
 protected $primaryKey = 'cat_id';
 protected $fillable = ['name','date_of_birth'];
 public $timestamps = false;

 public function setDateOfBirthAttribute($value)
  {

  $this->attributes['date_of_birth'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
  }
  public function getDateOfBirthAttribute($value)
  {
  return Carbon::createFromFormat('Y-m-d', $this->attributes['date_of_birth'])->format('d/m/Y');

  }
  public function add_age()
  {
    return Carbon::parse($this->attributes['date_of_birth'])->age;
  }
 }