<?php

use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    //return redirect()->route('login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/grafico1', [App\Http\Controllers\HomeController::class, 'grafico1'])->name('grafico1');


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/grafico1', [App\Http\Controllers\HomeController::class, 'grafico1'])->name('grafico1');
        Route::get('/tela2', [App\Http\Controllers\Tela2Controller::class, 'tela2'])->name('tela2');
        Route::get('/tela3', [App\Http\Controllers\Tela3Controller::class, 'tela3'])->name('tela3');

        
        /**
         * Role x User
         */
        Route::get('users/{id}/role/{idRole}/detach', [App\Http\Controllers\Admin\ACL\RoleUserController::class, 'detachRoleUser'])->name('users.role.detach');
        Route::post('users/{id}/roles', [App\Http\Controllers\Admin\ACL\RoleUserController::class, 'attachRolesUser'])->name('users.roles.attach');
        Route::any('users/{id}/roles/create', [App\Http\Controllers\Admin\ACL\RoleUserController::class, 'rolesAvailable'])->name('users.roles.available');
        Route::get('users/{id}/roles', [App\Http\Controllers\Admin\ACL\RoleUserController::class, 'roles'])->name('users.roles');
        Route::get('roles/{id}/users', [App\Http\Controllers\Admin\ACL\RoleUserController::class, 'users'])->name('roles.users');
        
        /*Route::get('users/{id}/role/{idRole}/detach', 'ACL\RoleUserController@detachRoleUser')->name('users.role.detach');
        Route::post('users/{id}/roles', 'ACL\RoleUserController@attachRolesUser')->name('users.roles.attach');
        Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
        Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');
        Route::get('roles/{id}/users', 'ACL\RoleUserController@users')->name('roles.users');*/


        

        /**
         * Permission x Role
         */
        Route::get('roles/{id}/permission/{idPermission}/detach', [App\Http\Controllers\Admin\ACL\PermissionRoleController::class, 'detachPermissionRole'])->name('roles.permission.detach');
        Route::post('roles/{id}/permissions', [App\Http\Controllers\Admin\ACL\PermissionRoleController::class, 'attachPermissionsRole'])->name('roles.permissions.attach');
        Route::any('roles/{id}/permissions/create', [App\Http\Controllers\Admin\ACL\PermissionRoleController::class, 'permissionsAvailable'])->name('roles.permissions.available');
        Route::get('roles/{id}/permissions', [App\Http\Controllers\Admin\ACL\PermissionRoleController::class, 'permissions'])->name('roles.permissions');
        Route::get('permissions/{id}/role', [App\Http\Controllers\Admin\ACL\PermissionRoleController::class, 'roles'])->name('permissions.roles');

        /**
         * Routes Roles
         */
        Route::any('roles/search', [App\Http\Controllers\Admin\ACL\RoleController::class, 'search'])->name('roles.search');    
        // Route::resource('/supports', SupportController::class);
        Route::get('/roles', [App\Http\Controllers\Admin\ACL\RoleController::class, 'index'] )->name('roles.index');
        Route::delete('/roles/{id}', [App\Http\Controllers\Admin\ACL\RoleController::class, 'destroy'])->name('roles.destroy');
        Route::put('/roles/{id}', [App\Http\Controllers\Admin\ACL\RoleController::class, 'update'])->name('roles.update');
        Route::get('/roles/{id}/edit', [App\Http\Controllers\Admin\ACL\RoleController::class, 'edit'])->name('roles.edit');
        Route::get('/roles/create', [App\Http\Controllers\Admin\ACL\RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [App\Http\Controllers\Admin\ACL\RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/{id}/show', [App\Http\Controllers\Admin\ACL\RoleController::class, 'show'])->name('roles.show');
       

       
        
        /**
         * Routes Tenants
         */
        //Route::any('tenants/search', 'TenantController@search')->name('tenants.search');
        Route::any('tenants/search', [App\Http\Controllers\Admin\TenantController::class, 'search'])->name('tenants.search');
        //Route::resource('tenants', 'TenantController');
        Route::get('/tenants', [App\Http\Controllers\Admin\TenantController::class, 'index'] )->name('tenants.index');
        Route::delete('/tenants/{id}', [App\Http\Controllers\Admin\TenantController::class, 'destroy'])->name('tenants.destroy');
        Route::put('/tenants/{id}', [App\Http\Controllers\Admin\TenantController::class, 'update'])->name('tenants.update');
        Route::get('/tenants/{id}/edit', [App\Http\Controllers\Admin\TenantController::class, 'edit'])->name('tenants.edit');
        Route::get('/tenants/create', [App\Http\Controllers\Admin\TenantController::class, 'create'])->name('tenants.create');
        Route::post('/tenants', [App\Http\Controllers\Admin\TenantController::class, 'store'])->name('tenants.store');
        Route::get('/tenants/{id}/show', [App\Http\Controllers\Admin\TenantController::class, 'show'])->name('tenants.show');
       

        /**
         * Routes Tables
         */
        //Route::get('tables/qrcode/{identify?}', 'TableController@qrcode')->name('tables.qrcode');
        //Route::any('tables/search', 'TableController@search')->name('tables.search');
        //Route::resource('tables', 'TableController');
        Route::get('tables/qrcode/{identify?}', [App\Http\Controllers\Admin\TableController::class ,'qrcode'])->name('tables.qrcode');
        Route::any('tables/search', [App\Http\Controllers\Admin\TableController::class ,'search'])->name('tables.search');
        Route::resource('tables', TableController::class);

        /**
         * Product x Category
         */
        Route::get('products/{id}/category/{idCategory}/detach', 'CategoryProductController@detachCategoryProduct')->name('products.category.detach');
        Route::post('products/{id}/categories', 'CategoryProductController@attachCategoriesProduct')->name('products.categories.attach');
        Route::any('products/{id}/categories/create', 'CategoryProductController@categoriesAvailable')->name('products.categories.available');
        Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
        Route::get('categories/{id}/products', 'CategoryProductController@products')->name('categories.products');
        
        /**
         * Routes Products
         */
        Route::any('products/search', 'ProductController@search')->name('products.search');
        Route::resource('products', 'ProductController');


        /**
         * Routes Categories
         */
        Route::any('categories/search', 'CategoryController@search')->name('categories.search');
        Route::resource('categories', 'CategoryController');


        /**
         * Routes Users
         */
        Route::any('users/search', 'UserController@search')->name('users.search');
        // Route::resource('users', 'UserController');
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'] )->name('users.index');
        Route::delete('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
        Route::put('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
        Route::get('/users/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
        Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/show', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show');

        /**
         * Plan x Profile
         */
        Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profile.detach');
        Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');
        Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
        Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
        Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');

        /**
         * Permission x Profile
         */
        // Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permission.detach');
        // Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
        // Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
        // Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
        // Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');
        Route::get('profiles/{id}/permission/{idPermission}/detach', [App\Http\Controllers\Admin\ACL\PermissionProfileController::class, 'detachPermissionProfile'])->name('profiles.permission.detach');
        Route::post('profiles/{id}/permissions', [App\Http\Controllers\Admin\ACL\PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
        Route::any('profiles/{id}/permissions/create', [App\Http\Controllers\Admin\ACL\PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions', [App\Http\Controllers\Admin\ACL\PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
        Route::get('permissions/{id}/profile', [App\Http\Controllers\Admin\ACL\PermissionProfileController::class, 'profiles'])->name('permissions.profiles');

        /**
         * Routes Permissions
         */
        Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
        //Route::resource('permissions', 'ACL\PermissionController');
        Route::get('/permissions', [App\Http\Controllers\Admin\ACL\PermissionController::class, 'index'] )->name('permissions.index');
        Route::delete('/permissions/{id}', [App\Http\Controllers\Admin\ACL\PermissionController::class, 'destroy'])->name('permissions.destroy');
        Route::put('/permissions/{id}', [App\Http\Controllers\Admin\ACL\PermissionController::class, 'update'])->name('permissions.update');
        Route::get('/permissions/{id}/edit', [App\Http\Controllers\Admin\ACL\PermissionController::class, 'edit'])->name('permissions.edit');
        Route::get('/permissions/create', [App\Http\Controllers\Admin\ACL\PermissionController::class, 'create'])->name('permissions.create');
        Route::post('/permissions', [App\Http\Controllers\Admin\ACL\PermissionController::class, 'store'])->name('permissions.store');
        Route::get('/permissions/{id}/show', [App\Http\Controllers\Admin\ACL\PermissionController::class, 'show'])->name('permissions.show');

        /**
         * Routes Profiles
         */
        Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
        Route::resource('profiles', 'ACL\ProfileController');

        /**
         * Routes Details Plans
         */
        Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
        Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
        Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
        Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
        Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
        Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
        Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');


        /**
         * Routes Plans
         */
        Route::get('plans/create', 'PlanController@create')->name('plans.create');
        Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
        Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
        Route::any('plans/search', 'PlanController@search')->name('plans.search');
        Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
        Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
        Route::post('plans', 'PlanController@store')->name('plans.store');
        Route::get('plans', 'PlanController@index')->name('plans.index');

        /**
         * Home Dashboard
         */
        Route::get('/', 'DashboardController@home')->name('admin.index');
    });
