<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use App\Policies\CategoryPolicy;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Role::class       => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
        Category::class => CategoryPolicy::class,
        CustomPage::class => CustomPagePolicy::class,
        SettingsPage::class => SettingsPagePolicy::class




        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
