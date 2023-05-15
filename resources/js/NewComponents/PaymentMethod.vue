<script setup>
    import { onMounted } from 'vue';
    import { reactive } from 'vue';
    import { Head, Link, useForm, router } from '@inertiajs/vue3';
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import Primarybutton from '@/Components/Primarybutton.vue';
    import DisabledButton from '@/NewComponents/DisabledButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import FormSection from '@/Components/FormSection.vue';
    import ActionMessage from '@/Components/ActionMessage.vue';
    import SectionTitleVue from '../Components/SectionTitle.vue';

    const stripeKey = import.meta.env.VITE_STRIPE_KEY;

    const props = defineProps({
        intent: String,
        paymentMethod: Object,
        });

    onMounted(() => {
        const stripe = Stripe(`${stripeKey}`);
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click', async (e) => {

            const clientSecret = cardButton.dataset.secret;

            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );

            if (error) {
                // Display "error.message" to the user...
                let span = document.getElementById('card-error-message');

                span.textContent = error.message;

            } else {
                // Limpiar formulario
                cardHolderName.value = '';
                cardElement.clear();
                //console.log(setupIntent.payment_method);
                const paymentMethod = setupIntent.payment_method;
                try {
                    const response = await router.post(route('billings.payment'), { paymentMethod });
                    console.log(response.data);
                } catch (error) {
                    console.log(error);
                }
            }

        });
    });

</script>


<template>

<div class="container mx-auto px-6 py-1 pb-20">
    <div class="pt-12 pb-8 py-4 md:grid md:grid-cols-3 md:gap-6">
        <section class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Agregar metodo de pago
                </h3>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Información de tarjeta
                </p>
            </div>
        </section>

        <section class="bg-white rounded shadow-lg md:mt-0 md:col-span-2">
            <div class="mt-5 px-8 py-6">
                <div class="flex-1">
                    <input class="form-control mb-4" id="card-holder-name" placeholder="Nombre del titular de la tarjeta">
                    <!-- Stripe Elements Placeholder -->
                    <div class="form-control" id="card-element"></div>
                    <span id="card-error-message" class="text-red-600 text-sm mb-2"></span>
                </div>
            </div>
            <footer class="px-8 py-6 bg-gray-50 border-t border-gray-200">
                <div class="flex justify-end">
                    <Primarybutton id="card-button" :data-secret="intent">
                        Actualizar metodo de pago
                    </Primarybutton>
                </div>
            </footer>
        </section>

        <!-- Tarjetas -->
        <section class="md:col-span-1 flex justify-between">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Métodos de Pago
                </h3>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Información de las tarjetas agregadas
                </p>
            </div>

        </section>
        <section class="bg-white rounded shadow-lg md:mt-0 md:col-span-2">
            <header class="px-8 py-6 bg-gray-50 border-t border-gray-200">
                <h1 class="text-gray-700 text-lg font-semibold">Tarjetas Cuenta</h1>
            </header>

            <div class="px-8 py-6">
                <ul>
                    <li>

                    </li>
                </ul>
            </div>
        </section>
    </div>
    </div>
</template>
