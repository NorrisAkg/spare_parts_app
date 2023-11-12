<?php

namespace App\Core\Categories;

use App\Core\SpareParts\SparePart;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function spareParts(): HasMany {
        return $this->hasMany(SparePart::class);
    }
}
