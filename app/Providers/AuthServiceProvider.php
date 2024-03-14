<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Attribute;
use App\Models\AttributeList;
use App\Models\AttributeListValue;
use App\Models\DataType;
use app\Models\unit;
use App\Policies\AttributeListPolicy;
use App\Policies\AttributeListValuePolicy;
use App\Policies\AttributePolicy;
use App\Policies\DataTypePolicy;
use App\Policies\UnitPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Attribute::class => AttributePolicy::class,
        AttributeList::class => AttributeListPolicy::class,
        AttributeListValue::class => AttributeListValuePolicy::class,
        Unit::class => UnitPolicy::class,
        DataType::class => DataTypePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
