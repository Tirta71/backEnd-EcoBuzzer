<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $primaryKey = 'PhotoID';

     protected $fillable = [
        'ProductID',
        'URLFoto',
    ];

    public function product()
    {
        return $this->belongsTo(Produk::class, 'ProductID');
    }
 

}
