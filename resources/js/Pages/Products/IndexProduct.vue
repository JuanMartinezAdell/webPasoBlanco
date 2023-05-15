<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PayUnique from '@/NewComponents/PayUnique.vue';

</script>



<template>
    <AppLayout title="Product">
        <div class="container mx-auto px-6 py-6 mt-8 text-center">
            <div class="container mx-auto px-6 py-10">
                <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Tienda Paso Blanco</h1>

                <p class="mt-4 text-center text-gray-500 dark:text-gray-300">Haz un Donativo a nuestros Pasos comprando en nuestra tienda online todo lo recaudado es destinado al patrimonio del Paso Blanco, Semana Santa o obras de caridad. Todos los donativos quedaran registrados y se realizara una factura con el importe donado</p>

                <PayUnique />

            </div>
        </div>
    </AppLayout >
</template>
