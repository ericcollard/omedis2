<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AttributeListValue extends Mymodel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comment',
        'attribute_list_id',
        'user_id',
        'odoo_name',
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

    public function attributeList(): BelongsTo
    {
        return $this->belongsTo(AttributeList::class);
    }

    public function applyLogic()
    {

        // mise en forme nom
        $this->name = Str::of($this->name)->slug('-');
    }
}
