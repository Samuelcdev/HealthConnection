<div class="hero bg-orange-50 min-h-screen w-full flex">
  <div class="flex bg-orange-500 w-2/3 min-h-screen rounded-r-full items-center justify-center">
    <a href="/HealthConnection/Public">
      <img src="<?= BASE_URL ?>/Images/Imagen2.png" alt="Logo Health-Connection" class="w-2/3 size-sm mx-auto">
    </a>
  </div>
  <div class="w-1/3 max-w-md mx-auto flex items-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full">
      <h2 class="text-2xl font-bold text-center text-orange-500 mb-6">Crear Cuenta</h2>
      <form method="post" action="register">
        <div class="mb-4">
          <label for="typeDocument" class="label text-sm font-medium text-orange-500">Tipo de Documento</label>
          <select id="typeDocument" name="typeDocument" class="select select-warning w-full border-orange-500">
            <option selected disabled>Selecciona tipo de documento</option>
            <option value="1">Cédula de Ciudadanía</option>
            <option value="2">Cédula de Extranjería</option>
            <option value="3">Tarjeta de Identidad</option>
            <option value="4">Pasaporte</option>
          </select>
        </div>

        <div class="mb-4">
          <label for="numberDocument" class="label text-sm font-medium text-orange-500">Número de Documento</label>
          <input id="numberDocument" name="numberDocument" type="text" class="input input-warning w-full border-orange-500"
            placeholder="Número de Documento" />
        </div>

        <div class="mb-4">
          <label for="email" class="label text-sm font-medium text-orange-500">Correo Electrónico</label>
          <input id="email" name="email" type="email" class="input input-warning w-full border-orange-500"
            placeholder="Correo electrónico" />
        </div>

        <div class="mb-4">
          <label for="name" class="label text-sm font-medium text-orange-500">Nombres</label>
          <input id="name" name="name" type="text" class="input input-warning w-full border-orange-500" placeholder="Nombres" />
        </div>

        <div class="mb-4">
          <label for="lastname" class="label text-sm font-medium text-orange-500">Apellidos</label>
          <input id="lastname" name="lastname" type="text" class="input input-warning w-full border-orange-500"
            placeholder="Apellidos" />
        </div>

        <div class="mb-4">
          <label for="password" class="label text-sm font-medium text-orange-500">Contraseña</label>
          <input id="password" name="password" type="password" class="input input-warning w-full border-orange-500"
            placeholder="Contraseña" />
        </div>

        <div class="flex justify-between mb-4 text-sm">
          <a href="#" class="text-orange-500 hover:underline">¿Olvidaste tu contraseña?</a>
          <a href="#" class="text-orange-500 hover:underline">¿Ya tienes cuenta?</a>
        </div>

        <div class="form-control mb-4">
          <label class="label cursor-pointer">
            <input type="checkbox" class="checkbox checkbox-warning" checked />
            <span class="ml-2 text-sm text-gray-700">Recordarme</span>
          </label>
        </div>

        <button type="submit" class="btn w-full bg-orange-500 hover:bg-orange-600 text-white">
          Registrarme
        </button>
      </form>
    </div>
  </div>
</div>

<?php
session_start();

if (isset($_SESSION['error'])) {
  echo "<script>alert('{$_SESSION['error']}');</script>";
  unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
  echo "<script>alert('{$_SESSION['success']}');</script>";
  unset($_SESSION['success']);
}
?>