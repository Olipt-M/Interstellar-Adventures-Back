<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Journey;
use App\Models\JourneyType;


class Ship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'journey_type_id',
        'picture',
        'coeff_price'
    ];

    public function journeyType() : BelongsTo {
        return $this->belongsTo(JourneyType::class);
    }

    public function journey() : BelongsTo {
        return $this->belongsTo(Journey::class);
    }
}
