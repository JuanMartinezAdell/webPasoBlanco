<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DangerButton from "@/Components/DangerButton.vue";
import { usePage } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

defineProps({
    plan: {
        type: Object,
        required: true,
    },
    subscription: {
        type: Object,
        required: true,
    },
});

//console.log(plan.name);

const cancel = (slug) => {
    //console.log("Slug Cancel:", slug);
    if (slug) {
        router.visit(route("subscription.cancel", { slug }), {
            method: "delete",
        });
    } else {
        console.error("Slug is undefined");
    }
};
</script>

<template>
    <AppLayout title="Plans">
        <!--   Pasarlo a mode noche cambiarlo a:
               <div class="antialiased w-full h-full bg-black text-gray-400 font-inter p-10">
                    <div class="container px-4 mx-auto"
          </p>-->
        <div class="antialiased w-full h-full text-gray-400 font-inter p-10">
            <div class="container px-4 mx-auto">
                <div>
                    <div id="title" class="text-center my-10">
                        <h1 class="font-bold text-4xl text-black">
                            Actualmente estas subscrito a un plan
                            {{ plan.name }}
                        </h1>
                        <p class="text-light text-gray-500 text-xl">
                            Información de tu Subscripción.
                        </p>
                    </div>
                    <div
                        class="grid grid-cols-1 justify-center gap-8 pt-10 pb-60"
                    >
                        <div
                            id="plan"
                            class="rounded-lg shadow-xl text-center overflow-hidden w-full transform hover:shadow-2xl hover:scale-105 transition duration-200 ease-in"
                        >
                            <div
                                id="title"
                                class="w-full py-5 border-b border-gray-800"
                            >
                                <h2 class="font-bold text-3xl text-black">
                                    Cuota
                                    {{ plan.name }}
                                </h2>
                                <div>
                                    <div class="relative flex justify-around">
                                        <div class="flex items-end">
                                            <span
                                                class="text-8xl text-red-800 font-bold leading-0"
                                                >{{ plan.price / 100 }}</span
                                            >
                                            <div class="pb-2">
                                                <span
                                                    class="block text-5xl text-gray-700 font-bold"
                                                    >€</span
                                                >
                                                <span
                                                    class="block text-lg text-orange-500 font-bold"
                                                >
                                                    {{ plan.slug }}</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="content" class="">
                                <div id="icon" class="my-5">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-12 w-12 mx-auto fill-stroke text-red-600"
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
                                <div
                                    id="contain"
                                    class="leading-8 mb-10 text-lg font-light"
                                >
                                    <ul>
                                        <li class="space-x-2">
                                            <span
                                                class="text-red-500 font-semibold"
                                                >&check;</span
                                            >
                                            <span
                                                v-if="plan.name === 'GRATUITO'"
                                                class="text-red-800 font-bold"
                                            >
                                                Actualmente has cancelado tu
                                                subscription. Por lo que no se
                                                renovara tu cuota
                                                automáticamente.
                                            </span>
                                            <span v-else>
                                                Tu plan se
                                                {{ plan.name }} renovara de
                                                forma automática
                                            </span>
                                        </li>
                                        <li class="space-x-2">
                                            <span
                                                class="text-red-500 font-semibold"
                                                >&check;</span
                                            >
                                            <span
                                                v-if="plan.name === 'GRATUITO'"
                                                class="text-red-800 font-bold"
                                            >
                                                Si quieres ser Miembro de la
                                                Hermandad de nuevo haz efectiva
                                                tu cuota cuando finalice
                                            </span>
                                            <span v-else
                                                >Puedes cambiar el tipo de Plan
                                                o Cancelar tu Subscripción,
                                                simplemente tienes que pulsar el
                                                Botón de Cancelar cuando lo
                                                desees</span
                                            >
                                        </li>
                                        <li class="space-x-2">
                                            <span
                                                class="text-red-500 font-semibold"
                                                >&check;</span
                                            >
                                            <span
                                                v-if="plan.name === 'GRATUITO'"
                                                class="text-red-800 font-bold"
                                            >
                                                Puedes volver activar tu
                                                Subscripción cuando lo desees
                                            </span>
                                            <span v-else>
                                                Si cancelas tu Subscripción
                                                tendrás la cuota activa todo el
                                                periodo {{ plan.name }} desde
                                                que iniciaste el pago.
                                            </span>
                                        </li>
                                        <li class="space-x-2">
                                            <span
                                                class="text-red-500 font-semibold"
                                                >&check;</span
                                            >
                                            <span
                                                v-if="
                                                    plan.name === 'GRATUITO' &&
                                                    subscription &&
                                                    subscription.ends_at !==
                                                        null
                                                "
                                                class="text-red-800 text-2xl font-bold"
                                            >
                                                Tu última subscripcion vence el:
                                                {{
                                                    new Date(
                                                        subscription.ends_at
                                                    ).toLocaleDateString()
                                                }}
                                                hasta esta fecha tienes tu cuota
                                                activa y eres mienbro de la
                                                Hermandad.
                                            </span>
                                            <span v-else>
                                                Este es un plan gratuito ya que
                                                no tienes una cuota activa y
                                                tienes limitaciones, puedes
                                                activar o ingresar tu cuota
                                                cuadno lo desees.
                                            </span>
                                        </li>
                                    </ul>

                                    <div id="choose" class="w-full mt-8 px-6">
                                        <DangerButton
                                            @click.prevent="
                                                () => cancel(plan.slug)
                                            "
                                        >
                                            <span
                                                class="text-center text-white font-semibold"
                                            >
                                                Cancelar o Cambiar Subcripción
                                                💳
                                            </span>
                                        </DangerButton>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style></style>
