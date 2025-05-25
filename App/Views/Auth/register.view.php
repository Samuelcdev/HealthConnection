<?php
$title = 'Registrarse';
?>

<div class="min-h-screen flex flex-col-reverse lg:flex-row bg-orange-50">
  <div class="hidden lg:flex lg:w-3/5 w-full min-h-[250px] lg:min-h-screen bg-orange-500 items-center justify-center ">
    <a href="<?= BASE_URL ?>">
      <img src="<?= BASE_URL ?>/Images/Imagen2.png" alt="Logo Health-Connection" class="w-2/3 max-w-sm mx-auto">
    </a>
  </div>

  <div class="lg:w-2/5 w-full flex items-center justify-center px-4 py-8">
    <div class="bg-white shadow-xl rounded-3xl p-8 w-full max-w-md">
      <div class="flex lg:hidden mb-4">
        <a href="<?= BASE_URL ?>"
          class="text-orange-500 hover:text-orange-600 text-sm font-semibold flex items-center gap-2">
          <i class="fas fa-arrow-left"></i> Volver al inicio
        </a>
      </div>
      <h2 class="text-3xl font-extrabold text-center text-orange-500 mb-4">Crear tu Cuenta</h2>
      <form method="post" action="<?= BASE_URL ?>/Register/register" class="space-y-4">
        <div>
          <label for="typeDocument" class="block text-sm font-medium text-orange-500 mb-1">
            <i class="fas fa-id-card mr-2"></i>Tipo de Documento
          </label>
          <select id="typeDocument" name="typeDocument" required
            class="select select-warning w-full border-orange-500 rounded-md focus:ring-2 focus:ring-orange-300 transition-all">
            <option selected disabled>Selecciona tipo de documento</option>
            <option value="1">Cédula de Ciudadanía</option>
            <option value="2">Cédula de Extranjería</option>
            <option value="3">Tarjeta de Identidad</option>
            <option value="4">Pasaporte</option>
          </select>
        </div>
        <div>
          <label for="numberDocument" class="block text-sm font-medium text-orange-500 mb-1">
            <i class="fas fa-hashtag mr-2"></i>Número de Documento
          </label>
          <input id="numberDocument" name="numberDocument" type="text" required
            class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
            placeholder="Número de Documento" />
        </div>
        <div>
          <label for="email" class="block text-sm font-medium text-orange-500 mb-1">
            <i class="fas fa-envelope mr-2"></i>Correo Electrónico
          </label>
          <input id="email" name="email" type="email" required
            class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
            placeholder="Correo electrónico" />
        </div>
        <div>
          <label for="name" class="block text-sm font-medium text-orange-500 mb-1">
            <i class="fas fa-user mr-2"></i>Nombres
          </label>
          <input id="name" name="name" type="text" required
            class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
            placeholder="Nombres" />
        </div>
        <div>
          <label for="lastname" class="block text-sm font-medium text-orange-500 mb-1">
            <i class="fas fa-user-tag mr-2"></i>Apellidos
          </label>
          <input id="lastname" name="lastname" type="text" required
            class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
            placeholder="Apellidos" />
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-orange-500 mb-1">
            <i class="fas fa-lock mr-2"></i>Contraseña
          </label>
          <input id="password" name="password" type="password" required
            class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
            placeholder="Contraseña" />
        </div>
        <div class="flex justify-between items-center text-sm">
          <a href="<?= BASE_URL ?>/Login/showLogin" class="text-orange-500 hover:underline">
            <i class="fas fa-sign-in-alt mr-1"></i>¿Ya tienes cuenta?
          </a>
        </div>
        <button type="submit"
          class="btn w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
          <i class="fas fa-user-plus mr-2"></i>Registrarme
        </button>
      </form>
    </div>
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
    });
  </script>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Éxito',
      text: '<?= $_SESSION['success'] ?>',
      confirmButtonColor: '#f97316'
    });
  </script>
  <?php unset($_SESSION['success']); ?>
<?php endif; ?>