<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        echo "Creando usuarios...\n";
        
        // 1. Crear administrador principal
        User::create([
            'name' => 'Administrador Principal',
            'email' => 'admin@tienda.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
            'phone' => '+51 987 654 321',
            'role' => 'admin',
            'address' => 'Av. Principal 123, Lima, Perú',
        ]);

        echo "✓ Administrador creado: admin@tienda.com (contraseña: admin123)\n";

        // 2. Crear algunos administradores adicionales (5 más)
        User::factory()->count(5)->state([
            'role' => 'admin',
        ])->create();

        echo "✓ 5 administradores adicionales creados\n";

        // 3. Crear 40 usuarios clientes
        User::factory()->count(40)->create();

        echo "✓ 40 usuarios clientes creados\n";

        // 4. Crear algunos usuarios sin verificar email
        User::factory()->count(3)->unverified()->create();

        echo "✓ 3 usuarios sin verificar email creados\n";

        echo "✅ Total de usuarios creados: " . User::count() . "\n";
        echo "📊 Distribución por rol:\n";
        echo "   - Administradores: " . User::where('role', 'admin')->count() . "\n";
        echo "   - Clientes: " . User::where('role', 'customer')->count() . "\n";
    }
}