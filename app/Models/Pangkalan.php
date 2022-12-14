<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkalan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nohp', 'alamat'];

    public function item()
    {
        return $this->hasOne(ItemDistribusi::class);
    }
}
