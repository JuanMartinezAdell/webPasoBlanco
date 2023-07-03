<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

import AuthenticationCardNew from "@/NewComponents/AuthenticationCardVue.vue";
import AuthenticationCardLogoNew from "@/NewComponents/AuthenticationCardLogo.vue";
import FooterVue from "@/NewComponents/FooterVue.vue";
import NavLink from "@/Components/NavLink.vue";
import SecundaryButton from "@/NewComponents/SecundaryButton.vue";
import ProductVue from "@/NewComponents/ProductVue.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

import PlanMethod from "@/NewComponents/PlanMethod.vue";

// Carousel Swiper
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";

import "swiper/css/effect-fade";
import "swiper/css/navigation";
import "swiper/css/pagination";
import { EffectFade, Navigation, Pagination } from "swiper";

import { ref } from "vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    products: Object,
    plans: Array,
    subscription: Object,
});

const modules = [EffectFade, Navigation, Pagination];

//Acordeon
const isOpen = ref(0);
const collapses = ref([
    {
        title: "Rezo Santo Rosario Ermita Hermandad ",
        text: "Esta semana con las cruces de Mayo se rezara 🙏 el Santo Rosario todos los días",
    },
    {
        title: "Cruces de Mayo",
        text: "Este fin de semana Paso Blanco montara barra en colaboracion con las otras hermandades 🌻",
    },
    {
        title: "También contamos con Bizum ☎️ para tus gestiones",
        text: "Puedes hacer tus donativos a la Hermandad atraves tel:+24300 0000 📞 via Bizum",
    },
]);

const isAuthenticated = computed(() => usePage().props.auth.user === null);
</script>

