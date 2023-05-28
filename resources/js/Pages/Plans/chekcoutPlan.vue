<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import { onMounted } from 'vue';
    import { router } from '@inertiajs/vue3'

    const stripeKey = import.meta.env.VITE_STRIPE_KEY;

    const props = defineProps({
        intent: String,
        plan: {
            type: Object,
            required: true,
        },
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
            const slug = e.target.dataset.slug;

            console.log(clientSecret);

            const { setupIntent, error } = await stripe.confirmCardSetup(
               clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value },
                        billing_details: props.billingDetails,
                    }
                }
            );

            if (error) {
                // Display "error.message" to the user...
                let span = document.getElementById('card-error-message');

                span.textContent = error.message;

            } else {
                // enviar peticion al servidor para suscribir al usuario
                // Limpiar formulario
                cardHolderName.value = '';
                cardElement.clear();
                console.log(setupIntent);
                const paymentMethod = setupIntent.payment_method;
                console.log(paymentMethod);
                //tengo que pasrale el paymethod y el plan al controlador
                try {
                    const response = await router.post(route('subcription.payment', { slug }), { paymentMethod });
                    console.log(response.data);
                } catch (error) {
                    console.log(error);
                }
            }
        });
    });

</script>

<template>
   <AppLayout title="Chekcout">
        <div class="container py-20">
            <div class="container mx-auto px-6 py-1 pb-20">
                <div class="pt-12 pb-8 py-4 md:grid md:grid-cols-3 md:gap-6">
                    <section class="md:col-span-1 flex justify-between">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Paga tú Cuota {{ plan.name }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Paga tu cuota {{ plan.name }} con total seguridad, cambia de subcripción cuando te convenga, gestiona tus subcripciones vía online, haz un seguimiento online de tus cuotas y
                                beneficiate de todas las ventajas de estar dado de alta en la paltaforma online de la Real Hermandad del Paso Blanco de Huercal-Overa.
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
                                <PrimaryButton id="card-button" :data-secret="intent" :data-slug="plan.slug">
                                    Pagar Cuota
                                </PrimaryButton>
                            </div>
                        </footer>
                    </section>
                </div>
            </div>
        </div>
   </AppLayout>
</template>
