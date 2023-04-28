<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paso Blanco</title>
    <meta name="description"
        content="Paso Blanco de Huercal-Overa. Real Hermandad de Nuestra Señora de las Angustias y San Juan. Portal del Paso Blanco de Huercal-Overa atraves del cual podras acceder a todos lo actos de la hermandad, historia, patrimonio, galerias de fotos y videos de Semana Santa, convicencias, actos sociales y beneficos">
    <meta name="keywords"
        content="Semana Santa, Fotos y videos semana santa, Cofradía, Costaleros, Hermandad, Pasos, Suscripcion Hermandad, Procesiones, Jueves Santo, Martes Santo">
    <meta name="subjet"
        content="Accede al portal del Paso Blanco para gestionar tu cuota de en la hermandad via web, recibe notificaciones con todos los actos y visualiza imagenes y videos con todos los actos del Paso.">
    <meta name="tite"
        content="Paso Blanco de Huercal-Overa,Real Hermandad de Nuestra Señora de las Angustias y San Juan ">
    <title inertia>Paso Blanco | Huercal-Overa</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://js.stripe.com/v3/"></script>
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia


</body>

</html>
