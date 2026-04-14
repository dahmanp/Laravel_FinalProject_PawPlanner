<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model {
    use HasFactory;

    protected $guarded = [];

    public function users() {
        return $this->belongsToMany(User::class, 'pet_user');
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}