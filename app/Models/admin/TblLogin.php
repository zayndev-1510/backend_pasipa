<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblLogin extends Model
{
    use HasFactory;
    protected $table="tbl_login";
    protected $primaryKey="id";
    public $timestamps = false;
    protected $fillable = ["id","username","sandi","hak_akses","tgl_buat","id_pengguna"];
}
