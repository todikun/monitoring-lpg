<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LpgDistribusi extends Model
{
    use HasFactory;

    protected $fillable = ['kode_trx', 'tanggal', 'status', 'keterangan'];

    public function item()
    {
        return $this->hasMany(ItemDistribusi::class, 'distribusi_id', 'id');
    }
}
