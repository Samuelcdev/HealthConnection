<?php
  $title = 'Usuarios';
?>

<div class="box-content max-w-[1200px] mx-auto mt-[50px] mb-[40px]">
  <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <div class="flex flex-wrap gap-5 items-center">
      <h2 class="text-3xl font-bold text-gray-800">Usuarios</h2>
      <button class="btn bg-orange-500 text-white hover:bg-orange-600" onclick="my_modal_1.showModal()">
        <i class="fa-solid fa-plus mr-2"></i>Crear usuario
      </button>
    </div>
    <!-- Filtros -->
    <form method="GET" class="flex flex-col gap-2 w-full md:w-auto max-w-[500px]">
      <div class="flex flex-wrap gap-5">
        <select name="status" class="select select-sm border-gray-300 rounded-md w-[190px]">
          <option value="">Estado</option>
          <option value="activo" <?= $statusFilter === 'activo' ? 'selected' : '' ?>>Activo</option>
          <option value="inactivo" <?= $statusFilter === 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
        </select>
        <input type="text" name="plan" placeholder="Plan" value="<?= htmlspecialchars($planFilter) ?>"
          class="input input-sm border-gray-300 rounded-md w-[190px]" />
      </div>
      <div class="flex flex-wrap gap-2">
        <div class="flex items-center border border-gray-300 rounded-md px-2 bg-white w-full md:w-auto">
          <i class="fa-solid fa-magnifying-glass text-gray-500 mr-2"></i>
          <input type="search" name="search" placeholder="Buscar" value="<?= htmlspecialchars($search) ?>"
            class="input input-sm border-none outline-none w-full md:w-[180px]" />
        </div>
        <button type="submit" class="btn btn-sm bg-orange-500 text-white hover:bg-orange-600 rounded-md font-semibold">
          <i class="fas fa-filter mr-1"></i> Filtrar
        </button>
        <a href="<?= BASE_URL ?>/Admin/users"
          class="btn btn-sm bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-md font-semibold">
          <i class="fas fa-times mr-1"></i> Limpiar
        </a>
      </div>
    </form>
  </div>
  <!-- Tabla -->
  <div class="overflow-x-auto bg-white rounded-xl shadow-xl">
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
                <button class="btn btn-sm text-blue-600 hover:text-blue-800" title="Editar"
                  onclick="my_modal_2.showModal()">
                  <i class="fa-solid fa-edit"></i>
                </button>
                <button class="btn btn-sm text-red-500 hover:text-red-700" title="Eliminar">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<dialog id="my_modal_1" class="modal">
  <div class="modal-box w-full max-w-3xl">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-2xl font-bold text-orange-500">
        <i class="fas fa-user-plus mr-2"></i>Registrar nuevo usuario
      </h3>
      <form method="dialog">
        <button class="btn btn-sm btn-circle text-gray-500 hover:text-orange-500">
          <i class="fas fa-times"></i>
        </button>
      </form>
    </div>
    <form method="post" action="<?= BASE_URL ?>/Admin/createUser" class="space-y-5">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
          <label for="typeDocument" class="block text-sm font-semibold text-gray-700 mb-1">
            <i class="fas fa-id-card mr-2 text-orange-500"></i>Tipo de Documento
          </label>
          <select id="typeDocument" name="typeDocument"
            class="select select-warning w-full border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-300">
            <option value="" selected disabled>Selecciona tipo de documento</option>
            <option value="1">Cédula de Ciudadanía</option>
            <option value="2">Cédula de Extranjería</option>
            <option value="3">Tarjeta de Identidad</option>
            <option value="4">Pasaporte</option>
          </select>
        </div>
        <div>
          <label for="numberDocument" class="block text-sm font-semibold text-gray-700 mb-1">
            <i class="fas fa-hashtag mr-2 text-orange-500"></i>Número de Documento
          </label>
          <input id="numberDocument" name="numberDocument" type="text"
            class="input input-warning w-full border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-300"
            placeholder="Número de Documento" />
        </div>
        <div>
          <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">
            <i class="fas fa-user mr-2 text-orange-500"></i>Nombres
          </label>
          <input id="name" name="name" type="text"
            class="input input-warning w-full border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-300"
            placeholder="Nombres" />
        </div>
        <div>
          <label for="lastname" class="block text-sm font-semibold text-gray-700 mb-1">
            <i class="fas fa-user-tag mr-2 text-orange-500"></i>Apellidos
          </label>
          <input id="lastname" name="lastname" type="text"
            class="input input-warning w-full border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-300"
            placeholder="Apellidos" />
        </div>
        <div>
          <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">
            <i class="fas fa-envelope mr-2 text-orange-500"></i>Correo Electrónico
          </label>
          <input id="email" name="email" type="email"
            class="input input-warning w-full border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-300"
            placeholder="Correo electrónico" />
        </div>
        <div>
          <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">
            <i class="fas fa-lock mr-2 text-orange-500"></i>Contraseña
          </label>
          <input id="password" name="password" type="password"
            class="input input-warning w-full border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-300"
            placeholder="Contraseña" />
        </div>
      </div>
      <div>
        <button type="submit"
          class="btn w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg shadow-md text-lg font-semibold transition duration-200 transform hover:scale-105">
          <i class="fas fa-check-circle mr-2"></i>Crear usuario
        </button>
      </div>
    </form>
  </div>
</dialog>
<!-- Notificaciones con SweetAlert -->
<?php
session_start();
?>
<?php if (isset($_SESSION['error'])): ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: '¡Algo salió mal!',
      html: '<strong><?= $_SESSION['error'] ?></strong>',
      customClass: {
        popup: 'rounded-xl shadow-lg border border-red-200',
        title: 'text-red-600 font-bold text-xl',
        htmlContainer: 'text-gray-700 text-base',
        confirmButton: 'bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg focus:outline-none'
      },
      buttonsStyling: false,
      confirmButtonText: 'Entendido',
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
      }
    });
  </script>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: '¡Operación exitosa!',
      html: '<strong><?= $_SESSION['success'] ?></strong>',
      customClass: {
        popup: 'rounded-xl shadow-lg border border-green-200',
        title: 'text-green-600 font-bold text-xl',
        htmlContainer: 'text-gray-700 text-base',
        confirmButton: 'bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg focus:outline-none'
      },
      buttonsStyling: false,
      confirmButtonText: 'Perfecto',
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
      }
    });
  </script>
  <?php unset($_SESSION['success']); ?>
<?php endif; ?>