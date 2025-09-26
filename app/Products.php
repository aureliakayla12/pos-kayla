<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = ['name','description','price','stock','image','status','categorie_id'];

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categorie_id');
    }
}