<template>
    <AppLayout title="Welcome">
        <!-- Carousel -->
        <div class="h-screen">
            <div
                class="relative h-full bg-gray-100 font-sans text-base text-black"
            >
                <div class="h-screen">
                    <div
                        class="relative h-full bg-gray-100 font-sans text-base text-black"
                    >
                        <swiper
                            :spaceBetween="30"
                            :effect="'fade'"
                            :navigation="true"
                            :pagination="{
                                clickable: true,
                            }"
                            :modules="modules"
                            class="mySwiper w-full h-full"
                        >
                            <swiper-slide class="bg-center bg-cover h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/angustias.jpg"
                                />
                            </swiper-slide>
                            <swiper-slide class="bg-center bg-cover h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/caida.jpg"
                                />
                            </swiper-slide>
                            <swiper-slide class="h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/cristosangre.jpg"
                                />
                            </swiper-slide>
                            <swiper-slide class="h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/sanjuanbandera.jpg"
                                />
                            </swiper-slide>
                            <swiper-slide class="h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/angustias2.jpg"
                                />
                            </swiper-slide>
                            <swiper-slide class="bg-center bg-cover h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/cautivo.jpg"
                                />
                            </swiper-slide>
                            <swiper-slide class="bg-center bg-cover h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/caida2.jpg"
                                />
                            </swiper-slide>
                            <swiper-slide class="bg-center bg-cover h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/sanjuan.jpg"
                                />
                            </swiper-slide>
                            <swiper-slide class="bg-center bg-cover h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/virgen.jpg"
                                />
                            </swiper-slide>
                            <swiper-slide class="bg-center bg-cover h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/cristo.jpg"
                                />
                            </swiper-slide>
                            <swiper-slide class="bg-center bg-cover h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/angustias4.jpg"
                                />
                            </swiper-slide>
                            <swiper-slide class="bg-center bg-cover h-full">
                                <img
                                    class="w-full h-full object-cover"
                                    src="/image/carousel/12.jpg"
                                />
                            </swiper-slide>
                        </swiper>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo paso -->
        <div class="container mx-auto px-6 py-6 mt-8 text-center">
            <button
                class="rounded-lg px-6 p-2 pt-4 text-center text-sm font-medium capitalize leading-5 focus:outline-none lg:mx-0 lg:w-auto"
            >
                <img
                    src="/image/logo/logopaso.png"
                    alt="logo Paso Blanco"
                    width="300"
                    height="500"
                />
            </button>
            <h1
                class="text-3xl font-bold text-gray-800 dark:text-white xl:text-4xl"
            >
                Paso Blanco de Huercal-Overa
            </h1>
            <p class="mt-6 text-gray-500 dark:text-gray-300">
                Real Hermandad de Nuestra Señora de las Angustias y San Juan
            </p>

            <NavLink
                v-show="$page.props.auth.user"
                class="mt-6 inline-flex items-center px-4 py-2 pt-2 bg-blue-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150 px-6 py-2.5 text-center text-sm font-medium capitalize leading-5 text-white focus:outline-none lg:mx-0 lg:w-auto transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-800 duration-200"
                :href="route('subscription.plan')"
                :active="route().current('subscription.plan')"
            >
                Hazte hermano
            </NavLink>
            <p class="mt-3 text-sm text-gray-400">
                Suscripciones Cuotas Paso Blanco
            </p>
        </div>

        <!-- Seccion paga tu cuota -->
        <div class="bg-white dark:bg-gray-900" v-show="isAuthenticated">
            <div class="container mx-auto px-6 py-8">
                <h1
                    class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl"
                >
                    Precios Cuotas
                </h1>

                <p
                    class="mx-auto mt-4 max-w-2xl text-center text-gray-500 dark:text-gray-300 xl:mt-6"
                >
                    Paga tu cuota online si te resulta más comodo y se miembro
                    de nuestra gran hermandad. Disfruta de los beneficios de la
                    paltaforma online estando informado en todo momento y
                    teniendo acceso a todos los recursos del paso desde
                    fototgrafias hasta las últimas novedades y eventos.
                </p>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-evenly gap-10 pt-10"
                >
                    <PlanMethod
                        v-for="plan in plans"
                        :key="plan.slug"
                        :plan="plan"
                    />
                </div>
            </div>
        </div>

        <!-- Seccion Noticias y titulares -->
        <section class="bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6 py-10">
                <div class="text-center">
                    <h1
                        class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl"
                    >
                        Blog Paso Blanco
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

                    <p class="mx-auto mt-4 max-w-lg text-gray-500">
                        Ultimas noticias de nuestra parroquia de Huercal-Overa y
                        Semana Santa. Accede a nuestro blog para ver todas las
                        noticias.
                    </p>
                </div>

                <div
                    class="mt-8 grid grid-cols-1 gap-8 md:mt-16 md:grid-cols-2 xl:grid-cols-3"
                >
                    <div>
                        <div class="relative">
                            <img
                                class="h-64 w-full rounded-lg object-cover object-center lg:h-80"
                                src="/image/gallery/cartel/cultoParoquia.jpg"
                                alt=""
                            />

                            <div
                                class="absolute bottom-0 flex bg-white p-3 dark:bg-gray-900"
                            >
                                <img
                                    class="h-10 w-10 rounded-full object-cover object-center"
                                    src="/image/logo/logopaso.png"
                                    alt=""
                                />

                                <div class="mx-4">
                                    <h1
                                        class="text-sm text-gray-700 dark:text-gray-200"
                                    >
                                        Parroquia
                                    </h1>
                                    <p
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                    >
                                        Huercal-Overa
                                    </p>
                                </div>
                            </div>
                        </div>

                        <h1
                            class="mt-6 text-xl font-semibold text-gray-800 dark:text-white"
                        >
                            Primer día del Triduo a Nuestro Padre Jesús de
                            Pasión Cautivo
                        </h1>

                        <hr class="my-6 w-32 text-blue-500" />

                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Mañana jueves, comienza el triduo a Nuestro Padre
                            Jesús de Pasión Cautivo. Será jueves, viernes y
                            sábado a las 19,30...
                        </p>

                        <a
                            href="#"
                            class="mt-4 inline-block text-blue-500 underline hover:text-blue-400"
                            >Leer más</a
                        >
                    </div>

                    <div>
                        <div class="relative">
                            <img
                                class="h-64 w-full rounded-lg object-cover object-center lg:h-80"
                                src="/image/blog/premio.jpg"
                                alt=""
                            />

                            <div
                                class="absolute bottom-0 flex bg-white p-3 dark:bg-gray-900"
                            >
                                <img
                                    class="h-10 w-10 rounded-full object-cover object-center"
                                    src="/image/logo/logopaso.png"
                                    alt=""
                                />

                                <div class="mx-4">
                                    <h1
                                        class="text-sm text-gray-700 dark:text-gray-200"
                                    >
                                        Noticias
                                    </h1>
                                    <p
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                    >
                                        La voz de Almería
                                    </p>
                                </div>
                            </div>
                        </div>

                        <h1
                            class="mt-6 text-xl font-semibold text-gray-800 dark:text-white"
                        >
                            Premio Semana Santa
                        </h1>

                        <hr class="my-6 w-32 text-blue-500" />

                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Ayer 21 de julio, la Semana Santa de Huércal-Overa
                            fue distinguida con el Premio Sociedad en la XIII
                            edición de los Premios Levante organizado por La Voz
                            de Almería, Cadena Ser y los 40...
                        </p>

                        <a
                            href="#"
                            class="mt-4 inline-block text-blue-500 underline hover:text-blue-400"
                            >Read more</a
                        >
                    </div>

                    <div>
                        <div class="relative">
                            <img
                                class="h-64 w-full rounded-lg object-cover object-center lg:h-80"
                                src="/image/gallery/cartel/cultoParoquia.jpg"
                                alt=""
                            />

                            <div
                                class="absolute bottom-0 flex bg-white p-3 dark:bg-gray-900"
                            >
                                <img
                                    class="h-10 w-10 rounded-full object-cover object-center"
                                    src="/image/logo/logopaso.png"
                                    alt=""
                                />

                                <div class="mx-4">
                                    <h1
                                        class="text-sm text-gray-800 dark:text-white"
                                    >
                                        Parroquia
                                    </h1>
                                    <p
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                    >
                                        Huercal-Overa
                                    </p>
                                </div>
                            </div>
                        </div>

                        <h1
                            class="mt-6 text-xl font-semibold text-gray-800 dark:text-white"
                        >
                            Las hermanitas de los Ancianos Desamparados
                        </h1>

                        <hr class="my-6 w-32 text-blue-500" />

                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Las hermanitas de los Ancianos Desamparados de
                            Huercal-Overa piden alimentos previas fiestas
                            navideñas...
                        </p>

                        <a
                            href="#"
                            class="mt-4 inline-block text-blue-500 underline hover:text-blue-400"
                            >Lee más</a
                        >
                    </div>
                </div>
            </div>
        </section>

        <!-- Acceso Galeria Fotografica -->
        <section class="bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6 py-10">
                <h1
                    class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl"
                >
                    Fotos y Videos
                </h1>

                <p class="mt-4 text-center text-gray-500 dark:text-gray-300">
                    Accede al repositorio de fotos y videos del Paso Blanco de
                    Huercal-overa
                </p>

                <div
                    class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-12"
                >
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <Link
                                href="/gallery"
                                data-mdb-ripple="true"
                                data-mdb-ripple-color="light"
                            >
                                <img
                                    class="rounded-t-lg"
                                    src="/image/gallery/cartel/CARTEL-SEMANA-SANTA-2023.jpg"
                                    alt=""
                                />
                            </Link>
                            <div class="p-6">
                                <h5
                                    class="text-gray-900 text-xl font-medium mb-2"
                                >
                                    Semana Santa
                                </h5>
                                <p class="text-gray-700 text-base mb-4">
                                    Accede al repositorio de fotografias del
                                    Paso Blanco
                                </p>
                                <Link
                                    href="/gallery"
                                    type="button"
                                    class="inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150"
                                >
                                    Accede
                                </Link>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <a
                                href="#!"
                                data-mdb-ripple="true"
                                data-mdb-ripple-color="light"
                            >
                                <img
                                    class="rounded-t-lg"
                                    src="/image/gallery/cartel/feria.jpg"
                                    alt=""
                                />
                            </a>
                            <div class="p-6">
                                <h5
                                    class="text-gray-900 text-xl font-medium mb-2"
                                >
                                    Eventos
                                </h5>
                                <p class="text-gray-700 text-base mb-4">
                                    Accede al repositorio de fotos de la Caseta
                                    del Paso Blanco
                                </p>
                                <button
                                    type="button"
                                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                >
                                    Accede
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <a
                                href="#!"
                                data-mdb-ripple="true"
                                data-mdb-ripple-color="light"
                            >
                                <img
                                    class="rounded-t-lg"
                                    src="/image/gallery/cartel/cultoParoquia.jpg"
                                    alt=""
                                />
                            </a>
                            <div class="p-6">
                                <h5
                                    class="text-gray-900 text-xl font-medium mb-2"
                                >
                                    Eventos
                                </h5>
                                <p class="text-gray-700 text-base mb-4">
                                    Accede al repositorio de fotos de todos lo
                                    eventos que se estan realizando en la
                                    hermandad.
                                </p>
                                <button
                                    type="button"
                                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                >
                                    Accede
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pasos, redes sociales, rincon del costalero-->
        <section id="RRSS" class="bg-white dark:bg-gray-900">
            <div class="h-[32rem] bg-gray-100 dark:bg-gray-800">
                <div class="container mx-auto px-6 py-10">
                    <h1
                        class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl"
                    >
                        Nuestros Pasos
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
                        Siguenosa en las redes sociales y accede al rincon del
                        costalero para estar informado de los proximos ensayos,
                        convivencias y al repositorio fotografico de tu paso.
                    </p>
                </div>
            </div>

            <div
                class="container mx-auto -mt-72 px-6 py-10 sm:-mt-80 md:-mt-96"
            >
                <div
                    class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-16 xl:grid-cols-3"
                >
                    <div
                        class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6"
                    >
                        <img
                            class="aspect-square w-full rounded-xl object-cover"
                            src="/image/carousel/angustias.jpg"
                            alt=""
                        />

                        <h1
                            class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white"
                        >
                            Nuestra Señora de las Angustias
                        </h1>

                        <p
                            class="mt-2 capitalize text-gray-500 dark:text-gray-300"
                        >
                            Obra de Francisco Bellver y Collazos.
                        </p>

                        <a
                            href="http://www.pasoblanco.es/wp/"
                            class="mt-2 capitalize inline-block text-blue-500 underline hover:text-blue-400"
                            >Web</a
                        >

                        <div class="-mx-2 mt-3 flex">
                            <a
                                href="https://www.facebook.com/angustiashuercalovera"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm4 7.278V4.5h-2.286c-2.1 0-3.428 1.6-3.428 3.889v1.667H8v2.777h2.286V19.5h2.857v-6.667h2.286L16 10.056h-2.857V8.944c0-1.11.572-1.666 1.714-1.666H16z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.instagram.com/pasoblanco_huercal_overa/"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Github"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.youtube.com/channel/UC9-vTwR6HDH5Fpd-r6YEaFg?app=desktop"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.294 7h-.589l-1.101.013c-1.48.024-3.709.092-4.465.285a1.836 1.836 0 0 0-1.326 1.263c-.181.644-.258 1.69-.29 2.46l-.022.815v.328l.008.426c.022.764.09 2.088.304 2.849.172.614.68 1.098 1.326 1.263.736.188 2.867.257 4.346.283L11.89 17l1.159-.008c1.453-.019 3.993-.082 4.811-.29a1.836 1.836 0 0 0 1.327-1.263c.21-.75.28-2.048.302-2.817l.01-.528-.003-.403c-.012-.67-.066-2.265-.31-3.13a1.836 1.836 0 0 0-1.326-1.263c-.661-.169-2.45-.242-3.878-.274L12.294 7zm-1.828 2.89l3.92 2.11-3.92 2.11V9.89z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://twitter.com/pasoblancoho"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.624 5h-2.038c-.092.722-.259 1.317-.503 1.784a3.846 3.846 0 0 1-.967 1.202c-.4.334-1.053.59-1.616.768v1.983h1.947v4.91c0 .64.069 1.128.206 1.466.138.336.383.654.74.954.355.297.785.529 1.288.691.503.16.89.242 1.545.242.577 0 1.114-.058 1.61-.17.497-.113 1.052-.312 1.664-.593v-2.208c-.718.46-1.44.69-2.165.69a2.11 2.11 0 0 1-1.088-.278c-.239-.137-.458-.375-.546-.604-.064-.167-.076-.46-.077-.92v-4.18h3.313v-2.5h-3.313V5z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div
                        class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6"
                    >
                        <img
                            class="aspect-square w-full rounded-xl object-cover"
                            src="/image/carousel/caida.jpg"
                            alt=""
                        />

                        <h1
                            class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white"
                        >
                            Jesus en su tercera Caida
                        </h1>

                        <p
                            class="mt-2 capitalize text-gray-500 dark:text-gray-300"
                        >
                            Obra escultor madrileño Alanguas Puchet
                        </p>

                        <a
                            href="http://www.pasoblanco.es/wp/"
                            class="mt-2 capitalize inline-block text-blue-500 underline hover:text-blue-400"
                            >Web</a
                        >

                        <div class="-mx-2 mt-3 flex">
                            <a
                                href="https://www.facebook.com/profile.php?id=100066691922831"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm4 7.278V4.5h-2.286c-2.1 0-3.428 1.6-3.428 3.889v1.667H8v2.777h2.286V19.5h2.857v-6.667h2.286L16 10.056h-2.857V8.944c0-1.11.572-1.666 1.714-1.666H16z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.instagram.com/pasoblanco_huercal_overa/"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Github"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.youtube.com/channel/UC9-vTwR6HDH5Fpd-r6YEaFg?app=desktop"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.294 7h-.589l-1.101.013c-1.48.024-3.709.092-4.465.285a1.836 1.836 0 0 0-1.326 1.263c-.181.644-.258 1.69-.29 2.46l-.022.815v.328l.008.426c.022.764.09 2.088.304 2.849.172.614.68 1.098 1.326 1.263.736.188 2.867.257 4.346.283L11.89 17l1.159-.008c1.453-.019 3.993-.082 4.811-.29a1.836 1.836 0 0 0 1.327-1.263c.21-.75.28-2.048.302-2.817l.01-.528-.003-.403c-.012-.67-.066-2.265-.31-3.13a1.836 1.836 0 0 0-1.326-1.263c-.661-.169-2.45-.242-3.878-.274L12.294 7zm-1.828 2.89l3.92 2.11-3.92 2.11V9.89z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://twitter.com/pasoblancoho"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.624 5h-2.038c-.092.722-.259 1.317-.503 1.784a3.846 3.846 0 0 1-.967 1.202c-.4.334-1.053.59-1.616.768v1.983h1.947v4.91c0 .64.069 1.128.206 1.466.138.336.383.654.74.954.355.297.785.529 1.288.691.503.16.89.242 1.545.242.577 0 1.114-.058 1.61-.17.497-.113 1.052-.312 1.664-.593v-2.208c-.718.46-1.44.69-2.165.69a2.11 2.11 0 0 1-1.088-.278c-.239-.137-.458-.375-.546-.604-.064-.167-.076-.46-.077-.92v-4.18h3.313v-2.5h-3.313V5z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div
                        class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6"
                    >
                        <img
                            class="aspect-square w-full rounded-xl object-cover"
                            src="/image/carousel/sanjuan.jpg"
                            alt=""
                        />

                        <h1
                            class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white"
                        >
                            San Juan
                        </h1>

                        <p
                            class="mt-2 capitalize text-gray-500 dark:text-gray-300"
                        >
                            Obra del escultor murciano José Antonio Hernández
                            Navarro
                        </p>

                        <a
                            href="#"
                            class="mt-2 capitalize inline-block text-blue-500 underline hover:text-blue-400"
                            >Web</a
                        >

                        <div class="-mx-2 mt-3 flex">
                            <a
                                href="https://www.facebook.com/people/San-Juan-Evangelista-Hu%C3%A9rcal-Overa/100066691922831/"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm4 7.278V4.5h-2.286c-2.1 0-3.428 1.6-3.428 3.889v1.667H8v2.777h2.286V19.5h2.857v-6.667h2.286L16 10.056h-2.857V8.944c0-1.11.572-1.666 1.714-1.666H16z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.instagram.com/pasoblanco_huercal_overa/"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Github"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.youtube.com/channel/UC9-vTwR6HDH5Fpd-r6YEaFg?app=desktop"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.294 7h-.589l-1.101.013c-1.48.024-3.709.092-4.465.285a1.836 1.836 0 0 0-1.326 1.263c-.181.644-.258 1.69-.29 2.46l-.022.815v.328l.008.426c.022.764.09 2.088.304 2.849.172.614.68 1.098 1.326 1.263.736.188 2.867.257 4.346.283L11.89 17l1.159-.008c1.453-.019 3.993-.082 4.811-.29a1.836 1.836 0 0 0 1.327-1.263c.21-.75.28-2.048.302-2.817l.01-.528-.003-.403c-.012-.67-.066-2.265-.31-3.13a1.836 1.836 0 0 0-1.326-1.263c-.661-.169-2.45-.242-3.878-.274L12.294 7zm-1.828 2.89l3.92 2.11-3.92 2.11V9.89z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://twitter.com/pasoblancoho"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.624 5h-2.038c-.092.722-.259 1.317-.503 1.784a3.846 3.846 0 0 1-.967 1.202c-.4.334-1.053.59-1.616.768v1.983h1.947v4.91c0 .64.069 1.128.206 1.466.138.336.383.654.74.954.355.297.785.529 1.288.691.503.16.89.242 1.545.242.577 0 1.114-.058 1.61-.17.497-.113 1.052-.312 1.664-.593v-2.208c-.718.46-1.44.69-2.165.69a2.11 2.11 0 0 1-1.088-.278c-.239-.137-.458-.375-.546-.604-.064-.167-.076-.46-.077-.92v-4.18h3.313v-2.5h-3.313V5z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div
                        class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6"
                    >
                        <img
                            class="aspect-square w-full rounded-xl object-cover"
                            src="/image/carousel/cautivo.jpg"
                            alt=""
                        />

                        <h1
                            class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white"
                        >
                            Cautivo
                        </h1>

                        <p
                            class="mt-2 capitalize text-gray-500 dark:text-gray-300"
                        >
                            Obra del escultor Sevillano José Antonio Navarro
                            Arteaga
                        </p>

                        <a
                            href="#"
                            class="mt-2 capitalize inline-block text-blue-500 underline hover:text-blue-400"
                            >Blog Cautivo</a
                        >

                        <div class="-mx-2 mt-3 flex">
                            <a
                                href="https://www.facebook.com/profile.php?id=100079486881528"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm4 7.278V4.5h-2.286c-2.1 0-3.428 1.6-3.428 3.889v1.667H8v2.777h2.286V19.5h2.857v-6.667h2.286L16 10.056h-2.857V8.944c0-1.11.572-1.666 1.714-1.666H16z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.instagram.com/pasoblanco_huercal_overa/"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Github"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.youtube.com/channel/UC9-vTwR6HDH5Fpd-r6YEaFg?app=desktop"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.294 7h-.589l-1.101.013c-1.48.024-3.709.092-4.465.285a1.836 1.836 0 0 0-1.326 1.263c-.181.644-.258 1.69-.29 2.46l-.022.815v.328l.008.426c.022.764.09 2.088.304 2.849.172.614.68 1.098 1.326 1.263.736.188 2.867.257 4.346.283L11.89 17l1.159-.008c1.453-.019 3.993-.082 4.811-.29a1.836 1.836 0 0 0 1.327-1.263c.21-.75.28-2.048.302-2.817l.01-.528-.003-.403c-.012-.67-.066-2.265-.31-3.13a1.836 1.836 0 0 0-1.326-1.263c-.661-.169-2.45-.242-3.878-.274L12.294 7zm-1.828 2.89l3.92 2.11-3.92 2.11V9.89z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://twitter.com/pasoblancoho"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.624 5h-2.038c-.092.722-.259 1.317-.503 1.784a3.846 3.846 0 0 1-.967 1.202c-.4.334-1.053.59-1.616.768v1.983h1.947v4.91c0 .64.069 1.128.206 1.466.138.336.383.654.74.954.355.297.785.529 1.288.691.503.16.89.242 1.545.242.577 0 1.114-.058 1.61-.17.497-.113 1.052-.312 1.664-.593v-2.208c-.718.46-1.44.69-2.165.69a2.11 2.11 0 0 1-1.088-.278c-.239-.137-.458-.375-.546-.604-.064-.167-.076-.46-.077-.92v-4.18h3.313v-2.5h-3.313V5z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div
                        class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6"
                    >
                        <img
                            class="aspect-square w-full rounded-xl object-cover"
                            src="/image/carousel/cristosangre.jpg"
                            alt=""
                        />

                        <h1
                            class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white"
                        >
                            Cristo de la Sangre
                        </h1>

                        <p
                            class="mt-2 capitalize text-gray-500 dark:text-gray-300"
                        >
                            Obra de Juan Gonzalez Moreno
                        </p>

                        <a
                            href="http://www.pasoblanco.es/wp/"
                            class="mt-2 capitalize inline-block text-blue-500 underline hover:text-blue-400"
                            >Blog Cristo</a
                        >

                        <div class="-mx-2 mt-3 flex">
                            <a
                                href="https://m.facebook.com/people/Cristo-de-la-Sangre-Hu%C3%A9rcal-Overa/100064547028332/"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm4 7.278V4.5h-2.286c-2.1 0-3.428 1.6-3.428 3.889v1.667H8v2.777h2.286V19.5h2.857v-6.667h2.286L16 10.056h-2.857V8.944c0-1.11.572-1.666 1.714-1.666H16z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.instagram.com/pasoblanco_huercal_overa/"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Github"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.youtube.com/channel/UC9-vTwR6HDH5Fpd-r6YEaFg?app=desktop"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.294 7h-.589l-1.101.013c-1.48.024-3.709.092-4.465.285a1.836 1.836 0 0 0-1.326 1.263c-.181.644-.258 1.69-.29 2.46l-.022.815v.328l.008.426c.022.764.09 2.088.304 2.849.172.614.68 1.098 1.326 1.263.736.188 2.867.257 4.346.283L11.89 17l1.159-.008c1.453-.019 3.993-.082 4.811-.29a1.836 1.836 0 0 0 1.327-1.263c.21-.75.28-2.048.302-2.817l.01-.528-.003-.403c-.012-.67-.066-2.265-.31-3.13a1.836 1.836 0 0 0-1.326-1.263c-.661-.169-2.45-.242-3.878-.274L12.294 7zm-1.828 2.89l3.92 2.11-3.92 2.11V9.89z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://twitter.com/pasoblancoho"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.624 5h-2.038c-.092.722-.259 1.317-.503 1.784a3.846 3.846 0 0 1-.967 1.202c-.4.334-1.053.59-1.616.768v1.983h1.947v4.91c0 .64.069 1.128.206 1.466.138.336.383.654.74.954.355.297.785.529 1.288.691.503.16.89.242 1.545.242.577 0 1.114-.058 1.61-.17.497-.113 1.052-.312 1.664-.593v-2.208c-.718.46-1.44.69-2.165.69a2.11 2.11 0 0 1-1.088-.278c-.239-.137-.458-.375-.546-.604-.064-.167-.076-.46-.077-.92v-4.18h3.313v-2.5h-3.313V5z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div
                        class="flex flex-col items-center rounded-xl border p-4 dark:border-gray-700 sm:p-6"
                    >
                        <img
                            class="aspect-square w-full rounded-xl object-cover"
                            src="/image/logo/logopaso.png"
                            alt=""
                        />

                        <h1
                            class="mt-4 text-2xl font-semibold capitalize text-gray-700 dark:text-white"
                        >
                            Paso Blanco
                        </h1>

                        <p
                            class="mt-2 capitalize text-gray-500 dark:text-gray-300"
                        >
                            Real Hermandad Paso Blanco de Huercal-Overa
                        </p>

                        <a
                            href="http://www.pasoblanco.es/wp/"
                            class="mt-2 capitalize inline-block text-blue-500 underline hover:text-blue-400"
                            >Web</a
                        >

                        <div class="-mx-2 mt-3 flex">
                            <a
                                href="https://www.facebook.com/pasoblancohuercalovera"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm4 7.278V4.5h-2.286c-2.1 0-3.428 1.6-3.428 3.889v1.667H8v2.777h2.286V19.5h2.857v-6.667h2.286L16 10.056h-2.857V8.944c0-1.11.572-1.666 1.714-1.666H16z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.instagram.com/pasoblanco_huercal_overa/"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Github"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.6274 0 12 5.3726 12 12s-5.3726 12-12 12S0 18.6274 0 12 5.3726 0 12 0zm3.115 4.5h-6.23c-2.5536 0-4.281 1.6524-4.3805 4.1552L4.5 8.8851v6.1996c0 1.3004.4234 2.4193 1.2702 3.2359.7582.73 1.751 1.1212 2.8818 1.1734l.2633.006h6.1694c1.3004 0 2.389-.4234 3.1754-1.1794.762-.734 1.1817-1.7576 1.2343-2.948l.0056-.2577V8.8851c0-1.2702-.4234-2.3589-1.2097-3.1452-.7338-.762-1.7575-1.1817-2.9234-1.2343l-.252-.0056zM8.9152 5.8911h6.2299c.9072 0 1.6633.2722 2.2076.8166.4713.499.7647 1.1758.8103 1.9607l.0063.2167v6.2298c0 .9375-.3327 1.6936-.877 2.2077-.499.4713-1.176.7392-1.984.7806l-.2237.0057H8.9153c-.9072 0-1.6633-.2722-2.2076-.7863-.499-.499-.7693-1.1759-.8109-2.0073l-.0057-.2306V8.885c0-.9073.2722-1.6633.8166-2.2077.4712-.4713 1.1712-.7392 1.9834-.7806l.2242-.0057h6.2299-6.2299zM12 8.0988c-2.117 0-3.871 1.7238-3.871 3.871A3.8591 3.8591 0 0 0 12 15.8408c2.1472 0 3.871-1.7541 3.871-3.871 0-2.117-1.754-3.871-3.871-3.871zm0 1.3911c1.3609 0 2.4798 1.119 2.4798 2.4799 0 1.3608-1.119 2.4798-2.4798 2.4798-1.3609 0-2.4798-1.119-2.4798-2.4798 0-1.361 1.119-2.4799 2.4798-2.4799zm4.0222-2.3589a.877.877 0 1 0 0 1.754.877.877 0 0 0 0-1.754z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.youtube.com/channel/UC9-vTwR6HDH5Fpd-r6YEaFg?app=desktop"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.294 7h-.589l-1.101.013c-1.48.024-3.709.092-4.465.285a1.836 1.836 0 0 0-1.326 1.263c-.181.644-.258 1.69-.29 2.46l-.022.815v.328l.008.426c.022.764.09 2.088.304 2.849.172.614.68 1.098 1.326 1.263.736.188 2.867.257 4.346.283L11.89 17l1.159-.008c1.453-.019 3.993-.082 4.811-.29a1.836 1.836 0 0 0 1.327-1.263c.21-.75.28-2.048.302-2.817l.01-.528-.003-.403c-.012-.67-.066-2.265-.31-3.13a1.836 1.836 0 0 0-1.326-1.263c-.661-.169-2.45-.242-3.878-.274L12.294 7zm-1.828 2.89l3.92 2.11-3.92 2.11V9.89z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://twitter.com/pasoblancoho"
                                class="mx-2 text-gray-600 transition-colors duration-300 hover:text-blue-500 dark:text-gray-300 dark:hover:text-blue-400"
                                aria-label="Facebook"
                            >
                                <svg
                                    class="h-6 w-6 fill-current"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M12 0c6.627 0 12 5.373 12 12s-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0zm.624 5h-2.038c-.092.722-.259 1.317-.503 1.784a3.846 3.846 0 0 1-.967 1.202c-.4.334-1.053.59-1.616.768v1.983h1.947v4.91c0 .64.069 1.128.206 1.466.138.336.383.654.74.954.355.297.785.529 1.288.691.503.16.89.242 1.545.242.577 0 1.114-.058 1.61-.17.497-.113 1.052-.312 1.664-.593v-2.208c-.718.46-1.44.69-2.165.69a2.11 2.11 0 0 1-1.088-.278c-.239-.137-.458-.375-.546-.604-.064-.167-.076-.46-.077-.92v-4.18h3.313v-2.5h-3.313V5z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Evangelio -->
        <section id="lecturas" class="bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6 py-10">
                <h1
                    class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl"
                >
                    Evangelio y lecturas del día
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

                <div class="mx-auto mt-16 flex max-w-6xl items-start">
                    <swiper
                        :pagination="{
                            type: 'fraction',
                        }"
                        :navigation="true"
                        :modules="modules"
                        class="mySwiper"
                    >
                        <swiper-slide>
                            <p
                                class="flex items-center text-center text-gray-500 p-4 lg:mx-8 lg:p-4 dark:text-white"
                            >
                                Virgen de las Angustias. Tú que sufriste tanto
                                benditan sean tus lágrimas bendito sea tu
                                llanto. Virgen de las Angustias Madre del
                                Redentor apiádate de nosotros y concédenos tu
                                perdón.
                                <br /><br />¡Ay! Virgen de las Angustias con
                                Jesús muerto en tus brazos el corazón se me para
                                y se rompe en mil pedazos. <br /><br />¡Ay!
                                Virgen de las Angustias tu rostro lo va
                                expresando pena, dolor y tristeza caminando
                                hacia el carvario. <br /><br />¡Ay! Virgen de
                                las Angustias quisiera decirte tanto que la voz
                                se me quiebra y solo queda mi llanto.
                                <br /><br />¡Ay! Virgen de las Angustias Santa
                                Madre del Señor...
                            </p>

                            <div
                                class="mt-8 flex flex-col items-center justify-center"
                            >
                                <img
                                    class="h-14 w-14 rounded-full object-cover"
                                    src="/image/emoji/emojiVirgen.jpg"
                                    alt=""
                                />

                                <div class="mt-4 text-center pb-12">
                                    <h1
                                        class="font-semibold text-gray-800 dark:text-white pb-2"
                                    >
                                        Himno a Ntra. Sra. de las Angustias
                                    </h1>
                                    <span
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                        >Francsico Herranz Blesa</span
                                    >
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <p
                                class="flex items-center text-center text-gray-500 p-4 lg:mx-8 dark:text-white"
                            >
                                27 La paz os dejo, mi paz os doy; yo no os la
                                doy como el mundo la da. No se turbe vuestro
                                corazón, ni tenga miedo.
                                <br />28 Habéis oído que yo os he dicho: Voy, y
                                vengo a vosotros. Si me amarais, os habríais
                                regocijado, porque he dicho que voy al Padre;
                                porque el Padre mayor es que yo.
                            </p>

                            <div
                                class="mt-8 flex flex-col items-center justify-center"
                            >
                                <img
                                    class="h-14 w-14 rounded-full object-cover"
                                    src="/image/emoji/SanJuan.jpg"
                                    alt=""
                                />

                                <div class="mt-4 text-center pb-12">
                                    <h1
                                        class="font-semibold text-gray-800 dark:text-white"
                                    >
                                        Jesús, el camino del Padre. La Promesa
                                        del Espíritu Santo
                                    </h1>
                                    <span
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                        >Juan 14:27-28</span
                                    >
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <p
                                class="flex items-center text-center text-gray-500 p-4 lg:mx-8 dark:tex-white"
                            >
                                45 Al ver lo que hizo Jesús, muchos de los
                                judíos que habían ido a casa de María creyeron
                                en él. 46 Pero otros fueron a ver a los fariseos
                                y les contaron lo que Jesús había hecho. 47 Los
                                sumos sacerdotes y los fariseos convocaron un
                                Consejo y dijeron: "¿Qué hacemos? Porque este
                                hombre realiza muchos signos. 48 Si lo dejamos
                                seguir así, todos creerán en él, y los romanos
                                vendrán y destruirán nuestro Lugar santo y
                                nuestra nación". 49 Uno de ellos, llamado
                                Caifás, que era Sumo Sacerdote ese año, les
                                dijo: "Ustedes no comprenden nada. 50 ¿No les
                                parece preferible que un solo hombre muera por
                                el pueblo y no que perezca la nación entera?".
                                51 No dijo eso por sí mismo, sino que profetizó
                                como Sumo Sacerdote que Jesús iba a morir por la
                                nación, 52 y no solamente por la nación, sino
                                también para congregar en la unidad a los hijos
                                de Dios que estaban dispersos. 53 A partir de
                                ese día, resolvieron que debían matar a Jesús.
                                54 Por eso él no se mostraba más en público
                                entre los judíos, sino que fue a una región
                                próxima al desierto, a una ciudad llamada
                                Efraín, y allí permaneció con sus discípulos.
                                <br />55 Como se acercaba la Pascua de los
                                judíos, mucha gente de la región había subido a
                                Jerusalén para purificarse. 56 Buscaban a Jesús
                                y se decían unos a otros en el Templo: "¿Qué les
                                parece, vendrá a la fiesta o no?". 57 Los sumos
                                sacerdotes y los fariseos habían dado orden de
                                que si alguno conocía el lugar donde él se
                                encontraba, lo hiciera saber para detenerlo.
                            </p>

                            <div
                                class="mt-8 flex flex-col items-center justify-center"
                            >
                                <img
                                    class="h-14 w-14 rounded-full object-cover"
                                    src="/image/emoji/SanJuan.jpg"
                                    alt=""
                                />

                                <div class="mt-4 text-center pb-12">
                                    <h1
                                        class="font-semibold text-gray-800 dark:text-white"
                                    >
                                        Evangelio según San Juan. La
                                        conspiración contra Jesús
                                    </h1>
                                    <span
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                        >Mt. 26. 1-5 Mc. 14. 1-2 Lc. 22.
                                        1-2</span
                                    >
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
        </section>

        <!-- Seccion Venta Productos-->
        <section class="bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6 py-10">
                <h1
                    class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl"
                >
                    Tienda Paso Blanco
                </h1>

                <p class="mt-4 text-center text-gray-500 dark:text-gray-300">
                    Haz un Donativo a nuestros Pasos o compra en nuestra tienda
                    online todo lo recaudado es destinado al patrimonio del Paso
                    Blanco, Semana Santa o obras de caridad. Todos los donativos
                    quedaran registrados y se realizara una factura con el
                    importe donado
                </p>

                <div
                    class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-12"
                >
                    <div
                        v-for="product in products"
                        :key="product.id"
                        class="flex justify-center"
                    >
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <div
                                class="bg-white pounded rounded-xl shadow-xl"
                                :image="product.image"
                                :name="product.name"
                                :description="product.description"
                                :price="product.price"
                            >
                                <div
                                    class="h-56 bg-cover bg-center p-4 rounded-lg shadow-lg"
                                    :style="{
                                        backgroundImage:
                                            'url(' + product.image + ')',
                                    }"
                                >
                                    <span
                                        class="bg-gray-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300"
                                        >{{ product.price }}€</span
                                    >
                                </div>
                                <div class="px-6 py-4 text-center">
                                    <h1
                                        class="mt-4 text-2xl font-semibold capitalize text-gray-900 dark:text-white"
                                    >
                                        {{ product.name }}
                                    </h1>
                                    <p class="text-gray-700 text-base mb-4">
                                        {{ product.description }}
                                    </p>
                                    <button
                                        type="button"
                                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    >
                                        <Link
                                            href="/shop"
                                            data-mdb-ripple="true"
                                            data-mdb-ripple-color="light"
                                        >
                                            Comprar
                                        </Link>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Titulares -->

        <section id="titulares" class="bg-white dark:bg-gray-900">
            <div class="container mx-auto max-w-4xl px-6 py-10">
                <h1
                    class="text-center text-4xl font-semibold text-gray-800 dark:text-white"
                >
                    Titulares
                </h1>

                <div class="mt-12 space-y-8">
                    <o-collapse
                        class="card rounded-lg border-2 border-gray-100 dark:border-gray-700 shadow-lg"
                        animation="slide"
                        v-for="(collapse, index) of collapses"
                        :key="index"
                        :open="isOpen == index"
                        @open="isOpen = index"
                    >
                        <template #trigger="props">
                            <div
                                class="card-header flex w-full items-center justify-between p-8"
                                role="button"
                            >
                                <h1
                                    class="card-header-title mt-4 text-2xl font-semibold capitalize text-gray-900 dark:text-white"
                                >
                                    {{ collapse.title }}
                                </h1>
                                <a
                                    class="card-header-icon rounded-full bg-blue-500 text-white"
                                >
                                    <!--o-icon :icon="props.open ? 'caret-up' : 'caret-down'"> </o-icon-->
                                    <span
                                        class="rounded-full bg-blue-500 text-white"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                            />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </template>
                        <div
                            class="card-content flex w-full items-center justify-between p-8"
                        >
                            <div
                                class="content text-gray-700 dark:text-gray-200 text-base mb-4"
                            >
                                {{ collapse.text }}
                            </div>
                        </div>
                    </o-collapse>
                </div>
            </div>
        </section>

        <!-- Contacta con el Paso-->
        <section
            id="contactanos"
            class="min-h-screen bg-gradient-to-r from-blue-600 via-blue-800 to-blue-900 dark:from-gray-700 dark:via-gray-800 dark:to-gray-900"
        >
            <div
                class="container mx-auto flex min-h-screen flex-col px-6 py-12"
            >
                <div class="flex-1 lg:-mx-6 lg:flex lg:items-center">
                    <div class="text-white lg:mx-6 lg:w-1/2">
                        <h1
                            class="text-3xl font-semibold capitalize lg:text-5xl"
                        >
                            Ermita de la Virgen de las Angustias y de San Juan
                        </h1>

                        <p class="mt-6 max-w-xl">
                            (Paso Blanco de Huercal-Overa)
                        </p>

                        <div class="mt-6 space-y-8 md:mt-8">
                            <p class="-mx-2 flex items-start">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="mx-2 h-6 w-6 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                </svg>

                                <span class="mx-2 w-72 truncate text-white">
                                    C. Ancha, 38, 04600 Huércal-Overa, Almería
                                </span>
                            </p>

                            <p class="-mx-2 flex items-start">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="mx-2 h-6 w-6 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                    />
                                </svg>

                                <span class="mx-2 w-72 truncate text-white"
                                    >telf: +34 950 488 999 44</span
                                >
                            </p>

                            <p class="-mx-2 flex items-start">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="mx-2 h-6 w-6 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                    />
                                </svg>

                                <span class="mx-2 w-72 truncate text-white"
                                    >pasoblanco@huercal-overa.com</span
                                >
                            </p>
                        </div>

                        <div class="mt-6 md:mt-8">
                            <h3 class="text-gray-300">
                                Siguenos en las Redes Sociales
                            </h3>

                            <div class="-mx-1.5 mt-4 flex">
                                <a
                                    class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500"
                                    href="#"
                                >
                                    <svg
                                        class="h-10 w-10 fill-current"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M18.6668 6.67334C18.0002 7.00001 17.3468 7.13268 16.6668 7.33334C15.9195 6.49001 14.8115 6.44334 13.7468 6.84201C12.6822 7.24068 11.9848 8.21534 12.0002 9.33334V10C9.83683 10.0553 7.91016 9.07001 6.66683 7.33334C6.66683 7.33334 3.87883 12.2887 9.3335 14.6667C8.0855 15.498 6.84083 16.0587 5.3335 16C7.53883 17.202 9.94216 17.6153 12.0228 17.0113C14.4095 16.318 16.3708 14.5293 17.1235 11.85C17.348 11.0351 17.4595 10.1932 17.4548 9.34801C17.4535 9.18201 18.4615 7.50001 18.6668 6.67268V6.67334Z"
                                        />
                                    </svg>
                                </a>

                                <a
                                    class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500"
                                    href="#"
                                >
                                    <svg
                                        class="h-8 w-8"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M15.2 8.80005C16.4731 8.80005 17.694 9.30576 18.5941 10.2059C19.4943 11.1061 20 12.327 20 13.6V19.2H16.8V13.6C16.8 13.1757 16.6315 12.7687 16.3314 12.4687C16.0313 12.1686 15.6244 12 15.2 12C14.7757 12 14.3687 12.1686 14.0687 12.4687C13.7686 12.7687 13.6 13.1757 13.6 13.6V19.2H10.4V13.6C10.4 12.327 10.9057 11.1061 11.8059 10.2059C12.7061 9.30576 13.927 8.80005 15.2 8.80005Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M7.2 9.6001H4V19.2001H7.2V9.6001Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M5.6 7.2C6.48366 7.2 7.2 6.48366 7.2 5.6C7.2 4.71634 6.48366 4 5.6 4C4.71634 4 4 4.71634 4 5.6C4 6.48366 4.71634 7.2 5.6 7.2Z"
                                            fill="currentColor"
                                        />
                                    </svg>
                                </a>

                                <a
                                    class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500"
                                    href="#"
                                >
                                    <svg
                                        class="h-8 w-8"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M7 10.2222V13.7778H9.66667V20H13.2222V13.7778H15.8889L16.7778 10.2222H13.2222V8.44444C13.2222 8.2087 13.3159 7.9826 13.4826 7.81591C13.6493 7.64921 13.8754 7.55556 14.1111 7.55556H16.7778V4H14.1111C12.9324 4 11.8019 4.46825 10.9684 5.30175C10.1349 6.13524 9.66667 7.2657 9.66667 8.44444V10.2222H7Z"
                                            fill="currentColor"
                                        />
                                    </svg>
                                </a>

                                <a
                                    class="mx-1.5 transform text-white transition-colors duration-300 hover:text-blue-500"
                                    href="#"
                                >
                                    <svg
                                        class="h-8 w-8"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M11.9294 7.72275C9.65868 7.72275 7.82715 9.55428 7.82715 11.825C7.82715 14.0956 9.65868 15.9271 11.9294 15.9271C14.2 15.9271 16.0316 14.0956 16.0316 11.825C16.0316 9.55428 14.2 7.72275 11.9294 7.72275ZM11.9294 14.4919C10.462 14.4919 9.26239 13.2959 9.26239 11.825C9.26239 10.354 10.4584 9.15799 11.9294 9.15799C13.4003 9.15799 14.5963 10.354 14.5963 11.825C14.5963 13.2959 13.3967 14.4919 11.9294 14.4919ZM17.1562 7.55495C17.1562 8.08692 16.7277 8.51178 16.1994 8.51178C15.6674 8.51178 15.2425 8.08335 15.2425 7.55495C15.2425 7.02656 15.671 6.59813 16.1994 6.59813C16.7277 6.59813 17.1562 7.02656 17.1562 7.55495ZM19.8731 8.52606C19.8124 7.24434 19.5197 6.10901 18.5807 5.17361C17.6453 4.23821 16.51 3.94545 15.2282 3.88118C13.9073 3.80621 9.94787 3.80621 8.62689 3.88118C7.34874 3.94188 6.21341 4.23464 5.27444 5.17004C4.33547 6.10544 4.04628 7.24077 3.98201 8.52249C3.90704 9.84347 3.90704 13.8029 3.98201 15.1238C4.04271 16.4056 4.33547 17.5409 5.27444 18.4763C6.21341 19.4117 7.34517 19.7045 8.62689 19.7687C9.94787 19.8437 13.9073 19.8437 15.2282 19.7687C16.51 19.708 17.6453 19.4153 18.5807 18.4763C19.5161 17.5409 19.8089 16.4056 19.8731 15.1238C19.9481 13.8029 19.9481 9.84704 19.8731 8.52606ZM18.1665 16.5412C17.8881 17.241 17.349 17.7801 16.6456 18.0621C15.5924 18.4799 13.0932 18.3835 11.9294 18.3835C10.7655 18.3835 8.26272 18.4763 7.21307 18.0621C6.51331 17.7837 5.9742 17.2446 5.69215 16.5412C5.27444 15.488 5.37083 12.9888 5.37083 11.825C5.37083 10.6611 5.27801 8.15832 5.69215 7.10867C5.97063 6.40891 6.50974 5.8698 7.21307 5.58775C8.26629 5.17004 10.7655 5.26643 11.9294 5.26643C13.0932 5.26643 15.596 5.17361 16.6456 5.58775C17.3454 5.86623 17.8845 6.40534 18.1665 7.10867C18.5843 8.16189 18.4879 10.6611 18.4879 11.825C18.4879 12.9888 18.5843 15.4916 18.1665 16.5412Z"
                                            fill="currentColor"
                                        />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pb-16 lg:mx-6 lg:w-1/2">
                        <div
                            class="mx-auto w-full overflow-hidden rounded-xl bg-white px-8 py-10 shadow-2xl dark:bg-gray-900 lg:max-w-xl"
                        >
                            <h1
                                class="text-2xl font-medium text-gray-700 dark:text-gray-200"
                            >
                                Contacta con Nosotros
                            </h1>

                            <form class="mt-6">
                                <div class="flex-1">
                                    <label
                                        class="mb-2 block text-sm text-gray-600 dark:text-gray-200"
                                        >Nombre Completo</label
                                    >
                                    <input
                                        type="text"
                                        placeholder="Juan Bautista"
                                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300"
                                    />
                                </div>

                                <div class="mt-6 flex-1">
                                    <label
                                        class="mb-2 block text-sm text-gray-600 dark:text-gray-200"
                                        >Email</label
                                    >
                                    <input
                                        type="email"
                                        placeholder="juan@example.com"
                                        class="mt-2 block w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300"
                                    />
                                </div>

                                <div class="mt-6 w-full">
                                    <label
                                        class="mb-2 block text-sm text-gray-600 dark:text-gray-200"
                                        >Mensaje</label
                                    >
                                    <textarea
                                        class="mt-2 block h-32 w-full rounded-md border border-gray-200 bg-white px-5 py-3 text-gray-700 placeholder-gray-400 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300 md:h-48"
                                        placeholder="Mensaje"
                                    ></textarea>
                                </div>

                                <button
                                    class="mt-6 w-full transform rounded-md bg-blue-600 px-6 py-3 text-sm font-medium capitalize tracking-wide text-white transition-colors duration-300 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-400 focus:ring-opacity-50"
                                >
                                    Enviar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AppLayout>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
