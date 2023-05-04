<script>
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { StripeCheckout } from '@vue-stripe/vue-stripe';

const stripeKey = process.env.STRIPE_PUBLISHABLE_KEY;

export default {
  components: {
    StripeCheckout,
  },
  data() {
    return{
        publishableKey: 'pk_test_51MnGmGK1P0dJ1e9fivkKGA0aICuK2W9pcWD4wIHjegcFss7HCJvHf4xG3irfue1cwN9v1ubyc84Kvj5RG8epx0hq00gMstB8TH',
        sessionId: null,
    }
  },
  mounted() {
    console.log('Component mounted')
    this.getSession()
  },
  methods: {
    getSession(){

        axios.get('getSession')
        .then(res => {
            this.sessionId = res.data.id
        }).cath(err => {})
    },
    submit () {
      // You will be redirected to Stripe's secure checkout page
      this.$refs.checkoutRef.redirectToCheckout();
    },
  },
};


</script>

<template>
    <AppLayout title="Product">
        <div class="container mx-auto px-6 py-6 mt-8 text-center">
            <div class="container mx-auto px-6 py-10">
                <h1 class="text-center text-3xl font-semibold capitalize text-gray-800 dark:text-white lg:text-4xl">Tienda Paso Blanco</h1>

                <p class="mt-4 text-center text-gray-500 dark:text-gray-300">Haz un Donativo a nuestros Pasos comprando en nuestra tienda online todo lo recaudado es destinado al patrimonio del Paso Blanco, Semana Santa o obras de caridad. Todos los donativos quedaran registrados y se realizara una factura con el importe donado</p>

                <div class="mt-8 pb-28 grid grid-cols-1 gap-8 md:grid-cols-2 xl:mt-12 xl:grid-cols-3 xl:gap-12">
                   <div class="flex justify-center">
                    <div class="rounded-lg shadow-xl bg-white max-w-sm">

                        <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                            <img class="rounded-t-lg" src="../../../image/productos/medalla-paso.jpg" alt=""/>
                        </a>
                        <div class="p-6">
                            <span class="bg-gray-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">20€</span>
                            <h5 class="text-gray-900 text-xl font-medium mb-2">Medalla Paso</h5>
                            <p class="text-gray-700 text-base mb-4">
                                A traves de la web puedes adquirir tu medalla de la Hemandad.
                            </p>
                            <stripe-checkout
                                ref="checkoutRef"
                                :pk="publishableKey"
                                :sessionId="sessionId"
                            />
                            <button  @click="submit" type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Comprar</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout >
</template>
