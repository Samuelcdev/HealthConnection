<div class="max-w-[1200px] mx-auto mt-[50px] mb-[40px] px-4">
  <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <div class="flex gap-5">
      <h2 class="text-3xl font-bold text-gray-800">Usuarios</h2>
      <a href="#" class="btn btn-warning bg-orange-500 text-white btn-sm md:btn-md shadow-md">
        + Crear Usuario
      </a>
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