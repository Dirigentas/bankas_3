<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model  
{
    use HasFactory;

    const PER_PAGE = [
        'all', 5, 10, 15, 20
    ];

    public function clientIbans()
    {
        return $this->hasMany(Iban::class);
    }
}
