<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OdooModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'comment',
        'model',
        'mode',
        'field',
        'mandatory',
        'type',
        'search_field',
        'dest_model',
    ];

    public function to_array()
    {
        return [
            'name' => $this->name,
            'dest_model' => $this->dest_model,
            'mode' => $this->mode,
            'field' => $this->field,
            'mandatory' => $this->mandatory,
            'type' => $this->type,
            'model' => $this->model,
            'search_field' => $this->search_field,
        ];
    }

    public static function all_to_array()
    {
        $models = OdooModel::all();
        $odoomodels_data = [];

        $odoomodels_cnt = 0;
        foreach ($models as $model)
        {
            $odoomodels_cnt++;
            $odoomodels_data[$odoomodels_cnt] = $model->to_array();
        }
        return $odoomodels_data;
    }

    public function format_value($input_value)
    {
        if (is_null($input_value))
            return '-99999';
        switch ($this->type) {
            case "string":
                return $input_value;
            case "float":
                return number_format($input_value, 2, '.', '');
            case "image":
                return $input_value;
        }
        return $input_value;
    }

}
