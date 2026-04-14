<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model {
    use HasFactory;

    protected $table = 'task';
    protected $guarded = [];

    public function pet() {
        return $this->belongsTo(Pet::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}