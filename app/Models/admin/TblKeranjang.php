<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblKeranjang extends Model
{
    use HasFactory;
    protected $table="tbl_keranjang";
    protected $primaryKey="id";
    public $timestamps = false;
    protected $fillable = ["id","id_pengguna","id_barang","jumlah","tgl","harga","status","nomor_keranjang"];
}
