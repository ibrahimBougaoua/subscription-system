<?php

namespace IbrahimBougaoua\FilamentSubscription\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feature extends Model
{
    use HasFactory;

    protected $table = 'filament_features';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'value',
        'resettable_period',
        'resettable_interval',
        'status',
    ];
    
    public function plans() : BelongsToMany
    {
        return $this->belongsToMany(Plan::class,"filament_plan_features");
    }

    public function belongsToPlan() : BelongsTo
    {
        return $this->belongsTo(Plan::class,"filament_plan_features");
    }
}
