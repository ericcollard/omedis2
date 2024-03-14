<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DataType extends Mymodel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'comment',
        'user_id',
        'validation_str',
        'sort'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $user = Auth::user();
            $model->user_id = $user->getAuthIdentifier();
        });
        static::updating(function($model)
        {
            $user = Auth::user();
            $model->user_id = $user->getAuthIdentifier();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return route('datatype.show', $this);
    }

    public function applyLogic()
    {

        // mise en forme nom
        $this->name = Str::of($this->name)->slug('-');
    }
}
