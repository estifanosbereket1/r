<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room';
    public function scopeFilter($query, array $filters)
    {
        if ($filters['price'] ?? false) {
            $query->where('pricePerNight', '<=', $filters['price']);
        }

        if ($filters['amenities'] ?? false) {
            foreach ($filters['amenities'] as $amenity) {
                $query->where('amenities', 'like', '%' . $amenity . '%');
            }
        }

       

        if ($filters['capacity'] ?? false) {
            $query->where('capacity', '>=', $filters['capacity']);
        }


        if ($filters['search'] ?? false) {
            $query->where(function ($query) use ($filters) {
                $query->where('title', 'like', '%' . $filters['search'] . '%')->orWhere('description', 'like', '%' . $filters['search'] . '%');
            });
        }
    }

    public function reservations()
    {
        return $this->hasMany(Reservations::class);
    }
      public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
