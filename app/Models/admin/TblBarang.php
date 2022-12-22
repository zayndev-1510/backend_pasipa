<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblBarang extends Model
{
    use HasFactory;
    protected $table="tbl_barang";
    protected $primaryKey="id";
    public $timestamps = false;
    protected $fillable = ["id","nomor_barcode","nama_barang","harga","stok","harga_jual"];
}
