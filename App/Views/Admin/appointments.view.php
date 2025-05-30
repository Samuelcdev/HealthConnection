<?php
$title = 'Citas Medicas';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="box-content min-w-[1200px] w-full mx-auto mt-[50px] mb-[40px]">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div class="flex flex-wrap gap-5 items-center">
            <h2 class="text-3xl font-bold text-gray-800">Citas Medicas</h2>
            <button class="btn bg-orange-500 text-white hover:bg-orange-600" onclick="my_modal_1.showModal()">
                <i class="fa-solid fa-plus mr-2"></i>Crear Cita
            </button>
        </div>
        <form method="GET" class="flex flex-col gap-2 w-full md:w-auto max-w-[500px]">
            <div class="flex flex-wrap gap-5">
                <select name="statusAppointment" class="select select-sm border-gray-300 rounded-md w-[190px]">
                    <option value="">Estado</option>
                    <option value="activo" <?= $statusFilter === 'activo' ? 'selected' : '' ?>>Activo</option>
                    <option value="inactivo" <?= $statusFilter === 'inactivo' ? 'selected' : '' ?>>Inactivo</option>
                </select>
                <input type="date" name="dateAppointment" placeholder="Fecha"
                    value="<?= htmlspecialchars($dateFilter) ?>"
                    class="input input-sm border-gray-300 rounded-md w-[190px]" />
            </div>
            <div class="flex flex-wrap gap-2">
                <div class="flex items-center border border-gray-300 rounded-md px-2 bg-white w-full md:w-auto">
                    <i class="fa-solid fa-magnifying-glass text-gray-500 mr-2"></i>
                    <input type="searchAppointment" name="searchAppointment" placeholder="Buscar"
                        value="<?= htmlspecialchars($search) ?>"
                        class="input input-sm border-none outline-none w-full md:w-[180px]" />
                </div>
                <button type="submit"
                    class="btn btn-sm bg-orange-500 text-white hover:bg-orange-600 rounded-md font-semibold">
                    <i class="fas fa-filter mr-1"></i> Filtrar
                </button>
                <a href="<?= BASE_URL ?>/Appointment/appointments"
                    class="btn btn-sm bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-md font-semibold">
                    <i class="fas fa-times mr-1"></i> Limpiar
                </a>
            </div>
        </form>
    </div>
    <div class="overflow-x-auto bg-white rounded-xl shadow-xl">
        <table class="min-w-full table-auto text-sm">
            <thead class="bg-orange-500 text-white text-left">
                <tr>
                    <th class="p-4 text-center">ID de cita</th>
                    <th class="p-4 text-center">Documento del paciente</th>
                    <th class="p-4 text-center">Documento del Doctor</th>
                    <th class="p-4 text-center">Tipo de Cita</th>
                    <th class="p-4 text-center">Fecha de la Cita</th>
                    <th class="p-4 text-center">Estado de la Cita</th>
                    <th class="p-4 text-center">Observacion de la Cita</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700 text-center">
                <?php foreach ($appointments as $appointment): ?>
                    <tr class="hover:bg-orange-50 transition items-center content-center justify-center">
                        <td class="p-4"><?= htmlspecialchars($appointment['appointmentId']) ?></td>
                        <td class="p-4"><?= htmlspecialchars($appointment['appointmentUserDocument']) ?></td>
                        <td class="p-4"><?= htmlspecialchars($appointment['appointmentDoctorDocument']) ?></td>
                        <td class="p-4"><?= htmlspecialchars($appointment['appointmentAppointmentType']) ?></td>
                        <td class="p-4"><?= htmlspecialchars($appointment['appointmentDate']) ?></td>
                        <td class="p-4"><?= htmlspecialchars($appointment['appointmentDate']) ?></td>
                        <td class="p-4"><?= htmlspecialchars($appointment['appointmentObservation']) ?></td> ?? 'N/A') ?>
                        </td>
                        <td class="p-4">
                            <?php if ($appointment['appointmentStatus'] === 'Pending'): ?>
                                <span class="inline-flex items-center gap-1 text-orange-500 font-medium">
                                    <i class="fas fa-circle text-xs"></i> Pendiente
                                </span>
                            <?php elseif ($appointment['appointmentStatus'] === 'Confirmed'): ?>
                                <span class="inline-flex items-center gap-1 text-green-500 font-medium">
                                    <i class="fas fa-circle text-xs"></i> Confirmada
                                </span>
                            <?php elseif ($appointment['appointmentStatus'] === 'Canceled'): ?>
                                <span class="inline-flex items-center gap-1 text-red-500 font-medium">
                                    <i class="fas fa-circle text-xs"></i> Cancelada
                                </span>
                            <?php elseif ($appointment['appointmentStatus'] === 'Finished'): ?>
                                <span class="inline-flex items-center gap-1 text-gray-700 font-medium">
                                    <i class="fas fa-circle text-xs"></i> Finalizada
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="p-4">
                            <div class="flex justify-center items-center gap-3">
                                <button class="btn btn-sm text-blue-600 hover:text-blue-800 btn-edit-user"
                                    data-user='<?= htmlspecialchars(json_encode($user)) ?>' title="Editar"
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
    <div class="flex justify-center mt-6">
        <nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
            <?php if ($currentPage > 1): ?>
                <a href="?status=<?= $statusFilter ?>&plan=<?= $planFilter ?>&search=<?= $search ?>&page=<?= $currentPage - 1 ?>"
                    class="px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-l-md">
                    ← Anterior
                </a>
            <?php else: ?>
                <span
                    class="px-4 py-2 border border-gray-300 bg-gray-100 text-sm font-medium text-gray-400 rounded-l-md cursor-not-allowed">
                    ← Anterior
                </span>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?status=<?= $statusFilter ?>&plan=<?= $planFilter ?>&search=<?= $search ?>&page=<?= $i ?>"
                    class="px-4 py-2 border border-gray-300 <?= ($i == $currentPage) ? 'bg-orange-500 text-white' : 'bg-white text-gray-700 hover:bg-gray-50' ?> text-sm font-medium">
                    <?= $i ?>
                </a>
            <?php endfor; ?>
            <?php if ($currentPage < $totalPages): ?>
                <a href="?status=<?= $statusFilter ?>&plan=<?= $planFilter ?>&search=<?= $search ?>&page=<?= $currentPage + 1 ?>"
                    class="px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-r-md">
                    Siguiente →
                </a>
            <?php else: ?>
                <span
                    class="px-4 py-2 border border-gray-300 bg-gray-100 text-sm font-medium text-gray-400 rounded-r-md cursor-not-allowed">
                    Siguiente →
                </span>
            <?php endif; ?>
        </nav>
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
                    <label for="create-typeDocument" class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fas fa-id-card mr-2 text-orange-500"></i>Tipo de Documento
                    </label>
                    <select id="create-typeDocument" name="create-typeDocument"
                        class="select select-warning w-full border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-300">
                        <option value="" selected disabled>Selecciona tipo de documento</option>
                        <option value="1">Cédula de Ciudadanía</option>
                        <option value="2">Cédula de Extranjería</option>
                        <option value="3">Tarjeta de Identidad</option>
                        <option value="4">Pasaporte</option>
                    </select>
                </div>
                <div>
                    <label for="create-numberDocument" class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fas fa-hashtag mr-2 text-orange-500"></i>Número de Documento
                    </label>
                    <input id="create-numberDocument" name="create-numberDocument" type="text"
                        class="input input-warning w-full border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-300"
                        placeholder="Número de Documento" />
                </div>
                <div>
                    <label for="create-name" class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fas fa-user mr-2 text-orange-500"></i>Nombres
                    </label>
                    <input id="create-name" name="create-name" type="text"
                        class="input input-warning w-full border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-300"
                        placeholder="Nombres" />
                </div>
                <div>
                    <label for="create-lastname" class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fas fa-user-tag mr-2 text-orange-500"></i>Apellidos
                    </label>
                    <input id="create-lastname" name="create-lastname" type="text"
                        class="input input-warning w-full border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-300"
                        placeholder="Apellidos" />
                </div>
                <div>
                    <label for="create-email" class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fas fa-envelope mr-2 text-orange-500"></i>Correo Electrónico
                    </label>
                    <input id="create-email" name="create-email" type="email"
                        class="input input-warning w-full border-orange-300 rounded-lg focus:ring-2 focus:ring-orange-300"
                        placeholder="Correo electrónico" />
                </div>
                <div>
                    <label for="create-password" class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fas fa-lock mr-2 text-orange-500"></i>Contraseña
                    </label>
                    <input id="create-password" name="create-password" type="password"
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