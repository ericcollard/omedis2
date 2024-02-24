<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'action',
        'user_id',
        'old_values',
        'new_values',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function getLastVersion()
    {
        $history = DB::table('histories')->where('action', '=', 'VERSION')->orderby('created_at', 'desc')->first();
        if ($history)
            return $history->new_values;

        return '0.0';
    }

}
