<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    pagination: Object,
});
</script>

<template>
    <div
        v-if="pagination.links.length > 3"
        class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6"
    >
        <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
            <p class="text-sm text-gray-700">
                Mostrando
                <span class="font-medium">{{ pagination.from }}</span>
                hasta
                <span class="font-medium">{{ pagination.to }}</span>
                de
                <span class="font-medium">{{ pagination.total }}</span>
                resultados
            </p>
        </div>
        <div class="text-sm text-gray-500 dark:text-gray-400">
            <div></div>
            <div>
                <nav
                    class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                    aria-label="Pagination"
                >
                    <template v-for="(link, key) in pagination.links">
                        <div
                            v-if="link.url == null"
                            :key="key"
                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium rounded"
                            v-html="link.label"
                        ></div>

                        <Link
                            v-else
                            :key="'link-' + key"
                            :href="link.url"
                            class="relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                            :class="
                                link.active
                                    ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600 rounded'
                                    : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50 rounded'
                            "
                            v-html="link.label"
                        ></Link>
                    </template>
                </nav>
            </div>
        </div>
    </div>
</template>

<style></style>
