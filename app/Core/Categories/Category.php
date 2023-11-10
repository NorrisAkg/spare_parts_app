<?php

namespace App\Core\Categories;

use App\Core\SpareParts\SparePart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model {
    protected $fillable = [
        'name',
        'description',
    ];

    public function spareParts(): HasMany {
        return $this->hasMany(SparePart::class);
    }
}
