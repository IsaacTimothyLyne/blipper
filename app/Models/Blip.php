<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Database\Factories\BlipFactory;


#[Fillable(['user_id', 'message'])]
class Blip extends Model
{
    /** @use HasFactory<\Database\Factories\BlipFactory> */
    use HasFactory;

    protected $table = 'chirps';

    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'message' => 'string',
            'created_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
