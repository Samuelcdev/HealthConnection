<?php
$servicios = require_once(__DIR__ . "/../../Data/services.php");
?>

<section class="hero min-h-[590px] mx-auto w-full max-w-[1200px] mt-10">
    <div
        class="hero-content flex flex-col justify-center items-center text-center lg:flex-row-reverse lg:items-center lg:justify-between lg:text-left w-full h-full p-6 box-content">
        <img src="<?= BASE_URL ?>/Images/Doctor_Patient.png" alt="Atención médica"
            class="hidden md:block w-[550px] object-cover transition-transform duration-500 hover:scale-105" />
        <div class="max-w-xl">
            <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-800 mb-6 leading-tight">
                Tu salud, <span class="text-orange-500">nuestra prioridad</span>
            </h1>
            <p class="max-w-xl text-gray-600 text-lg leading-relaxed mb-8">
                Bienvenido a nuestro sistema clínico digital. Agenda citas, consulta tus datos médicos y accede a
                nuestros servicios de forma segura y rápida.
            </p>
            <button
                class="inline-flex items-center gap-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-8 py-3 rounded-md shadow-lg transition-all duration-300 hover:shadow-xl">
                <i class="fa-solid fa-plus"></i> Unirme ahora
            </button>
        </div>
    </div>
</section>

<div class="flex items-center justify-end mt-10 mb-15 gap-6 px-4 max-w-[1200px] mx-auto">
    <div class="flex-grow border-t border-gray-300"></div>
    <h2 class="text-4xl font-semibold text-black text-center">Nuestros Servicios</h2>
    <div class="flex-grow border-t border-gray-300"></div>
</div>

<section class="flex flex-wrap justify-between gap-10 max-w-[1200px] mx-auto">
    <?php
    foreach ($servicios as $servicio):
        ?>
        <div
            class="card w-full max-w-[360px] shadow-xl rounded-2xl overflow-hidden transition-transform hover:scale-105 duration-300">
            <figure class="h-[220px] bg-gray-100">
                <img src=<?= $servicio['img'] ?> alt=<?= $servicio['title'] ?>
                    class="object-contain w-full h-full p-4 border-b-2 border-orange-500" />
            </figure>
            <div class="card-body bg-white p-6">
                <h3 class="text-xl font-bold text-gray-800"><?= $servicio['title'] ?></h3>
                <p class="text-gray-600 mt-2"><?= $servicio['description'] ?></p>
                <div class="card-actions justify-end mt-4 space-x-2">
                    <?php
                    foreach ($servicio['tags'] as $tag):
                        ?>
                        <span class="badge badge-outline text-sm"><?= $tag ?></span>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
        <?php
    endforeach;
    ?>
</section>