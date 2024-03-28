<?php

namespace App\Rules;

use App\Imports\ImportHelpers;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class urllist implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // normalisation des sréparateurs
        $value = ImportHelpers::normalizeSeparator2SemiColumn($value);
        $url_array = explode(';',$value);
        $error = '';
        foreach ($url_array as $key => $url)
        {
            $keyStr = '';
            switch ($key) {
                case 0:
                    $keyStr = 'first';
                    break;
                case 1:
                    $keyStr = 'second';
                    break;
                case 2:
                    $keyStr = 'third';
                    break;
                default:
                    $keyStr = ($key+1).'th';
                    break;
            }
            $validationRules = [$keyStr.' part of pictures' => 'url'];
            $data = [$keyStr.' part of pictures' => $url];
            $validator = Validator::make($data, $validationRules)->stopOnFirstFailure(false);
            if ($validator->fails()) {
                $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
                foreach ($fieldsWithErrorMessagesArray as $fieldName => $fieldWithErrorMessagesArray) {
                    foreach ($fieldWithErrorMessagesArray as $fieldWithErrorMessage) {
                        if (strlen($error) > 0)
                            $error.= '|';
                        $error.= $fieldWithErrorMessage;
                    }
                }
            }
        }
        if (strlen($error) > 0)
            $fail($error);
    }
}
