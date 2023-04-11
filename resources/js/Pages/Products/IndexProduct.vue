<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    products: Object,
});


</script>

<template>
    <AppLayout title="Product">
        <div class="container mx-auto px-6 py-6 mt-8 text-center">
            <div class="container mx-auto px-6 py-10">
                <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Tienda Paso Blanco</h1>

                <p class="mt-4 text-center text-gray-500 dark:text-gray-300">Haz un Donativo a nuestros Pasos comprando en nuestra tienda online todo lo recaudado es destinado al patrimonio del Paso Blanco, Semana Santa o obras de caridad. Todos los donativos quedaran registrados y se realizara una factura con el importe donado</p>

                <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-12">
                    <div v-for="product in products" :key="product.id" class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <div class="bg-white pounded shadow-xl" :image="product.image" :name="product.name" :description="product.description" :price="product.price">
                                <div class="h-56 bg-cover bg-center p-4" style="background-image: url({{ product.image }}) ">
                                    <span class="bg-gray-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">{{ product.price }}€</span>
                                </div>
                                <div class="px-6 py-4">
                                    <h1 class="mt-4 text-2xl font-semibold capitalize text-gray-900 dark:text-white">{{ product.name }}</h1>
                                    <p class="text-gray-700 text-base mb-4">
                                        {{ product.description }}
                                    </p>
                                    <button type="button" class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Comprar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout >
</template>
