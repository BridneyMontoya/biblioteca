<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            @php
                $totalAtenciones = \App\Models\Atencion::count();
                $prestamosActivos = \App\Models\Atencion::where('tipo_atencion', 'prestamo')->where('estado', 'activa')->count();
                $consultasMes = \App\Models\Atencion::where('tipo_atencion', 'consulta')
                    ->whereMonth('fecha_atencion', now()->month)
                    ->whereYear('fecha_atencion', now()->year)
                    ->count();
            @endphp

            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Atenciones</p>
                <p class="mt-1 text-3xl font-bold text-gray-900 dark:text-white">{{ $totalAtenciones }}</p>
            </div>
            <div class="rounded-xl border border-amber-200 bg-amber-50 p-5 shadow-sm dark:border-amber-700 dark:bg-amber-900/20">
                <p class="text-sm font-medium text-amber-600 dark:text-amber-400">Préstamos Activos</p>
                <p class="mt-1 text-3xl font-bold text-amber-700 dark:text-amber-300">{{ $prestamosActivos }}</p>
            </div>
            <div class="rounded-xl border border-blue-200 bg-blue-50 p-5 shadow-sm dark:border-blue-700 dark:bg-blue-900/20">
                <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Consultas este Mes</p>
                <p class="mt-1 text-3xl font-bold text-blue-700 dark:text-blue-300">{{ $consultasMes }}</p>
            </div>
        </div>

        {{-- Table --}}
        {{ $this->table }}
    </div>
</x-filament-panels::page>
