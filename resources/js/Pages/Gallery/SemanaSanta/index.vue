<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <AppLayout title="Banderas">
        <div class="container py-20 pb-56">
            <div class="bg-white dark:bg-gray-900">
                <div class="h-[32rem] bg-gray-100 dark:bg-gray-800">
                    <div class="container mx-auto px-6 py-10">
                        <h1
                            class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl"
                        >
                            Galeria de Fotos de Semana Santa <br />
                            Real Hermandad Paso Blanco de Huercal-Overa
                        </h1>

                        <div class="mx-auto mt-6 flex justify-center">
                            <span
                                class="inline-block h-1 w-40 rounded-full bg-blue-500"
                            ></span>
                            <span
                                class="mx-1 inline-block h-1 w-3 rounded-full bg-blue-500"
                            ></span>
                            <span
                                class="inline-block h-1 w-1 rounded-full bg-blue-500"
                            ></span>
                        </div>

                        <p
                            class="mx-auto mt-6 max-w-2xl text-center text-gray-500 dark:text-gray-300"
                        >
                            Hazte mienbro de nuestra hermandad, accede a nuestro
                            repositorio de fotos y descargate las fotos en alta
                            resolución.
                        </p>
                    </div>
                </div>

                <div
                    class="container mx-auto -mt-72 px-6 py-10 sm:-mt-80 md:-mt-96"
                >
                    <div
                        class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-16 xl:grid-cols-3"
                    >
                        <div class="gallery-items">
                            <Link href="/gallery/semanasanta/banderas">
                                <img
                                    class="aspect-square w-full rounded-xl object-cover"
                                    src="/image/gallery/SemanaSanta/banderas23/bandera1.jpg"
                                    alt=""
                                />

                                <h1
                                    class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white"
                                >
                                    Recogida de Banderas Jueves Santo 2023
                                </h1>

                                <p
                                    class="mt-2 capitalize text-gray-500 dark:text-gray-300"
                                >
                                    Recogida de banderas mañana del Jueves Santo
                                    por las calles de Huercal-Overa 2023.
                                </p>
                            </Link>
                        </div>

                        <div class="gallery-items">
                            <Link href="/gallery/semanasanta/romanos">
                                <img
                                    class="aspect-square w-full rounded-xl object-cover"
                                    src="/image/gallery/SemanaSanta/romanos23/Romanos3.jpg"
                                    alt=""
                                />

                                <h1
                                    class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white"
                                >
                                    Romanos Jueves Santo 2023
                                </h1>

                                <p
                                    class="mt-2 capitalize text-gray-500 dark:text-gray-300"
                                >
                                    Romanos pasa calle paso Blanco Jueves Santo
                                    Huercal-Overa 2023.
                                </p>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
