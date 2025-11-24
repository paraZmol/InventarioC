<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// para datos
use App\Models\MovimientoInventario;
use App\Models\Obra;
use App\Models\Producto;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin Constructora',
                'password' => Hash::make('pass'),
            ]
        );

        // para la demo
        $obra1 = Obra::create([
            'nombre' => 'Residencial Los Andes',
            'responsableObra' => 'Ing. Juan Pérez',
            'activo' => true,
        ]);

        $obra2 = Obra::create([
            'nombre' => 'Hospital Central (Ampliación)',
            'responsableObra' => 'Arq. Maria Gomez',
            'activo' => true,
        ]);

        $almacenCentral = Obra::create([
            'nombre' => 'Mantenimiento / Taller',
            'responsableObra' => 'Jefe de Logística',
            'activo' => true,
        ]);

        // --- Materiales ---
        $cemento = Producto::create([
            'nombre' => 'Cemento Sol Tipo I (42.5kg)',
            'tipo' => 'material',
            'codigo' => 'MAT-CEM-001',
            'stock_minimo' => 50,
            'stock_actual' => 0
        ]);

        $ladrillo = Producto::create([
            'nombre' => 'Ladrillo King Kong 18 huecos',
            'tipo' => 'material',
            'codigo' => 'MAT-LAD-002',
            'stock_minimo' => 500,
            'stock_actual' => 0
        ]);

        $pintura = Producto::create([
            'nombre' => 'Pintura Latex Blanca (Balde 20L)',
            'tipo' => 'material',
            'codigo' => 'MAT-PIN-003',
            'stock_minimo' => 10,
            'stock_actual' => 0
        ]);

        // --- Herramientas ---
        $taladro = Producto::create([
            'nombre' => 'Taladro Percutor Bosch GSB 13',
            'tipo' => 'herramienta',
            'codigo' => 'HER-TAL-001',
            'stock_minimo' => 2,
            'stock_actual' => 0
        ]);

        $amoladora = Producto::create([
            'nombre' => 'Amoladora Angular Makita',
            'tipo' => 'herramienta',
            'codigo' => 'HER-AMO-002',
            'stock_minimo' => 2,
            'stock_actual' => 0
        ]);

        // COMPRAS INICIALES (Entradas)
        // Compramos 500 bolsas de cemento
        MovimientoInventario::create([
            'producto_id' => $cemento->id,
            'tipo' => 'entrada',
            'cantidad' => 500,
            'notas' => 'Compra inicial proveedor Sodimac',
            'user_id' => $user->id,
        ]);

        // Compramos 2000 ladrillos
        MovimientoInventario::create([
            'producto_id' => $ladrillo->id,
            'tipo' => 'entrada',
            'cantidad' => 2000,
            'notas' => 'Lote #5542 Ladrillos Pirámide',
            'user_id' => $user->id,
        ]);

        // Compramos 10 Taladros
        MovimientoInventario::create([
            'producto_id' => $taladro->id,
            'tipo' => 'entrada',
            'cantidad' => 10,
            'notas' => 'Renovación de equipos',
            'user_id' => $user->id,
        ]);

        // SALIDAS A OBRAS (Consumo y Prestamo)
        // Enviamos 100 cementos a la Obra 1
        MovimientoInventario::create([
            'producto_id' => $cemento->id,
            'obra_id' => $obra1->id,
            'tipo' => 'salida',
            'cantidad' => 100,
            'notas' => 'Para vaciado de techos primer piso',
            'user_id' => $user->id,
        ]);
        // Stock Cemento esperado: 500 - 100 = 400

        // Prestamos 3 taladros a la Obra 2
        MovimientoInventario::create([
            'producto_id' => $taladro->id,
            'obra_id' => $obra2->id,
            'tipo' => 'salida',
            'cantidad' => 3,
            'asignado_a' => 'Maestro Carlos',
            'notas' => 'Préstamo por 1 semana',
            'user_id' => $user->id,
        ]);
        // Stock Taladro esperado: 10 - 3 = 7

        // DEVOLUCION (Retorno)
        // Devuelven 1 taladro de la Obra 2
        MovimientoInventario::create([
            'producto_id' => $taladro->id,
            'obra_id' => $obra2->id,
            'tipo' => 'devolucion',
            'cantidad' => 1,
            'notas' => 'Devolución anticipada, operativo.',
            'user_id' => $user->id,
        ]);
        // Stock Taladro esperado: 7 + 1 = 8
    }
}