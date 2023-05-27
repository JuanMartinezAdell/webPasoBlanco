<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { usePage } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'

defineProps({
    plan: {
        type: Object,
        required: true,
    },
});


const checkout = (slug) => {
    console.log('Slug:', slug);
    if (slug) {
        router.visit(`/plans/checkout/${slug}`, {
            method: 'post',
            data: {
                slug: slug,
            },
        });
    } else {
        console.error('Slug is undefined');
    }
};

</script>

<template>
    <div id="plan" class="rounded-lg shadow-xl text-center overflow-hidden w-full transform hover:shadow-2xl hover:scale-105 transition duration-200 ease-in">
        <div id="title" class="w-full py-5 border-b border-gray-800">
            <h2 class="font-bold text-3xl text-black">Cuota {{ plan.name }}</h2>
            <div>
                <div class="relative flex justify-around">
                    <div class="flex items-end">
                        <span class="text-8xl text-blue-800 font-bold leading-0">{{ plan.price / 100 }}</span>
                            <div class="pb-2">
                                <span class="block text-5xl text-gray-700 font-bold">€</span>
                                <span class="block text-lg text-indigo-500 font-bold">{{ plan.slug }}</span>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="content" class="">
            <div id="icon" class="my-5">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-12 w-12 mx-auto fill-stroke text-blue-600"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                  />
                </svg>
                <p class="text-gray-500 text-xl pt-2">
                  {{ plan.description }}
                </p>
              </div>
        <div id="contain" class="leading-8 mb-10 text-lg font-light">
            <ul>
                <li class="space-x-2">
                    <span class="text-blue-500 font-semibold">&check;</span>
                    <span>Recibe notificaciones con todos los actos y eventos</span>
                </li>
                <li class="space-x-2">
                    <span class="text-blue-500 font-semibold">&check;</span>
                    <span>Accede a la galeria de imagenes</span>
                </li>
                <li class="space-x-2">
                    <span class="text-blue-500 font-semibold">&check;</span>
                    <span>Informate sobre las últimas noticias y novedades</span>
                </li>
            </ul>
            <div id="choose" class="w-full mt-8 px-6">
                <PrimaryButton @click.prevent="() => checkout(plan.slug)">
                    <span class="text-center text-white font-semibold">
                        Elige tu Cuota 💳
                    </span>
            </PrimaryButton>
            </div>
        </div>
    </div>
</div>

</template>

<style>

</style>



