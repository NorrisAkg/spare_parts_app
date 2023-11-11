<?php

namespace App\Core\Pictures;

use App\Core\SpareParts\SparePart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Picture extends Model
{
    protected $table = "pictures";

    protected $fillable = [] ;

    public function sparePart(): BelongsTo
    {
        return $this->belongsTo(SparePart::class);
    }
}
