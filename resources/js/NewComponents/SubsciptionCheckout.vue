<script setup>


</script>

<template>
    <div class="container py-20">
        <div class="container mx-auto px-6 py-1 pb-20">
            <div class="pt-12 pb-8 py-4 md:grid md:grid-cols-3 md:gap-6">
                <section class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Cuota {{ plan.name }}
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
                            <Primarybutton id="card-button" :data-secret="intent">
                                Pagar Cuota
                            </Primarybutton>
                        </div>
                    </footer>
                </section>
            </div>
        </div>
    </div>
</template>
