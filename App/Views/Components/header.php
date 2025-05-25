<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="sticky top-5 z-50 w-full">
    <nav class="max-w-[1200px] mx-auto flex items-center justify-between bg-white/80 backdrop-blur-md border border-gray-200 rounded-xl shadow-md py-3 px-4 transition-all duration-300 ease-in-out">
        <div class="flex items-center gap-4">
            <div class="dropdown lg:hidden">
                <button tabindex="0" class="btn btn-ghost p-2">
                    <i class="fa-solid fa-bars text-xl text-gray-700"></i>
                </button>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[60] w-52 p-3 bg-white/90 backdrop-blur-md rounded-xl shadow-2xl">
                    <li><a class="hover:text-orange-500">Inicio</a></li>
                    <li>
                        <a class="hover:text-orange-500">Servicios</a>
                        <ul class="p-2">
                            <li><a class="hover:text-orange-500">Citas Médicas</a></li>
                            <li><a class="hover:text-orange-500">Planes de Salud</a></li>
                        </ul>
                    </li>
                    <li><a class="hover:text-orange-500">Contacto</a></li>
                </ul>
            </div>
            <a href="<?= BASE_URL ?>" class="text-2xl font-extrabold text-gray-800 hover:text-orange-500 transition">
                Health Connection
            </a>
        </div>

        <?php if (isset($_SESSION['user'])): ?>
            <div class="hidden lg:flex">
                <ul class="menu menu-horizontal gap-6 text-[16px] font-medium">
                    <li><a class="text-gray-700 hover:text-orange-500" href="<?= BASE_URL ?>">Inicio</a></li>

                    <?php if ($_SESSION['user']['role'] === 'Admin'): ?>
                        <li><a class="text-gray-700 hover:text-orange-500" href="<?= BASE_URL ?>/Admin/users">Usuarios</a></li>
                        <li><a class="text-gray-700 hover:text-orange-500" href="#">Citas</a></li>
                        <li><a class="text-gray-700 hover:text-orange-500" href="#">Doctores</a></li>
                    <?php elseif ($_SESSION['user']['role'] === 'Patient'): ?>
                        <li>
                            <details>
                                <summary class="text-gray-700 hover:text-orange-500">Servicios</summary>
                                <ul class="w-[160px] p-2 bg-white/90 rounded-xl shadow-md">
                                    <li><a class="hover:text-orange-500 text-center">Citas Médicas</a></li>
                                    <li><a class="hover:text-orange-500 text-center">Planes de Salud</a></li>
                                </ul>
                            </details>
                        </li>
                        <li><a class="text-gray-700 hover:text-orange-500">Contacto</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="flex items-center gap-3">
            <?php if (isset($_SESSION['user'])): ?>
                <a href="#"
                    class="flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-5 py-2 rounded-md shadow transition">
                    <i class="fa-solid fa-user text-sm"></i> Mi perfil
                </a>
                <a href="<?= BASE_URL ?>/Login/logout"
                    class="flex items-center gap-2 border border-black text-gray-800 hover:bg-orange-500 hover:text-white font-semibold px-5 py-2 rounded-md shadow transition">
                    <i class="fa-solid fa-right-from-bracket text-sm"></i> Cerrar Sesión
                </a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>/Login/showLogin"
                    class="flex min-w-[115px] items-center gap-2 border border-black bg-orange-500 hover:bg-orange-600 text-white font-semibold px-5 py-2 rounded-md shadow transition">
                    <i class="fa-solid fa-user text-sm"></i> Iniciar Sesión
                </a>
                <a href="<?= BASE_URL ?>/Register/showRegister"
                    class="flex min-w-[115px] items-center gap-2 border border-black text-gray-800 hover:bg-orange-500 hover:text-white font-semibold px-5 py-2 rounded-md shadow transition">
                    <i class="fa-solid fa-user-plus text-sm"></i> Registrarme
                </a>
            <?php endif; ?>
        </div>
    </nav>
</header>