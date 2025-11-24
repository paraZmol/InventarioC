<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventario Constructora | Sistema de Gestión</title>
    <!-- fuente inter (estandar moderno) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <!-- tailwind CSS (via CDN para no compilar) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased bg-gray-900 text-white min-h-screen flex flex-col relative overflow-hidden">

    <!-- decoracion de fondo -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-yellow-500/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-600/20 rounded-full blur-[120px]"></div>
    </div>

    <!-- contenido principal -->
    <div class="relative z-10 flex flex-col items-center justify-center flex-grow px-4 text-center">

        <!-- version del sistema -->
        <div class="mb-6 inline-flex items-center px-3 py-1 rounded-full border border-gray-700 bg-gray-800/50 backdrop-blur-sm">
            <span class="flex h-2 w-2 rounded-full bg-green-500 mr-2"></span>
            <span class="text-xs font-medium text-gray-300 uppercase tracking-wide">Sistema Operativo v1.0</span>
        </div>

        <!-- titulo -->
        <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-4 text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-400">
            Control de Inventario
        </h1>
        <p class="text-xl md:text-2xl text-gray-400 font-light max-w-2xl mx-auto mb-10">
            Gestión inteligente de materiales y herramientas para proyectos de construcción civil.
        </p>

        <!-- tarjetas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl w-full mb-12">
            <!-- card 1 -->
            <div class="p-6 rounded-2xl bg-gray-800/40 border border-gray-700 hover:border-yellow-500/50 transition duration-300 backdrop-blur-sm">
                <div class="w-12 h-12 bg-yellow-500/10 rounded-lg flex items-center justify-center mb-4 mx-auto text-yellow-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Stock Automático</h3>
                <p class="text-sm text-gray-400">Cálculo en tiempo real basado en entradas y salidas. Sin errores manuales.</p>
            </div>

            <!-- card 2 -->
            <div class="p-6 rounded-2xl bg-gray-800/40 border border-gray-700 hover:border-blue-500/50 transition duration-300 backdrop-blur-sm">
                <div class="w-12 h-12 bg-blue-500/10 rounded-lg flex items-center justify-center mb-4 mx-auto text-blue-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Kardex Digital</h3>
                <p class="text-sm text-gray-400">Historial completo de movimientos. Rastrea quién tiene cada herramienta.</p>
            </div>

            <!-- card 3 -->
            <div class="p-6 rounded-2xl bg-gray-800/40 border border-gray-700 hover:border-green-500/50 transition duration-300 backdrop-blur-sm">
                <div class="w-12 h-12 bg-green-500/10 rounded-lg flex items-center justify-center mb-4 mx-auto text-green-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Reportes PDF</h3>
                <p class="text-sm text-gray-400">Generación instantánea de reportes valorizados para auditorías de obra.</p>
            </div>
        </div>

        <!-- Boton accion -->
        <a href="/admin" class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-yellow-600 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-600 hover:bg-yellow-500">
            <div class="absolute -inset-3 rounded-xl bg-yellow-400/30 opacity-0 group-hover:opacity-100 transition duration-200 blur-lg"></div>
            <span class="relative flex items-center">
                Ingresar al Sistema
                <svg class="w-5 h-5 ml-2 -mr-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
            </span>
        </a>

        <!-- credenciales demo -->
        <div class="mt-8 text-sm text-gray-500">
            <p>Credenciales Demo: <span class="text-gray-300 font-mono">USUARIO: admin@admin.com</span> / <span class="text-gray-300 font-mono">PASSWORD: pass</span></p>
        </div>

    </div>

    <!-- footer tec -->
    <footer class="relative z-10 py-6 border-t border-gray-800/50 bg-gray-900/50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} Constructora Demo MVP. Todos los derechos reservados.</p>
            <div class="flex items-center space-x-4 mt-4 md:mt-0">
                <span class="flex items-center hover:text-white transition"><span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span> Laravel 12</span>
                <span class="flex items-center hover:text-white transition"><span class="w-2 h-2 bg-yellow-500 rounded-full mr-1.5"></span> Filament v4</span>
                <span class="flex items-center hover:text-white transition"><span class="w-2 h-2 bg-blue-500 rounded-full mr-1.5"></span> MySQL</span>
            </div>
        </div>
    </footer>

</body>
</html>
