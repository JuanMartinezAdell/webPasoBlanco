
<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';


</script>


<template>
    <AppLayout title="Article">
        <div class="container mx-auto px-6 py-6 mt-8 text-center">
            <div class="container mx-auto px-6 py-10">
                <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Métodos de Pago Paso Blanco</h1>
                <input id="card-holder-name" type="text">

                <!-- Stripe Elements Placeholder -->
                <div id="card-element"></div>

                <button id="card-button" data-secret="{{ $intent->client_secret }}">
                    Update Payment Method
                </button>

            </div>
        </div>
    </AppLayout>
</template>
