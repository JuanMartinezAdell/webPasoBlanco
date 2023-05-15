<!--script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { StripeCheckout } from '@vue-stripe/vue-stripe';

const publishableKey = process.env.STRIPE_PUBLISHABLE_KEY;
let loading = false;
const successURL = 'your-success-url';
const cancelURL = 'your-cancel-url';

let selectedPriceId='';


const lineItems = {
    price: 'selectedPriceId',
    quantity: 1,
};

function redirectToCheckout() {
  this.$refs.checkoutRef.redirectToCheckout();
}

function submit(priceId) {
  console.log('priceId');
  selectedPriceId = priceId;
  lineItems[0].price = selectedPriceId;
  redirectToCheckout.call(this);
}
</!--script-->

<template>
    <!-- Metodo de pago 1 -->
    <div class="container m-auto px-6 py-20 md:px-12 lg:px-20">
        <div class="m-auto text-center lg:w-8/12 xl:w-7/12">
            <h2 class="text-2xl text-gray-800 dark:text-white font-bold md:text-4xl">Paga tu cuota online si te resulta más comodo y se miembro de nuestra gran hermandad.</h2>
        </div>
        <div class="mt-12 m-auto -space-y-4 items-center justify-center md:flex md:space-y-0 md:-space-x-4 xl:w-10/12">
            <div class="relative group md:w-6/12 lg:w-7/12">
                <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105"></div>
                <div class="relative p-6 pt-16 md:p-8 md:pl-12 md:rounded-r-2xl lg:pl-20 lg:p-16">
                    <h3 class="text-3xl text-gray-800 dark:text-white  font-semibold text-center">Cuota</h3>
                    <div>
                        <div class="relative flex justify-around">
                            <div class="flex items-end">
                                <span class="text-8xl text-gray-800 font-bold leading-0">16</span>
                                <div class="pb-2">
                                    <span class="block text-2xl text-gray-700 font-bold">Semenstral</span>
                                    <span class="block text-5xl text-blue-500 font-bold">€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul role="list" class="w-max space-y-4 py-6 m-auto text-gray-600">
                        <li class="space-x-2">
                            <span class="text-blue-500 font-semibold">&check;</span>
                            <span>Paga tu cuota cada semestre</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-blue-500 font-semibold">&check;</span>
                            <span>Accede a todo el contenido web</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-blue-500 font-semibold">&check;</span>
                            <span>Accede en cualquier momento a tus suscripciones y donativos</span>
                        </li>
                    </ul>
                    <PrimaryButton @click="submit('price_1HlLW8ABC123')" class="block w-full py-3 px-6 text-center">
                        <span class="text-center">
                            Plan Semestral
                        </span>
                    </PrimaryButton>
                </div>
            </div>
            <!-- Card principal -->
            <div class="relative z-10 -mx-4 group md:w-6/12 md:mx-0 lg:w-5/12">
                <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-xl transition duration-500 group-hover:scale-105 lg:group-hover:scale-110"></div>
                <div class="relative p-6 space-y-6 lg:p-8">
                    <h3 class="text-3xl text-gray-800 dark:text-white  font-semibold text-center">Cuota</h3>
                    <div>
                        <div class="relative flex justify-around">
                            <div class="flex items-end">
                                <span class="text-8xl text-gray-800 font-bold leading-0">30</span>
                                <div class="pb-2">
                                    <span class="block text-2xl text-gray-700 font-bold">Anual</span>
                                    <span class="block text-5xl text-blue-500 font-bold">€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul role="list" class="w-max space-y-4 py-6 m-auto text-gray-600">
                        <li class="space-x-2">
                            <span class="text-blue-500 font-semibold">&check;</span>
                            <span>Paga tu cuota de manera anual y despreocupate</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-blue-500 font-semibold">&check;</span>
                            <span>Accede a todo el contenido web</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-blue-500 font-semibold">&check;</span>
                            <span>Cancela o Reanuda tu subcripcion</span>
                        </li>
                    </ul>
                    <p class="flex items-center justify-center space-x-4 text-lg text-gray-600 text-center">
                        <span>Donativos Bizum</span>
                        <a href="tel:+24300" class="flex space-x-2 items-center text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            <span class="font-semibold">+34 666 666 666</span>
                        </a>
                    </p>
                    <PrimaryButton @click="submit('price_1HlLW8ABC123')" class="block w-full py-3 px-6 text-center">
                        <span class="text-center">
                            Plan anual
                        </span>
                    </PrimaryButton>
                </div>
            </div>

            <!---Ultimo Card -->
            <div class="relative group md:w-6/12 lg:w-7/12">
                <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105"></div>
                <div class="relative p-6 pt-16 md:p-8 md:pl-12 md:rounded-r-2xl lg:pl-20 lg:p-16">
                    <h3 class="text-3xl text-gray-800 dark:text-white  font-semibold text-center">Cuota</h3>
                    <div>
                        <div class="relative flex justify-around">
                            <div class="flex items-end">
                                <span class="text-8xl text-gray-800 font-bold leading-0">3</span>
                                <div class="pb-2">
                                    <span class="block text-2xl text-gray-700 font-bold">Mensual</span>
                                    <span class="block text-5xl text-blue-500 font-bold">€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul role="list" class="w-max space-y-4 py-6 m-auto text-gray-600">
                        <li class="space-x-2">
                            <span class="text-blue-500 font-semibold">&check;</span>
                            <span>Paga tu cuota todos los meses</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-blue-500 font-semibold">&check;</span>
                            <span>Deten tu subscripcion o reiniciala en cualquier momento</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-blue-500 font-semibold">&check;</span>
                            <span>Registra todas tus cuotas y donativos</span>
                        </li>
                    </ul>
                        <PrimaryButton @click="submit('price_1HlLW8ABC123')" class="block w-full py-3 px-6 text-center">
                            <span class="text-center">
                                Plan Mensual
                            </span>
                        </PrimaryButton>
                </div>
            </div>
            <stripe-checkout ref="checkoutRef"
                :pk="publishableKey"
                :line-items="lineItems"
                :success-url="successURL"
                :cancel-url="cancelURL"
                @loading="loading = $event"
            />
        </div>
    </div>
</template>

<style>
</style>
