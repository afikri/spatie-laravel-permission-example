## Step to reproduce

For simplicity's sake, laravel/ui interface is used <br/>

To install ui for creating **auth**, do as follow:

-   Type on terminal `composer require laravel/ui`
-   Generate basic scaffolding and login and registration for bootstrap <br/>
    `php artisan ui bootstrap --auth`
-   Run this command to install node dependency and compile CSS and js files:
    `npm install && npm run dev` <br/>
    🛎️ To avoid running npm run dev every time, `npm run build` is used

To install spatie's laravel-permission

-   Run the command `composer require spatie/laravel-permission`
-   Publish the _migration_ and the _config/permission.php_ config file with:
    `php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"`
-   Run `php artisan migrate`
-   Add `use Spatie\Permission\Traits\HasRoles;` inside the User model, followed by
-   Add the necessary trait to the User model:
    `use HasRoles;`<br/>

To implement role permission,

-   modify Kernel file by adding<br/>
    `'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,`<br/>
    `'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,`<br/>
    `'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,`<br/>
    inside `protected $routeMiddleware`

-   Create UserController and RoleController with `php artisan make:controller UserController -r` repeat the same for the Role
-   Create blades for User and Role view i.e index, create, show, edit
-   Add route
    `Route::resource('/users', App\Http\Controllers\UserController::class);`
    `Route::resource('/roles', App\Http\Controllers\RoleController::class);`
-   In navigation bar, add something like

```html
<li class="nav-item dropdown">
    <a
        id="navbarDropdown"
        class="nav-link dropdown-toggle"
        href="#"
        role="button"
        data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
        v-pre
    >
        User & Roles
    </a>

    <div
        class="dropdown-menu dropdown-menu-right"
        aria-labelledby="navbarDropdown"
    >
        @can('show user')
        <a href="{{route('users.index')}}" class="dropdown-item"
            ><i class="bx bx-right-arrow-alt"></i>Users</a
        >
        @endcan @can('show role')
        <a href="{{route('roles.index')}}" class="dropdown-item"
            ><i class="bx bx-right-arrow-alt"></i>Roles</a
        >
        @endcan
    </div>
</li>
``` 
- Done
