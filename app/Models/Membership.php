<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'paket_id',
        'bukti_transfer',
        'jumlah',
        'status',
        'tanggal_aktif',
        'tanggal_berakhir',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_pengguna');
    }

    public function paket()
    {
        return $this->belongsTo(PaketMembership::class, 'paket_id');
    }
}
