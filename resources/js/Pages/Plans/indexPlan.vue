<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PlanMethod from '@/NewComponents/PlanMethod.vue';

defineProps({
    plans: {
        type: Array,
        required: true,
    },
});

</script>


<template>
     <AppLayout title="Plans">
        <!--   Pasarlo a mode noche cambiarlo a:
               <div class="antialiased w-full h-full bg-black text-gray-400 font-inter p-10">
                    <div class="container px-4 mx-auto">
                    <div>
                        <div id="title" class="text-center my-10">
                        <h1 class="font-bold text-4xl text-white">Pricing Plans</h1>
                        <p class="text-light text-gray-500 text-xl">
                            Here are our pricing plans
          </p>-->
        <div class="antialiased w-full h-full text-gray-400 font-inter p-10">
            <div class="container px-4 mx-auto">
                <div>
                    <div id="title" class="text-center my-10">
                        <h1 class="font-bold text-4xl text-black">Precios Cuotas</h1>
                        <p class="text-light text-gray-500 text-xl">
                            Sistema Cuotas Real Hermandad Paso Blanco de Huercal-Overa
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-evenly gap-10 pt-10">

                        <PlanMethod v-for="plan in plans" :key="plan.slug" :plan="plan" />

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style>

</style>


