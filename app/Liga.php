<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    protected $table = 'ligas';
    protected $primarykey = 'id';
    protected $fillable = [
        'id', 'nama', 'gambar'
    ];


    // Relasi dengan tabel product
    public function products()
    {
        return $this->hasMany(Product::class, 'liga_id', 'id');
    }

}
