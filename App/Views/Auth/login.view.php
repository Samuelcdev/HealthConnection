<?php
$title = 'Iniciar Sesión';
?>

<div class="min-h-screen flex flex-col-reverse lg:flex-row-reverse bg-orange-50">
  <div class="hidden lg:flex lg:w-3/5 bg-orange-500 min-h-screen items-center justify-center">
    <a href="<?= BASE_URL ?>">
      <img src="<?= BASE_URL ?>/Images/Imagen2.png" alt="Logo Health-Connection" class="w-2/3 max-w-md mx-auto">
    </a>
  </div>
  <div class="w-full lg:w-2/5 flex items-center justify-center px-4 py-8">
    <div class="bg-white shadow-xl rounded-3xl p-8 w-full max-w-md relative">
      <div class="flex lg:hidden mb-4">
        <a href="<?= BASE_URL ?>"
          class="text-orange-500 hover:text-orange-600 text-sm font-semibold flex items-center gap-2">
          <i class="fas fa-arrow-left"></i> Volver al inicio
        </a>
      </div>

      <h2 class="text-3xl font-extrabold text-center text-orange-500 mb-8">Iniciar Sesión</h2>
      <form method="post" action="<?= BASE_URL ?>/Login/login" class="space-y-5">
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

        <!-- Número de documento -->
        <div>
          <label for="numberDocument" class="block text-sm font-medium text-orange-500 mb-1">
            <i class="fas fa-hashtag mr-2"></i>Número de Documento
          </label>
          <input id="numberDocument" name="numberDocument" type="text" required
            class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
            placeholder="Número de Documento" autocomplete="username" />
        </div>

        <!-- Contraseña -->
        <div>
          <label for="password" class="block text-sm font-medium text-orange-500 mb-1">
            <i class="fas fa-lock mr-2"></i>Contraseña
          </label>
          <input id="password" name="password" type="password" required
            class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
            placeholder="Contraseña" autocomplete="current-password" />
        </div>

        <!-- Enlaces rápidos -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 text-sm">
          <a href="#" class="text-orange-500 hover:underline">
            <i class="fas fa-question-circle mr-1"></i>¿Olvidaste tu contraseña?
          </a>
          <a href="<?= BASE_URL ?>/Register/showRegister" class="text-orange-500 hover:underline">
            <i class="fas fa-user-plus mr-1"></i>¿No tienes cuenta aún?
          </a>
        </div>

        <!-- Recordarme -->
        <div class="flex items-center space-x-2">
          <input type="checkbox" class="checkbox checkbox-warning" id="rememberMe" name="rememberMe" />
          <label for="rememberMe" class="text-sm text-gray-700">Recordarme</label>
        </div>

        <!-- Botón de envío -->
        <button type="submit"
          class="btn w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg shadow-md transition-all duration-200 transform hover:scale-105">
          <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
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
    }).then(() => {
      window.location.href = "<?= BASE_URL ?>"
    });
  </script>
  <?php unset($_SESSION['success']); ?>
<?php endif; ?>