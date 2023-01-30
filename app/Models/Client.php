<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model  
{
    use HasFactory;

    const PER_PAGE = [
        'visi', 3, 5, 10, 20
    ];

    const SORT = [
        'asc_name' => 'vardas A-Z',
        'desc_name' => 'vardas Z-A',
        'asc_surname' => 'pavarde A-Z',
        'desc_surname' => 'pavarde Z-A'
    ];

    const FILTER = [
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '>=3' => '>=3'
    ];

    public function clientIbans()
    {
        return $this->hasMany(Iban::class);
    }
}
