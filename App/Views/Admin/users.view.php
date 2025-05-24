<div class="max-w-[1200px] mx-auto mt-[50px] mb-[40px] px-4">
  <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <div class="flex gap-5">
      <h2 class="text-3xl font-bold text-gray-800">Usuarios</h2>
      <button class="btn btn-warning bg-orange-500 text-white hover:bg-orange-600" onclick="my_modal_1.showModal()"><i
          class="fa-solid fa-plus"></i>Crear usuario</button>
      <dialog id="my_modal_1" class="modal">
        <div class="modal-box">
          <h3 class="text-lg font-bold mb-4">Registrar nuevo usuario</h3>
          <form method="post" action="<?= BASE_URL ?>/Admin/createUser">
            <div class="mb-4">
              <label for="typeDocument" class="block text-sm font-medium text-orange-500 mb-1">
                <i class="fas fa-id-card mr-2"></i>Tipo de Documento
              </label>
              <select id="typeDocument" name="typeDocument"
                class="select select-warning w-full border-orange-500 rounded-md focus:ring-2 focus:ring-orange-300 transition-all">
                <option value="" selected disabled>Selecciona tipo de documento</option>
                <option value="1">Cédula de Ciudadanía</option>
                <option value="2">Cédula de Extranjería</option>
                <option value="3">Tarjeta de Identidad</option>
                <option value="4">Pasaporte</option>
              </select>
            </div>
            <div class="mb-4">
              <label for="numberDocument" class="block text-sm font-medium text-orange-500 mb-1">
                <i class="fas fa-hashtag mr-2"></i>Número de Documento
              </label>
              <input id="numberDocument" name="numberDocument" type="text"
                class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
                placeholder="Número de Documento" />
            </div>
            <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-orange-500 mb-1">
                <i class="fas fa-envelope mr-2"></i>Correo Electrónico
              </label>
              <input id="email" name="email" type="email"
                class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
                placeholder="Correo electrónico" />
            </div>
            <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-orange-500 mb-1">
                <i class="fas fa-user mr-2"></i>Nombres
              </label>
              <input id="name" name="name" type="text"
                class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
                placeholder="Nombres" />
            </div>
            <div class="mb-4">
              <label for="lastname" class="block text-sm font-medium text-orange-500 mb-1">
                <i class="fas fa-user-tag mr-2"></i>Apellidos
              </label>
              <input id="lastname" name="lastname" type="text"
                class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
                placeholder="Apellidos" />
            </div>
            <div class="mb-4">
              <label for="password" class="block text-sm font-medium text-orange-500 mb-1">
                <i class="fas fa-lock mr-2"></i>Contraseña
              </label>
              <input id="password" name="password" type="password"
                class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
                placeholder="Contraseña" />
            </div>
            <button type="submit"
              class="btn w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
              <i class="fas fa-user-plus mr-2"></i>Registrarme
            </button>
          </form>
        </div>
      </dialog>
    </div>
    <form method="GET" class="flex flex-wrap items-center gap-3">
      <select name="status" class="select select-sm border-gray-300 rounded-md">
        <option value="">Estado</option>
        <option value="activo" <?= $statusFilter === 'activo' ? 'selected' : '' ?>>Activo</option>
        <option value="inactivo" <?= $statusFilter === 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
      </select>
      <input type="text" name="plan" placeholder="Plan" value="<?= htmlspecialchars($planFilter) ?>"
        class="input input-sm border-gray-300 rounded-md" />
      <div class="flex items-center border border-gray-300 rounded-md px-2 bg-white">
        <i class="fa-solid fa-magnifying-glass text-gray-500 mr-2"></i>
        <input type="search" name="search" placeholder="Buscar" value="<?= htmlspecialchars($search) ?>"
          class="input input-sm border-none outline-none" />
      </div>

      <button type="submit" class="btn btn-sm bg-orange-500 text-white hover:bg-orange-600 rounded-md font-semibold">
        <i class="fas fa-filter mr-1"></i> Filtrar
      </button>

      <a href="<?= BASE_URL ?>/Admin/users"
        class="btn btn-sm bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-md font-semibold">
        <i class="fas fa-times mr-1"></i> Limpiar
      </a>
    </form>
  </div>

  <div class="overflow-x-auto bg-white rounded-2xl shadow-xl">
    <table class="min-w-full table-auto text-sm">
      <thead class="bg-orange-500 text-white text-left">
        <tr>
          <th class="p-4 text-center">Documento</th>
          <th class="p-4 text-center">Nombre</th>
          <th class="p-4 text-center">Teléfono</th>
          <th class="p-4 text-center">Dirección</th>
          <th class="p-4 text-center">Correo</th>
          <th class="p-4 text-center">Nacimiento</th>
          <th class="p-4 text-center">Sexo</th>
          <th class="p-4 text-center">Tipo de Doc.</th>
          <th class="p-4 text-center">Plan</th>
          <th class="p-4 text-center">Estado</th>
          <th class="p-4 text-center">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 text-gray-700 text-center">
        <?php foreach ($users as $user): ?>
          <tr class="hover:bg-orange-50 transition">
            <td class="p-4"><?= htmlspecialchars($user['userDocument']) ?></td>
            <td class="p-4"><?= htmlspecialchars($user['fullName']) ?></td>
            <td class="p-4"><?= htmlspecialchars($user['userPhone']) ?></td>
            <td class="p-4"><?= htmlspecialchars($user['userAddress']) ?></td>
            <td class="p-4"><?= htmlspecialchars($user['userEmail']) ?></td>
            <td class="p-4"><?= htmlspecialchars($user['userBirthdate']) ?></td>
            <td class="p-4"><?= htmlspecialchars($user['userSex']) ?></td>
            <td class="p-4"><?= htmlspecialchars($user['documentTypeName']) ?></td>
            <td class="p-4"><?= htmlspecialchars($user['healthPlanName'] ?? 'N/A') ?></td>
            <td class="p-4">
              <?php if ($user['userStatus'] === 'Active'): ?>
                <span class="inline-flex items-center gap-1 text-green-600 font-medium">
                  <i class="fas fa-circle text-xs"></i> Activo
                </span>
              <?php else: ?>
                <span class="inline-flex items-center gap-1 text-red-500 font-medium">
                  <i class="fas fa-circle text-xs"></i> Inactivo
                </span>
              <?php endif; ?>
            </td>
            <td class="p-4">
              <div class="flex justify-center items-center gap-3">
                <a href="#" class="text-blue-600 hover:text-blue-800" title="Editar">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="text-red-500 hover:text-red-700" title="Eliminar">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php
session_start();
?>
<?php if (isset($_SESSION['error'])): ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: '<?= $_SESSION['error'] ?>',
      confirmButtonColor: '#f97316'
    })
  </script>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Exito',
      text: '<?= $_SESSION['success'] ?>',
      confirmButtonColor: '#f97316'
    })
  </script>
  <?php unset($_SESSION['success']); ?>
<?php endif; ?>