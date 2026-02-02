<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class VehicleShape extends Model
{
    use HasFactory;

    protected $table = 'vehicles_shapes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * MANY-TO-ONE
     * Several vehicles for a vehicles_shape
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'shape_id');
    }
}
