<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <!--h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Inicio
            </!--h2-->
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- Welcome /-->
                    <div class="w-full md:w-2/5 mx-auto">
                        <div class="mx-5 my-3 text-sm ">
                            <!--a href="" class=" text-blue-600 font-bold tracking-widest">Semana Santa</!--a -->
                            <p class="w-full text-blue-600 text-lg font-bold leading-none">
                                Semana Santa Huercal-Overa
                            </p>
                        </div>
                        <div class="w-full text-gray-800 text-4xl px-5 font-bold leading-none">
                            Fiesta de Interés Turístico Nacional
                        </div>

                        <div class="w-full text-gray-500 px-5 pb-5 pt-2">
                            Semana Santa, declarada de Interés Turístico Nacional desde 1983, su escenificación sobrepasa cualquier frontera de la imaginación
                        </div>

                        <div class="mx-5">
                            <!--img src="https://static.politico.com/dims4/default/fcd6d6a/2147483647/resize/1920x/quality/90/?url=https%3A%2F%2Fstatic.politico.com%2F22%2F87%2F2259ffd444678054896b9fa32b4d%2Fgettyimages-1221513169.jpg" -->
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/CYAzplItS5E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>

                        <div class="w-full text-gray-600 text-normal mx-5">
                            <p class="border-b py-3">Semana Santa de Huercal-Overa. "Tocando el Cielo" | Ayuntamiento de Huercal-Overa</p>
                        </div>

                        <div class="w-full text-gray-600 font-thin italic px-5 pt-3">
                            By <strong class="text-gray-700">Paso Blanco</strong><br>
                            03/05/2023 09:57 AM EDT<br>
                            Updated: 07/17/2023 10:33 AM EDT
                        </div>

                        <div class="px-5 w-full mx-auto">
                            <p class="my-5">La Semana Santa de Huércal-Overa ha sido declarada Fiesta de Interés Turístico Nacional debido a sus relevantes procesiones para rememorar la pasión y muerte de Jesucristo. Turistas de todo el mundo se citan cada año para disfrutar de este evento único en la provincia de Almería.</p>
                            <p class="my-5">Los feligreses de la localidad llevan décadas poniendo todo su empeño en la celebración de la Semana Santa. Reconocidos imagineros de las escuelas andaluza y murciana han creado excepcionales imágenes que acompañan a cada desfile procesional, así como bordados en seda y oro que cada año crecen en majestuosidad.</p>
                            <p class="my-5">Destacan tres cofradías: "los blancos", "los negros" y "los moraos", que son las responsables de iluminar las calles con sus procesiones. Destacan los encuentros del Miércoles Santo, Jueves Santo y Viernes Santo.</p>
                            <p class="my-5">La popularidad de la Semana Santa de Huércal-Overa se ha extendido por todo el mundo y es un símbolo de este municipio almeriense. Miles de turistas llegan para disfrutar de las procesiones y los diferentes actos, que también pueden verse en directo por internet a través de cámaras que el Ayuntamiento coloca en los puntos estratégicos del recorrido.</p>
                        </div>
                    </div>

                <div class="absolute w-full text-right text-sm bottom-0 p-3 mx-auto text-gray-400">
                    Made with <i class="text-Blue-300 fa fa-heart"></i> By <a href="#">Paso Blanco</a>
                </div>
            </div>
        </div>
        </div>
    </AppLayout>
</template>
