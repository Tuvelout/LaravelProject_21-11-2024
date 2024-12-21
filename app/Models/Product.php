<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// adicionado  v
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class,'category_id', 'id');
    }

}
