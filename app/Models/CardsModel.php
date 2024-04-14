<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardsModel extends Model
{
    use HasFactory;
    protected $table = 'cards';
    protected $primaryKey = 'card_id';

    protected $fillable = ['card_image', 'card_title', 'card_history', 'card_like'];
}
