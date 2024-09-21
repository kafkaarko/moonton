<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
        ];
    }

    public static function middleware(): array
    {
        return [
            // Middleware dengan alias, menggunakan Spatie Permission
            'role_or_permission:manager|edit articles', // Menggunakan role atau permission
            
            // Gunakan middleware role dengan alias, hanya untuk metode 'index'
            'role:author' => ['only' => ['index']],
            
            // Gunakan RoleMiddleware Spatie untuk role 'manager', kecuali untuk metode 'show'
            \Spatie\Permission\Middleware\RoleMiddleware::class => ['except' => ['show']],
            
            // Gunakan PermissionMiddleware Spatie, hanya untuk metode 'destroy'
            \Spatie\Permission\Middleware\PermissionMiddleware::class => ['only' => ['destroy']],
            
            // Daftarkan alias 'role' untuk RoleMiddleware
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
        ];
    }
    
}
