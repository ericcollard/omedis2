<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Mymodel extends Model
{

    public function light_dump_new() {
        $nv = "";
        foreach ($this->fillable as $field)
        {
            if ($field!="user_id")
            {
                if (strlen($nv)>0) $nv = $nv.",";
                $nv = $nv.$field.": '".$this->getAttribute($field)."'";
            }
        }
        return $nv;
    }

    public function light_dump_old() {
        $nv = "";
        foreach ($this->fillable as $field)
        {
            if ($field!="user_id")
            {
                if (strlen($nv)>0) $nv = $nv.",";
                $nv = $nv.$field.": '".$this->getRawOriginal($field)."'";
            }
        }
        return $nv;
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $user = Auth::user();
            $model->user_id = $user->getAuthIdentifier();
            $data = [
                'model' => class_basename($model),
                'action' => 'CREATE',
                'user_id' => $user->getAuthIdentifier(),
                'old_values' => 'none',
                'new_values' => $model->light_dump_new(),
            ];
            $history = History::create($data);
        });
        static::updating(function($model)
        {
            $user = Auth::user();
            $model->user_id = $user->getAuthIdentifier();
            $data = [
                'model' => class_basename($model),
                'action' => 'UPDATE',
                'user_id' => $user->getAuthIdentifier(),
                'old_values' => $model->light_dump_old(),
                'new_values' => $model->light_dump_new(),
            ];
            $history = History::create($data);
        });

        static::deleting(function($model)
        {
            $user = Auth::user();
            $model->user_id = $user->getAuthIdentifier();
            $data = [
                'model' => class_basename($model),
                'action' => 'DELETE',
                'user_id' => $user->getAuthIdentifier(),
                'old_values' => $model->light_dump_old(),
                'new_values' => 'none',
            ];
            $history = History::create($data);
        });
    }


}
