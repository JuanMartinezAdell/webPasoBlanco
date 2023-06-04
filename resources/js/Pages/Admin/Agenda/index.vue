<script setup>
import { ref, watch } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";
import Pagination from "@/NewComponents/PaginationVue.vue";
import Input from "@/NewComponents/Input.vue";

const getImageSrc = (group) => {
    switch (group) {
        case "hombres":
            return "/image/emoji/nazareno.png";
        case "mujeres":
            return "/image/emoji/mantilla.png";
        case "admin":
            return "/image/emoji/jesus.png";
        case "superusers":
            return "/image/emoji/espiritu.png";
        case "externos":
            return "/image/emoji/militar.png";
        default:
            return "/image/emoji/SanJuan.jpg"; // default image if group is not recognized
    }
};

let { filters, users, totalUsuarios } = defineProps({
    filters: Object,
    users: Object,
    totalUsuarios: Number,
});

let search = ref(filters.search ?? "");

watch(search, (newValue) => {
    router.get("diary", { search: newValue }, { preserveState: true });
});

let sort = ref("desc"); // valor por defecto

const sortUsers = () => {
    sort.value = sort.value == "desc" ? "asc" : "desc"; // cambia el orden en cada clic
    router.get(
        "diary",
        { search: search.value, order: sort.value },
        { preserveState: true }
    );
};

const sortGroup = () => {
    sort.value = sort.value == "desc" ? "asc" : "desc"; // cambia el orden en cada clic
    router.get(
        "diary",
        { search: search.value, order: sort.value },
        { preserveState: true }
    );
};
</script>

