<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblRegistrasi extends Model
{
    use HasFactory;
    protected $table="tbl_registrasi";
    protected $primaryKey="id_register";
    public $timestamps = false;
    protected $fillable = ["id_register","nama","alamat","nomor_hp","foto","email"];
}
