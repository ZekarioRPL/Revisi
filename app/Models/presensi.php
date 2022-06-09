<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presensi extends Model
{
    use HasFactory;
    protected $table = "presensis";
    protected $primaryKey = "id";
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function shift()
    {
        return $this->belongsTo(shift::class);
    }
    public function status()
    {
        return $this->belongsTo(User::class);
    }
}
