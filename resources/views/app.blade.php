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
    <meta name="subject"
        content="Accede al portal del Paso Blanco para gestionar tu cuota de en la hermandad via web, recibe notificaciones con todos los actos y visualiza imagenes y videos con todos los actos del Paso.">
    <meta name="title"
        content="Paso Blanco de Huercal-Overa,Real Hermandad de Nuestra Señora de las Angustias y San Juan ">
    <link rel="canonical" href="http://www.pasoblanco.es/wp/" />
    <meta property="og:title" content="Paso Blanco | Huercal-Overa" />
    <meta property="og:description"
        content="Semana Santa en Huércal-Overa - Paso Blanco: Una Experiencia Única espiritual católica declarada de interés Turístico Nacional. Descubre la historia, el patrimonio y los actos de la Real Hermandad de Nuestra Señora de las Angustias y San Juan. Sumérgete en las conmovedoras galerías de fotos y videos de nuestra Semana Santa, participa con nosotros en nuestros actos sociales y benéficos. Invitamos a peregrinos y turistas a unirse a nosotros en este significativo evento de renombre nacional, donde la espiritualidad y la tradición se unen en un intenso testimonio de fe.">
    <meta property="og:url" content="http://www.pasoblanco.es/wp/" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://www.pasoblancohuercalovera.es/images/logo/logoPaso.png">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@pasoblancoho" />
    <meta name="twitter:title" content="Paso Blanco | Huercal-Overa" />
    <meta name="twitter:description"
        content="Paso Blanco de Huercal-Overa. Real Hermandad de Nuestra Señora de las Angustias y San Juan. Portal del Paso Blanco de Huercal-Overa atraves del cual podras acceder a todos lo actos de la hermandad, historia, patrimonio, galerias de fotos y videos de Semana Santa, convicencias, actos sociales y beneficos">
    <meta name="twitter:image" content="URL_DE_TU_IMAGEN_PRINCIPAL" />
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
