<div class="max-w-[1200px] mx-auto my-10 px-4">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-gray-800">Usuarios</h2>
    <a href="#" class="btn btn-warning bg-orange-500 text-gray-800 btn-sm md:btn-md shadow-md">
      + Crear Usuario
    </a>
  </div>

  <div class="overflow-x-auto bg-base-100 rounded-box shadow-xl">
    <table class="table table-zebra">
      <thead class="text-base text-white bg-orange-500">
        <tr>
          <th>Documento</th>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th>Dirección</th>
          <th>Correo</th>
          <th>Nacimiento</th>
          <th>Sexo</th>
          <th>Tipo de Doc.</th>
          <th>Plan</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td><?= $user['userDocument'] ?></td>
            <td><?= $user['fullName'] ?></td>
            <td><?= $user['userPhone'] ?></td>
            <td><?= $user['userAddress'] ?></td>
            <td><?= $user['userEmail'] ?></td>
            <td><?= $user['userBirthdate'] ?></td>
            <td><?= $user['userSex'] ?></td>
            <td><?= $user['documentTypeName'] ?></td>
            <td><?= $user['healthPlanName'] ?? 'N/A' ?></td>
            <td>
              <?php if ($user['userStatus'] === 'Active'): ?>
                <span class="badge badge-success badge-outline">Activo</span>
              <?php else: ?>
                <span class="badge badge-error badge-outline">Inactivo</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>