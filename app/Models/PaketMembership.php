<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketMembership extends Model
{
    use HasFactory;

    protected $table = 'paket_membership';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_paket',
        'durasi',
        'lama_dalam_hari',
        'harga',
    ];

    public $timestamps = true;
}
