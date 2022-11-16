<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDistribusi extends Model
{
    use HasFactory;

    protected $fillable = ['distribusi_id', 'pangkalan_id', 'qty'];

    public function pangkalan()
    {
        return $this->belongsTo(Pangkalan::class);
    }
}
