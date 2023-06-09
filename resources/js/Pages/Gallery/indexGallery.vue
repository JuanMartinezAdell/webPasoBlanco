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
                            <Link href="/gallery/semanasanta">
                                <img
                                    class="aspect-square w-full rounded-xl object-cover"
                                    src="/image/gallery/cartel/CARTEL-SEMANA-SANTA-2023.png"
                                    alt=""
                                />

                                <h1
                                    class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white"
                                >
                                    Semana Santa
                                </h1>

                                <p
                                    class="mt-2 capitalize text-gray-500 dark:text-gray-300"
                                >
                                    Accede al repositorio de fotografias
                                    realizadas en nuestra Semana Santa para el
                                    Paso Blanco.
                                </p>
                            </Link>
                        </div>

                        <div class="gallery-items">
                            <Link href="#">
                                <img
                                    class="aspect-square w-full rounded-xl object-cover"
                                    src="/image/gallery/cartel/feria.jpg"
                                    alt=""
                                />

                                <h1
                                    class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white"
                                >
                                    Otras festividades
                                </h1>

                                <p
                                    class="mt-2 capitalize text-gray-500 dark:text-gray-300"
                                >
                                    Accede al repositoria de fotos de la Caseta
                                    del Paso Blanco
                                </p>
                            </Link>
                        </div>

                        <div class="gallery-items">
                            <Link href="#">
                                <img
                                    class="aspect-square w-full rounded-xl object-cover"
                                    src="/image/gallery/cartel/cultoParoquia.jpg"
                                    alt=""
                                />

                                <h1
                                    class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white"
                                >
                                    Eventos
                                </h1>

                                <p
                                    class="mt-2 capitalize text-gray-500 dark:text-gray-300"
                                >
                                    Accede al repositorio de fotos de todos lo
                                    eventos que se estan realizando en la
                                    hermandad.
                                </p>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
