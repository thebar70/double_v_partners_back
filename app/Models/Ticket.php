<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    protected $table = 'tickets';
    protected $fillable = [
        'description',
        'status',
        'user_uuid'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function ticketComments(): HasMany
    {
        return $this->hasMany(TicketComment::class, );
    }
}
