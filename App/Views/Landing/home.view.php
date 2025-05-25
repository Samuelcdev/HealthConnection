<?php
$servicios = require_once(__DIR__ . "/../../Data/services.php");
$title = 'Inicio';
?>
<section class="hero min-h-[590px] mx-auto w-full max-w-[1200px] mt-10 px-6 lg:px-8">
    <div class="hero-content flex flex-col-reverse lg:flex-row-reverse items-center justify-between gap-12">
        <img src="<?= BASE_URL ?>/Images/Doctor_Patient.png" alt="Atención médica"
            class="hidden md:block w-[500px] max-w-full transition-transform duration-500 hover:scale-105" />
        <div class="text-center lg:text-left max-w-xl">
            <h1 class="text-4xl lg:text-6xl font-extrabold text-gray-800 mb-6 leading-tight">
                Tu salud, <span class="text-orange-500">nuestra prioridad</span>
            </h1>
            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                Bienvenido a nuestro sistema clínico digital. Agenda citas, consulta tus datos médicos y accede a
                nuestros servicios de forma segura y rápida.
            </p>
            <a href="#">
                <button
                    class="inline-flex items-center gap-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition-all duration-300 hover:shadow-xl">
                    <i class="fa-solid fa-plus"></i> Unirme ahora
                </button>
            </a>
        </div>
    </div>
</section>
<div class="flex items-center justify-center gap-6 mt-20 mb-12 px-4 max-w-[1200px] mx-auto">
    <div class="flex-grow border-t border-gray-300"></div>
    <h2 class="text-4xl font-semibold text-black text-center whitespace-nowrap">Nuestros Servicios</h2>
    <div class="flex-grow border-t border-gray-300"></div>
</div>
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 max-w-[1200px] mx-auto px-6 pb-20">
    <?php foreach ($servicios as $servicio): ?>
        <div class="card shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-2xl overflow-hidden bg-white">
            <figure class="h-[220px] bg-gray-100">
                <img src="<?= $servicio['img'] ?>" alt="<?= $servicio['title'] ?>"
                    class="object-contain w-full h-full p-5 border-b-2 border-orange-500" />
            </figure>
            <div class="card-body p-6">
                <h3 class="text-xl font-bold text-gray-800"><?= $servicio['title'] ?></h3>
                <p class="text-gray-600 mt-3"><?= $servicio['description'] ?></p>
                <div class="card-actions flex-wrap justify-start mt-4 gap-2">
                    <?php foreach ($servicio['tags'] as $tag): ?>
                        <span
                            class="badge badge-outline text-sm px-3 py-1 border-orange-400 text-orange-500 font-medium rounded-full">
                            <?= $tag ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>