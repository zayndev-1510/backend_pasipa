<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblTransaksi extends Model
{
    use HasFactory;
    protected $table="tbl_transaksi";
    protected $primaryKey="id";
    public $timestamps = false;
    protected $fillable = ["id","nomor_transaksi","total","kasir","tgl","nomor_keranjang","id_pengguna","jumlah"];
}
