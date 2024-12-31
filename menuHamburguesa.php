<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Hamburguesa</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
</head>
<body>
<header class="bg-white shadow-sm">
    <div x-data="{ isOpen: false }" class="max-w-[90%] mx-auto">
        <div class="flex justify-between items-center py-4 px-6">
            <!-- Logo y nombre -->
            <div class="flex items-center">
                <a href="inicio" class="text-xl font-semibold text-gray-700">CFI Gestor de compras</a>
            </div>

            <!-- Botón hamburguesa -->
            <button 
                @click="isOpen = !isOpen"
                class="md:hidden inline-flex items-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100"
            >
                <svg x-show="!isOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="isOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Menú desktop -->
            <nav class="hidden md:flex space-x-4">
                <?php
                $menuItems = [
                    ['url' => 'inicio', 'texto' => 'Dashboard', 'submenu' => [
                        ['url' => 'proveedores/listado.php', 'texto' => 'Compulsas activas'],
                        ['url' => 'proveedores/detalles.php', 'texto' => 'Calendario de vencimiento'],
                        ['url' => 'proveedores/detalles.php', 'texto' => 'Notificaciones']
                    ]],
                    ['url' => 'inicio', 'texto' => 'Gestión de compulsas', 'submenu' => [
                        ['url' => 'proveedores/listado.php', 'texto' => 'Nueva compulsa'],
                        ['url' => 'proveedores/detalles.php', 'texto' => 'Mis compulsas'],
                        ['url' => 'proveedores/detalles.php', 'texto' => 'Documentos base']
                    ]],
                    ['url' => 'inicio', 'texto' => 'Consultas y comunicaciones', 'submenu' => [
                        ['url' => 'proveedores/listado.php', 'texto' => 'Bandeja de consultas'],
                        ['url' => 'proveedores/detalles.php', 'texto' => 'Circulares'],
                        ['url' => 'proveedores/detalles.php', 'texto' => 'Notificaciones enviadas']
                    ]],
                    ['url' => 'inicio', 'texto' => 'Evaluación', 'submenu' => [
                        ['url' => 'proveedores/listado.php', 'texto' => 'Ofertas recibidas'],
                        ['url' => 'proveedores/detalles.php', 'texto' => 'Informes técnicos'],
                        ['url' => 'proveedores/detalles.php', 'texto' => 'Adjudicaciones']
                    ]],
                    ['url' => 'proveedores/detalles.php', 'texto' => 'Cerrar sesión']
                ];

                foreach ($menuItems as $item): ?>
                    <div x-data="{ submenuOpen: false }" class="relative">
                        <a 
                            href="<?= $item['url'] ?>"
                            class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium flex items-center"
                            @if(isset($item['submenu'])) 
                                @click.prevent="submenuOpen = !submenuOpen"
                            @endif
                        >
                            <?= $item['texto'] ?>
                            <?php if (isset($item['submenu'])): ?>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            <?php endif; ?>
                        </a>

                        <?php if (isset($item['submenu'])): ?>
                            <div 
                                x-show="submenuOpen" 
                                @click.away="submenuOpen = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95"
                                class="absolute left-0 mt-2 w-48 bg-white shadow-md rounded-md z-10"
                            >
                                <?php foreach ($item['submenu'] as $submenuItem): ?>
                                    <a 
                                        href="<?= $submenuItem['url'] ?>" 
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 text-sm"
                                    >
                                        <?= $submenuItem['texto'] ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </nav>
        </div>

       <!-- Menú móvil -->
<nav x-show="isOpen" class="md:hidden mt-4 space-y-4">
    <?php foreach ($menuItems as $item): ?>
        <div x-data="{ submenuOpen: false }">
            <a 
                href="<?= $item['url'] ?>" 
                class="block text-gray-600 hover:text-gray-900 px-4 py-2 text-sm font-medium flex items-center justify-between"
                @if(isset($item['submenu'])) 
                    @click.prevent="submenuOpen = !submenuOpen"
                @endif
            >
                <?= $item['texto'] ?>
                <?php if (isset($item['submenu'])): ?>
                    <svg 
                        class="w-4 h-4 ml-2 transform" 
                        :class="submenuOpen ? 'rotate-180' : ''" 
                        fill="none" 
                        stroke="currentColor" 
                        stroke-width="2" 
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                    </svg>
                <?php endif; ?>
            </a>
            <?php if (isset($item['submenu'])): ?>
                <div 
                    x-show="submenuOpen" 
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="ml-4 space-y-2"
                >
                    <?php foreach ($item['submenu'] as $submenuItem): ?>
                        <a 
                            href="<?= $submenuItem['url'] ?>" 
                            class="block text-gray-700 hover:text-gray-900 px-4 py-2 text-sm"
                        >
                            <?= $submenuItem['texto'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</nav>

    </div>
</header>

</body>
</html>
