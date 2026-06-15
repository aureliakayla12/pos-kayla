<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;

class Customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $fillable = ['name', 'phone', 'address','is_member'];

    //Relasi ke Transaction
    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'customer_id', 'customer_id');
    }
}
