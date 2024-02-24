<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AttributeList extends Mymodel
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'comment',
        'user_id',
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

    public function attributeListValues(): HasMany
    {
        return $this->hasMany(AttributeListValue::class);
    }

    public function getValuesCount()
    {
        return $this->attributeListValues()->get()->count();
    }

    public function getValuesSample()
    {
        $str = "";
        $first_values = $this->attributeListValues()->take(2)->get();
        foreach($first_values as $value) {
            //dd($value->name);
            if (strlen($str) > 0) $str.=", ";
            $str.= $value->name;

        }
        return $str." ...";
    }

    public function applyLogic()
    {

        // mise en forme nom
        $this->name = Str::of($this->name)->slug('-');
    }

}
