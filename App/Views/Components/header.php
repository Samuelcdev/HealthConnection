<nav class="sticky top-5 z-50 max-w-[1200px] mx-auto mb-5 py-3 px-4 flex items-center justify-between bg-white/80 backdrop-blur-md border border-gray-200 rounded-xl shadow-md transition-all duration-300 ease-in-out">
    <div class="flex items-center">
        <div class="dropdown">
            <button tabindex="0" class="btn btn-ghost p-2 lg:hidden">
                <i class="fa-solid fa-bars text-xl text-gray-700"></i>
            </button>
            <ul tabindex="0"
                class="menu menu-sm dropdown-content mt-3 w-52 p-3 bg-white/90 backdrop-blur-md rounded-xl shadow-2xl z-50">
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
        <a href="#" class="text-2xl font-extrabold text-gray-800 hover:text-orange-500 transition-all duration-300">
            Health Connection
        </a>
    </div>
    <div class="hidden lg:flex">
        <ul class="menu menu-horizontal gap-5 text-[16px] font-medium">
            <li><a class="text-gray-700 hover:text-orange-500">Inicio</a></li>
            <li>
                <details>
                    <summary class="text-gray-700 hover:text-orange-500">Servicios</summary>
                    <ul class="w-[160px] p-2 bg-white/90 rounded-xl shadow-md">
                        <li><a class="hover:text-orange-500 text-center">Citas Médicas</a></li>
                        <li><a class="hover:text-orange-500">Planes de Salud</a></li>
                    </ul>
                </details>
            </li>
            <li><a class="text-gray-700 hover:text-orange-500">Contacto</a></li>
        </ul>
    </div>

    <div class="flex items-center gap-3">
        <a href="#"
            class="flex items-center gap-2 border border-black bg-orange-500 text-white font-semibold px-5 py-2 rounded-md shadow transition-all">
            <i class="fa-solid fa-user text-sm"></i> Iniciar Sesión
        </a>
        <a href="Register/showRegister"
            class="flex items-center gap-2 border border-black text-gray-800 hover:bg-orange-500 hover:text-white font-semibold px-5 py-2 rounded-md shadow transition-all">
            <i class="fa-solid fa-user-plus text-sm"></i> Registrarme
        </a>
    </div>
</nav>