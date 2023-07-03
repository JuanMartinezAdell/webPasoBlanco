<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButtonProces from "@/NewComponents/PrimaryButtonProces.vue";
import SecundaryButton from "@/NewComponents/SecundaryButton.vue";

import { onMounted, ref } from "vue";
import { router } from "@inertiajs/vue3";

const stripeKey = import.meta.env.VITE_STRIPE_KEY;

const props = defineProps({
    intent: String,
    plan: {
        type: Object,
        required: true,
    },
});

const formProcessing = ref(false);
const checked = ref(false);

onMounted(() => {
    const stripe = Stripe(`${stripeKey}`);
    const elements = stripe.elements();
    const cardElement = elements.create("card");
    cardElement.mount("#card-element");

    const cardHolderName = document.getElementById("card-holder-name");
    const cardButton = document.getElementById("card-button");

    cardButton.addEventListener("click", async (e) => {
        const clientSecret = cardButton.dataset.secret;
        const slug = e.target.dataset.slug;
        formProcessing.value = true;

        console.log(clientSecret);

        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret,
            {
                payment_method: {
                    card: cardElement,
                    billing_details: { name: cardHolderName.value },
                    billing_details: props.billingDetails,
                },
            }
        );

        if (error) {
            // Display "error.message" to the user...
            let span = document.getElementById("card-error-message");

            span.textContent = error.message;
            formProcessing.value = false;
        } else {
            // enviar peticion al servidor para suscribir al usuario
            // Limpiar formulario
            cardHolderName.value = "";
            cardElement.clear();
            console.log(setupIntent);
            const paymentMethod = setupIntent.payment_method;
            console.log(paymentMethod);
            //tengo que pasrale el paymethod y el plan al controlador
            try {
                const response = await router.post(
                    route("subcription.payment", { slug }),
                    { paymentMethod }
                );
                console.log(response.data);
            } catch (error) {
                console.log(error);
            } finally {
                formProcessing.value = false;
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
                            <h3
                                class="text-lg font-medium text-gray-900 dark:text-gray-100"
                            >
                                Paga tú Cuota {{ plan.name }}
                            </h3>

                            <p
                                class="mt-1 text-sm text-gray-600 dark:text-gray-400"
                            >
                                Paga tu cuota {{ plan.name }} con total
                                seguridad, cambia de subcripción cuando te
                                convenga, gestiona tus subcripciones vía online,
                                haz un seguimiento online de tus cuotas y
                                beneficiate de todas las ventajas de estar dado
                                de alta en la paltaforma online de la Real
                                Hermandad del Paso Blanco de Huercal-Overa.
                            </p>
                        </div>
                    </section>

                    <section
                        class="bg-white rounded shadow-lg md:mt-0 md:col-span-2"
                    >
                        <div class="mt-5 px-8 py-6">
                            <div class="flex-1">
                                <input
                                    class="form-control mb-4"
                                    id="card-holder-name"
                                    placeholder="Nombre del titular de la tarjeta"
                                />
                                <!-- Stripe Elements Placeholder -->
                                <div
                                    class="form-control"
                                    id="card-element"
                                ></div>
                                <span
                                    id="card-error-message"
                                    class="text-red-600 text-sm mb-2"
                                ></span>
                            </div>
                        </div>
                        <footer
                            class="px-8 py-6 bg-gray-50 border-t border-gray-200"
                        >
                            <div class="flex justify-end">
                                <PrimaryButtonProces v-show="!checked">
                                    Por favor, lee los terminos y condiciones
                                </PrimaryButtonProces>
                            </div>
                            <div class="flex justify-end">
                                <PrimaryButtonProces
                                    v-show="checked"
                                    id="card-button"
                                    :data-secret="intent"
                                    :data-slug="plan.slug"
                                    :processing="formProcessing"
                                >
                                    Pagar Cuota
                                </PrimaryButtonProces>
                            </div>
                        </footer>
                    </section>
                    <section class="md:col-span-1 flex justify-between pt-10">
                        <div class="px-4 sm:px-0">
                            <p
                                class="text-sm font-semibold font-medium text-gray-900 dark:text-gray-100"
                            >
                                Acuerdo de Suscripción y Términos del Servicio
                                Paso Blanco de Huercal-Overa
                            </p>

                            <p
                                class="mt-1 text-xs text-gray-600 dark:text-gray-400"
                            >
                                Al registrarte como suscriptor en nuestra página
                                web, estás aceptando los siguientes términos y
                                condiciones. Por favor, léelos cuidadosamente.
                            </p>
                            <input
                                type="checkbox"
                                id="checkbox"
                                v-model="checked"
                                :disabled="checked"
                            />
                        </div>
                    </section>
                    <section
                        class="md:col-span-2 flex justify-between"
                        v-if="checked"
                    >
                        <div class="mt-5 px-8 py-6">
                            <div class="px-4 sm:px-0">
                                <ol class="list-decimal">
                                    <li
                                        class="mt-1 text-sm text-gray-800 dark:text-gray-400"
                                    >
                                        Aceptación de los términos
                                    </li>
                                    <ul
                                        class="mt-1 text-xs text-gray-600 dark:text-gray-200"
                                    >
                                        Al usar nuestro sitio web y suscribirte
                                        a nuestra hermandad, aceptas estos
                                        Términos de Servicio. Si no estás de
                                        acuerdo con estos términos, por favor no
                                        utilices nuestro sitio web o te
                                        suscribas a nuestros servicios.
                                    </ul>
                                    <li
                                        class="mt-1 text-sm text-gray-800 dark:text-gray-400"
                                    >
                                        Cuotas de suscripción
                                    </li>
                                    <ul
                                        class="mt-1 text-xs text-gray-600 dark:text-gray-200"
                                    >
                                        Para suscribirte a nuestra hermandad,
                                        debes pagar una cuota de suscripción.
                                        Los fondos recaudados a través de estas
                                        cuotas se destinan a la cofradía, la
                                        conservación de las imágenes, los gastos
                                        de las procesiones y el mantenimiento
                                        del patrimonio.
                                    </ul>
                                    <li
                                        class="mt-1 text-sm text-gray-800 dark:text-gray-400"
                                    >
                                        Periodo de suscripción
                                    </li>
                                    <ul
                                        class="mt-1 text-xs text-gray-600 dark:text-gray-200"
                                    >
                                        Una vez que te suscribes, tu suscripción
                                        estará vigente desde el momento de la
                                        compra hasta el final del periodo de
                                        renovación que hayas elegido.
                                    </ul>
                                    <li
                                        class="mt-1 text-sm text-gray-800 dark:text-gray-400"
                                    >
                                        Cancelación de la suscripción
                                    </li>
                                    <ul
                                        class="mt-1 text-xs text-gray-600 dark:text-gray-200"
                                    >
                                        Puedes optar por renovar tu suscripción
                                        en cualquier momento y elegir una
                                        modalidad de pago diferente. Tu
                                        suscripción se renovará inmediatamente
                                        en el momento de la renovación y la
                                        cuota correspondiente a la nueva
                                        modalidad de pago se aplicará.
                                    </ul>
                                    <li
                                        class="mt-1 text-sm text-gray-800 dark:text-gray-400"
                                    >
                                        Renovación de la suscripción
                                    </li>
                                    <ul
                                        class="mt-1 text-xs text-gray-600 dark:text-gray-200"
                                    >
                                        Al usar nuestro sitio web y suscribirte
                                        a nuestra hermandad, aceptas estos
                                        Términos de Servicio. Si no estás de
                                        acuerdo con estos términos, por favor no
                                        utilices nuestro sitio web o te
                                        suscribas a nuestros servicios.
                                    </ul>
                                    <li
                                        class="mt-1 text-sm text-gray-800 dark:text-gray-400"
                                    >
                                        Responsabilidades del suscriptor
                                    </li>
                                    <ul
                                        class="mt-1 text-xs text-gray-600 dark:text-gray-200"
                                    >
                                        Como suscriptor, eres responsable de
                                        mantener la confidencialidad de tu
                                        cuenta y contraseña y de restringir el
                                        acceso a tu computadora, y aceptas la
                                        responsabilidad de todas las actividades
                                        que ocurran bajo tu cuenta o contraseña.
                                    </ul>
                                    <li
                                        class="mt-1 text-sm text-gray-800 dark:text-gray-400"
                                    >
                                        Cambios en los términos del servicio
                                    </li>
                                    <ul
                                        class="mt-1 text-xs text-gray-600 dark:text-gray-200"
                                    >
                                        Nos reservamos el derecho de cambiar
                                        estos Términos del Servicio en cualquier
                                        momento. Te recomendamos revisar
                                        regularmente estos términos para estar
                                        al tanto de cualquier cambio.
                                    </ul>
                                </ol>
                                <p
                                    class="mt-1 text-sm font-semibold text-gray-800 dark:text-gray-400"
                                >
                                    Esperamos que disfrutes como cofrade del
                                    Paso Blanco de Huercal-Overa en nuestra
                                    hermandad y agradecemos tu apoyo continuo.
                                    Tu contribución es invaluable para nosotros
                                    y para nuestra misión.
                                </p>
                                <p
                                    class="mt-1 font-semibold text-sm text-gray-800 dark:text-gray-400"
                                >
                                    Fecha de entrada en vigor: 24 de junio de
                                    2023.
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
