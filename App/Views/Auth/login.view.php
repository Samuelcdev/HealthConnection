<div class="hero bg-orange-50 min-h-screen w-full flex flex-row-reverse">
  <div class="flex bg-orange-500 w-2/3 min-h-screen rounded-l-full items-center justify-center">
    <a href="<?= BASE_URL ?>">
      <img src="<?= BASE_URL ?>/Images/Imagen2.png" alt="Logo Health-Connection" class="w-2/3 mx-auto">
    </a>
  </div>

  <div class="w-1/3 max-w-md mx-auto flex items-center">
    <div class="bg-white shadow-2xl rounded-3xl p-8 w-full">
      <h2 class="text-3xl font-extrabold text-center text-orange-500 mb-8">Iniciar Sesión</h2>
      <form method="post" action="<?= BASE_URL ?>/Login/login">
        <div class="mb-4">
          <label for="typeDocument" class="block text-sm font-medium text-orange-500 mb-1">
            <i class="fas fa-id-card mr-2"></i>Tipo de Documento
          </label>
          <select id="typeDocument" name="typeDocument"
            class="select select-warning w-full border-orange-500 rounded-md focus:ring-2 focus:ring-orange-300 transition-all">
            <option selected disabled>Selecciona tipo de documento</option>
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
          <label for="password" class="block text-sm font-medium text-orange-500 mb-1">
            <i class="fas fa-lock mr-2"></i>Contraseña
          </label>
          <input id="password" name="password" type="password"
            class="input input-warning w-full border-orange-500 rounded-md shadow-sm focus:ring-2 focus:ring-orange-300 transition-all"
            placeholder="Contraseña" />
        </div>

        <div class="flex justify-between mb-4 text-sm">
          <a href="#" class="text-orange-500 hover:underline">
            <i class="fas fa-question-circle mr-1"></i>¿Olvidaste tu contraseña?
          </a>
          <a href="<?= BASE_URL ?>/Register/showRegister" class="text-orange-500 hover:underline">
            <i class="fas fa-user-plus mr-1"></i>¿No tienes cuenta aún?
          </a>
        </div>

        <div class="form-control mb-6">
          <label class="label cursor-pointer">
            <input type="checkbox" class="checkbox checkbox-warning" checked />
            <span class="text-sm text-gray-700">Recordarme</span>
          </label>
        </div>

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
      title: 'Exito',
      text: '<?= $_SESSION['success'] ?>',
      confirmButtonColor: '#f97316',
      allowOutsideClick: false,
      allowEscapeKey: false
    }).then(() => {
      window.location.href = '<?= BASE_URL ?>';
    })
  </script>
  <?php unset($_SESSION['success']); ?>
<?php endif; ?>