<template>
    <AdminLayout title="Agenda">
        <!-- Agenda -->
        <div class="px-6 pt-6">
            <section class="container px-4 mx-auto">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div>
                        <div class="flex items-center gap-x-3">
                            <h1
                                class="text-xl font-semibold text-gray-800 dark:text-white"
                            >
                                Agenda Hermandad
                            </h1>

                            <span
                                class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400"
                                >{{ totalUsuarios }} Usuarios</span
                            >
                        </div>

                        <p
                            class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                        >
                            Control de pagos de usarios y miembros de la Real
                            Hermandad del Paso Blanco
                        </p>
                    </div>
                    <div class="flex items-center mt-4 gap-x-3">
                        <button
                            class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700"
                        >
                            <svg
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <g clip-path="url(#clip0_3098_154395)">
                                    <path
                                        d="M13.3333 13.3332L9.99997 9.9999M9.99997 9.9999L6.66663 13.3332M9.99997 9.9999V17.4999M16.9916 15.3249C17.8044 14.8818 18.4465 14.1806 18.8165 13.3321C19.1866 12.4835 19.2635 11.5359 19.0351 10.6388C18.8068 9.7417 18.2862 8.94616 17.5555 8.37778C16.8248 7.80939 15.9257 7.50052 15 7.4999H13.95C13.6977 6.52427 13.2276 5.61852 12.5749 4.85073C11.9222 4.08295 11.104 3.47311 10.1817 3.06708C9.25943 2.66104 8.25709 2.46937 7.25006 2.50647C6.24304 2.54358 5.25752 2.80849 4.36761 3.28129C3.47771 3.7541 2.70656 4.42249 2.11215 5.23622C1.51774 6.04996 1.11554 6.98785 0.935783 7.9794C0.756025 8.97095 0.803388 9.99035 1.07431 10.961C1.34523 11.9316 1.83267 12.8281 2.49997 13.5832"
                                        stroke="currentColor"
                                        stroke-width="1.67"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </g>
                                <defs>
                                    <clipPath id="clip0_3098_154395">
                                        <rect
                                            width="20"
                                            height="20"
                                            fill="white"
                                        />
                                    </clipPath>
                                </defs>
                            </svg>
                            <Link>
                                <span>Exportar Usuarios</span>
                            </Link>
                        </button>

                        <Link
                            href="/admin/diary/create"
                            type="button"
                            class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-5 h-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>

                            <span>Add Usuario</span>
                        </Link>
                    </div>
                </div>

                <div class="flex flex-col mt-6">
                    <!--form class="flex items-center"-->
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div
                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                        <Input
                            v-model="search"
                            type="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Ingrese un texto para filtrar ..."
                        />
                    </div>
                </div>

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div
                            class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
                        >
                            <div
                                class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg"
                            >
                                <table
                                    class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
                                >
                                    <thead class="bg-blue-600 dark:bg-gray-800">
                                        <tr>
                                            <th
                                                scope="col"
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-white dark:text-gray-400"
                                            >
                                                Usuarios
                                            </th>

                                            <th
                                                scope="col"
                                                class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-white dark:text-gray-400"
                                            >
                                                <button
                                                    @click="sortUsers"
                                                    class="flex items-center gap-x-3 focus:outline-none"
                                                >
                                                    <span>Cuota</span>

                                                    <svg
                                                        class="h-3"
                                                        viewBox="0 0 10 11"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                            d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z"
                                                            fill="currentColor"
                                                            stroke="currentColor"
                                                            stroke-width="0.1"
                                                        />
                                                        <path
                                                            d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z"
                                                            fill="currentColor"
                                                            stroke="currentColor"
                                                            stroke-width="0.1"
                                                        />
                                                        <path
                                                            d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z"
                                                            fill="currentColor"
                                                            stroke="currentColor"
                                                            stroke-width="0.3"
                                                        />
                                                    </svg>
                                                </button>
                                            </th>

                                            <th
                                                scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white dark:text-gray-400"
                                            >
                                                Dirección
                                            </th>

                                            <th
                                                scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white dark:text-gray-400"
                                            >
                                                <button
                                                    @click="sortGroup"
                                                    class="flex items-center gap-x-3 focus:outline-none"
                                                >
                                                    <span>Grupo</span>

                                                    <svg
                                                        class="h-3"
                                                        viewBox="0 0 10 11"
                                                        fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                            d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z"
                                                            fill="currentColor"
                                                            stroke="currentColor"
                                                            stroke-width="0.1"
                                                        />
                                                        <path
                                                            d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z"
                                                            fill="currentColor"
                                                            stroke="currentColor"
                                                            stroke-width="0.1"
                                                        />
                                                        <path
                                                            d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z"
                                                            fill="currentColor"
                                                            stroke="currentColor"
                                                            stroke-width="0.3"
                                                        />
                                                    </svg>
                                                </button>
                                            </th>

                                            <th
                                                scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white dark:text-gray-400"
                                            >
                                                Notas
                                            </th>

                                            <th
                                                scope="col"
                                                class="relative py-3.5 px-4"
                                            >
                                                <span class="sr-only"
                                                    >Edit</span
                                                >
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900"
                                    >
                                        <tr
                                            v-for="user in users.data"
                                            :key="user.id"
                                            class="hover:bg-gray-50"
                                        >
                                            <th
                                                class="flex gap-3 px-6 py-4 font-normal text-gray-900"
                                            >
                                                <div class="relative h-10 w-10">
                                                    <img
                                                        v-if="user.group"
                                                        class="h-full w-full rounded-full object-cover object-center"
                                                        :src="
                                                            getImageSrc(
                                                                user.group
                                                            )
                                                        "
                                                        alt=""
                                                    />
                                                    <span
                                                        v-if="user.is_paid"
                                                        class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"
                                                    ></span>
                                                    <span
                                                        v-else
                                                        class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-red-400 ring ring-white"
                                                    ></span>
                                                </div>
                                                <div class="text-sm">
                                                    <div
                                                        class="font-medium text-gray-700"
                                                    >
                                                        {{ user.name }}
                                                    </div>
                                                    <div class="text-gray-400">
                                                        {{ user.email }}
                                                    </div>
                                                    <div class="text-gray-400">
                                                        {{ user.phone }}
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="px-6 py-4">
                                                <!--Cuota pagada-->
                                                <span
                                                    v-if="user.is_paid"
                                                    class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
                                                >
                                                    <span
                                                        class="h-1.5 w-1.5 rounded-full bg-green-600"
                                                    ></span>
                                                    Active
                                                </span>
                                                <!-- Cuota no pagada-->
                                                <span
                                                    v-else
                                                    class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600"
                                                >
                                                    <span
                                                        class="h-1.5 w-1.5 rounded-full bg-red-600"
                                                    ></span>
                                                    Inactive
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ user.address }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex gap-2">
                                                    <span
                                                        class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600"
                                                    >
                                                        {{ user.group }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ user.description }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div
                                                    class="flex justify-end gap-4"
                                                >
                                                    <a
                                                        x-data="{ tooltip: 'Delete' }"
                                                        href="#"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="1.5"
                                                            stroke="currentColor"
                                                            class="h-6 w-6"
                                                            x-tooltip="tooltip"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                            />
                                                        </svg>
                                                    </a>
                                                    <Link
                                                        x-data="{ tooltip: 'Edite' }"
                                                        :href="
                                                            route(
                                                                'diary.edit',
                                                                user.id
                                                            )
                                                        "
                                                        as="button"
                                                    >
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke-width="1.5"
                                                            stroke="currentColor"
                                                            class="h-6 w-6"
                                                            x-tooltip="tooltip"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                                            />
                                                        </svg>
                                                    </Link>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <Pagination :pagination="users"></Pagination>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /Agenda -->
    </AdminLayout>
</template>

<style></style>
