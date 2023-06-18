<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';
    protected $primaryKey = 'card_id';

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
