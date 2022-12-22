<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblDetailTransaksi extends Model
{
    use HasFactory;
    protected $table="tbl_detail_transaksi";
    protected $primaryKey="id";
    public $timestamps = false;
    protected $fillable = ["id","id_pengguna","id_barang","jumlah","tgl","barang"];
}
