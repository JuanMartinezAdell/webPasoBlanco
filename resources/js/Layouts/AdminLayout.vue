<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/NewComponents/ApplicationMark.vue";
import Banner from "@/Components/Banner.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(
        route("current-team.update"),
        {
            team_id: team.id,
        },
        {
            preserveState: false,
        }
    );
};

const logout = () => {
    router.post(route("logout"));

    //Panel modo noche
    const setup = () => {
        const getTheme = () => {
            if (window.localStorage.getItem("dark")) {
                return JSON.parse(window.localStorage.getItem("dark"));
            }
            return (
                !!window.matchMedia &&
                window.matchMedia("(prefers-color-scheme: dark)").matches
            );
        };

        const setTheme = (value) => {
            window.localStorage.setItem("dark", value);
        };
    };
};
</script>

<template>
    <div>
        <Head :title="title" />

        <!-- component -->
        <div x-data="setup()" :class="{ dark: isDark }">
            <div
                class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-100 dark:bg-gray-700 text-black dark:text-white"
            >
                <!-- Header -->
                <div
                    class="fixed w-full flex items-center justify-between h-14 text-white z-10"
                >
                    <div
                        class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14 bg-blue-800 dark:bg-gray-800 border-none"
                    >
                        <img
                            class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden"
                            src="/image/logo/logopaso.png"
                        />
                        <span class="hidden md:block">ADMIN</span>
                    </div>
                    <div
                        class="flex justify-between items-center h-14 bg-blue-800 dark:bg-gray-800 header-right"
                    >
                        <ul class="flex items-center">
                            <li>
                                <button
                                    aria-hidden="true"
                                    @click="toggleTheme"
                                    class="group p-2 transition-colors duration-200 rounded-full shadow-md bg-blue-200 hover:bg-blue-200 dark:bg-gray-50 dark:hover:bg-gray-200 text-gray-900 focus:outline-none"
                                >
                                    <svg
                                        x-show="isDark"
                                        width="24"
                                        height="24"
                                        class="fill-current text-gray-700 group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke=""
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                        />
                                    </svg>
                                    <svg
                                        x-show="!isDark"
                                        width="24"
                                        height="24"
                                        class="fill-current text-gray-700 group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke=""
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                                        />
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <div
                                    class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"
                                ></div>
                            </li>
                            <li>
                                <Link
                                    href="/logout"
                                    method="post"
                                    as="button"
                                    class="flex items-center mr-4 hover:text-blue-100"
                                >
                                    <span class="inline-flex mr-1">
                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                            ></path>
                                        </svg>
                                    </span>
                                    Logout
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ./Header -->

                <!-- Sidebar -->
                <div
                    class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar"
                >
                    <div
                        class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow"
                    >
                        <ul class="flex flex-col py-4 space-y-1">
                            <li class="px-5 hidden md:block">
                                <div class="flex flex-row items-center h-8">
                                    <div
                                        class="text-sm font-light tracking-wide text-gray-400 uppercase"
                                    >
                                        Main
                                    </div>
                                </div>
                            </li>
                            <li>
                                <Link
                                    href="/admin"
                                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6"
                                >
                                    <span
                                        class="inline-flex justify-center items-center ml-4"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                            ></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="ml-2 text-sm tracking-wide truncate"
                                        >Dashboard</span
                                    >
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/admin/diary"
                                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6"
                                >
                                    <span
                                        class="inline-flex justify-center items-center ml-4"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                            ></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="ml-2 text-sm tracking-wide truncate"
                                        >Agenda</span
                                    >
                                    <span
                                        class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full"
                                        >1200</span
                                    >
                                </Link>
                            </li>
                            <li>
                                <a
                                    href="/admin/post"
                                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6"
                                >
                                    <span
                                        class="inline-flex justify-center items-center ml-4"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
                                            ></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="ml-2 text-sm tracking-wide truncate"
                                        >Post</span
                                    >
                                </a>
                            </li>
                            <li>
                                <a
                                    href="/admin/category"
                                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6"
                                >
                                    <span
                                        class="inline-flex justify-center items-center ml-4"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"
                                            ></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="ml-2 text-sm tracking-wide truncate"
                                        >Category</span
                                    >
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6"
                                >
                                    <span
                                        class="inline-flex justify-center items-center ml-4"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                                            ></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="ml-2 text-sm tracking-wide truncate"
                                        >Messages</span
                                    >
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6"
                                >
                                    <span
                                        class="inline-flex justify-center items-center ml-4"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                            ></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="ml-2 text-sm tracking-wide truncate"
                                        >Notifications</span
                                    >
                                    <span
                                        class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full"
                                        >1.2k</span
                                    >
                                </a>
                            </li>
                            <li class="px-5 hidden md:block">
                                <div
                                    class="flex flex-row items-center mt-5 h-8"
                                >
                                    <div
                                        class="text-sm font-light tracking-wide text-gray-400 uppercase"
                                    >
                                        Settings
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6"
                                >
                                    <span
                                        class="inline-flex justify-center items-center ml-4"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                            ></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="ml-2 text-sm tracking-wide truncate"
                                        >Profile</span
                                    >
                                </a>
                            </li>
                            <li>
                                <a
                                    href="#"
                                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6"
                                >
                                    <span
                                        class="inline-flex justify-center items-center ml-4"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                            ></path>
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                            ></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="ml-2 text-sm tracking-wide truncate"
                                        >Settings</span
                                    >
                                </a>
                            </li>
                        </ul>
                        <p
                            class="mb-14 px-5 py-3 hidden md:block text-center text-xs"
                        >
                            Copyright @PasoBlanco
                        </p>
                    </div>
                </div>
                <!-- ./Sidebar -->

                <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
                    <!-- Statistics Cards -->
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4"
                    >
                        <div
                            class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group"
                        >
                            <div
                                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12"
                            >
                                <svg
                                    width="30"
                                    height="30"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl">1200</p>
                                <p>Usuarios Registrados</p>
                            </div>
                        </div>
                        <div
                            class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group"
                        >
                            <div
                                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12"
                            >
                                <svg
                                    width="30"
                                    height="30"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl">23</p>
                                <p>Ventas</p>
                            </div>
                        </div>
                        <div
                            class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group"
                        >
                            <div
                                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12"
                            >
                                <svg
                                    width="30"
                                    height="30"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
                                    ></path>
                                </svg>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl">650</p>
                                <p>Cuotas al día</p>
                            </div>
                        </div>
                        <div
                            class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group"
                        >
                            <div
                                class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12"
                            >
                                <svg
                                    width="30"
                                    height="30"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl">5000€</p>
                                <p>Beneficios</p>
                            </div>
                        </div>
                    </div>
                    <!-- ./Statistics Cards -->

                    <!-- Search -->
                    <!--div class=" items-center hover:bg-gray-100 rounded-lg cursor-pointer">
        <div class="m-4">


        <div class=" bg-white w-full h-16 rounded-xl mb-3 shadow-lg p-2">
        <input type="text" placeholder="Search" class="w-full h-full text-2xl rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </!--div-->
                    <!-- Desplegable Navegador -->
                    <!--div class="bg-white w-full rounded-xl shadow-xl overflow-hidden p-1"-->
                    <!-- items -->
                    <!--div class="w-full flex p-3 pl-4 items-center hover:bg-gray-300 rounded-lg cursor-pointer">
            <div class="mr-4"><div class="h-9 w-9 rounded-sm flex items-center justify-center text-3xl" >
                <svg t="1645067416159" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1487" width="200" height="200"><path d="M57.6 829.866667C17.066667 804.266667 6.4 750.933333 32 710.4L192 814.933333c-25.6 40.533333-78.933333 51.2-119.466667 25.6l-14.933333-10.666666z" fill="#FF8A14" p-id="1488"></path><path d="M1006.933333 757.333333c0 46.933333-38.4 87.466667-87.466666 87.466667v-189.866667c46.933333 0 87.466667 38.4 87.466666 87.466667v14.933333z" fill="#FF8A14" p-id="1489"></path><path d="M704 358.4h-189.866667l10.666667-42.666667c4.266667-14.933333 17.066667-25.6 34.133333-25.6H661.333333c14.933333 0 29.866667 10.666667 34.133334 25.6l8.533333 42.666667z" fill="#ADC4D9" p-id="1490"></path><path d="M919.466667 885.333333c0 38.4-32 68.266667-68.266667 68.266667H366.933333c-38.4 0-68.266667-32-68.266666-68.266667V652.8C298.666667 480 437.333333 341.333333 608 341.333333s311.466667 138.666667 311.466667 311.466667v232.533333z" fill="#FFE500" p-id="1491"></path><path d="M608 341.333333c-170.666667 0-309.333333 138.666667-309.333333 311.466667v87.466667c0-172.8 138.666667-311.466667 311.466666-311.466667s311.466667 138.666667 311.466667 311.466667v-87.466667C919.466667 480 780.8 341.333333 608 341.333333z" fill="#FFF48C" p-id="1492"></path><path d="M256 979.2a352 32 0 1 0 704 0 352 32 0 1 0-704 0Z" fill="#45413C" p-id="1493"></path><path d="M834.133333 947.2c0 19.2-14.933333 34.133333-34.133333 34.133333H418.133333c-19.2 0-34.133333-14.933333-34.133333-34.133333v-104.533333c0-19.2 14.933333-34.133333 34.133333-34.133334h379.733334c19.2 0 34.133333 14.933333 34.133333 34.133334v104.533333z" fill="#C0DCEB" p-id="1494"></path><path d="M834.133333 842.666667c0-19.2-14.933333-34.133333-34.133333-34.133334H418.133333c-19.2 0-34.133333 14.933333-34.133333 34.133334v42.666666c0-19.2 14.933333-34.133333 34.133333-34.133333h379.733334c19.2 0 34.133333 14.933333 34.133333 34.133333v-42.666666z" fill="#DAEDF7" p-id="1495"></path><path d="M755.2 618.666667m-96 0a96 96 0 1 0 192 0 96 96 0 1 0-192 0Z" fill="#FFFFFF" p-id="1496"></path><path d="M755.2 618.666667m-34.133333 0a34.133333 34.133333 0 1 0 68.266666 0 34.133333 34.133333 0 1 0-68.266666 0Z" fill="#FF6242" p-id="1497"></path><path d="M462.933333 618.666667m-87.466666 0a87.466667 87.466667 0 1 0 174.933333 0 87.466667 87.466667 0 1 0-174.933333 0Z" fill="#FFFFFF" p-id="1498"></path><path d="M462.933333 618.666667m-34.133333 0a34.133333 34.133333 0 1 0 68.266667 0 34.133333 34.133333 0 1 0-68.266667 0Z" fill="#6DD627" p-id="1499"></path><path d="M426.666667 842.666667m-8.533334 0a8.533333 8.533333 0 1 0 17.066667 0 8.533333 8.533333 0 1 0-17.066667 0Z" fill="#C0DCEB" p-id="1500"></path><path d="M426.666667 834.133333c-4.266667 0-8.533333 4.266667-8.533334 8.533334s4.266667 8.533333 8.533334 8.533333 8.533333-4.266667 8.533333-8.533333-2.133333-8.533333-8.533333-8.533334z" fill="#45413C" p-id="1501"></path><path d="M791.466667 842.666667m-8.533334 0a8.533333 8.533333 0 1 0 17.066667 0 8.533333 8.533333 0 1 0-17.066667 0Z" fill="#C0DCEB" p-id="1502"></path><path d="M791.466667 834.133333c-4.266667 0-8.533333 4.266667-8.533334 8.533334s4.266667 8.533333 8.533334 8.533333 8.533333-4.266667 8.533333-8.533333-4.266667-8.533333-8.533333-8.533334z" fill="#45413C" p-id="1503"></path><path d="M800 55.466667m-42.666667 0a42.666667 42.666667 0 1 0 85.333334 0 42.666667 42.666667 0 1 0-85.333334 0Z" fill="#FF6242" p-id="1504"></path><path d="M919.466667 652.8v42.666667c42.666667 0 78.933333 32 85.333333 72.533333 0-4.266667 2.133333-8.533333 2.133333-12.8v-17.066667c0-46.933333-38.4-85.333333-87.466666-85.333333z" fill="#FFAA54" p-id="1505"></path><path d="M29.866667 714.666667c0 32 17.066667 64 49.066666 85.333333l17.066667 10.666667c29.866667 19.2 64 21.333333 91.733333 12.8l6.4-6.4-160-104.533334c-4.266667 0-4.266667 0-4.266666 2.133334z" fill="#FFAA54" p-id="1506"></path></svg>
            </div>
            </div>
            <div>
            <div class="font-bold text-lg">Name: Tom</div>
            <div class="text-xs text-gray-500">
                <span class="mr-2">No: 007886</span>
                <span class="mr-2">gender: man</span>
                <span class="mr-2">hobby: skiing</span>
            </div>
            </div>
        </!--div-->
                    <!-- items -->
                    <!--div class="w-full flex p-3 pl-4 items-center hover:bg-gray-300 rounded-lg cursor-pointer">
            <div class="mr-4"><div class="h-9 w-9 rounded-sm flex items-center justify-center text-3xl" >
                <svg t="1645067490174" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1640" width="200" height="200"><path d="M96 970.666667a416 32 0 1 0 832 0 416 32 0 1 0-832 0Z" fill="#45413C" p-id="1641"></path><path d="M896 864c0 46.933333-38.4 85.333333-85.333333 85.333333H213.333333c-46.933333 0-85.333333-38.4-85.333333-85.333333V576c0-211.2 172.8-384 384-384s384 172.8 384 384v288z" fill="#DAEDF7" p-id="1642"></path><path d="M512 192C300.8 192 128 364.8 128 576v106.666667c0-211.2 172.8-384 384-384s384 172.8 384 384v-106.666667c0-211.2-172.8-384-384-384z" fill="#FFFFFF" p-id="1643"></path><path d="M650.666667 938.666667c0 23.466667-19.2 42.666667-42.666667 42.666666h-192c-23.466667 0-42.666667-19.2-42.666667-42.666666v-170.666667c0-23.466667 19.2-42.666667 42.666667-42.666667h192c23.466667 0 42.666667 19.2 42.666667 42.666667v170.666667z" fill="#C0DCEB" p-id="1644"></path><path d="M373.333333 821.333333h277.333334v42.666667h-277.333334z" fill="#ADC4D9" p-id="1645"></path><path d="M970.666667 778.666667l-74.666667 42.666666V554.666667l74.666667 42.666666zM53.333333 778.666667l74.666667 42.666666V554.666667l-74.666667 42.666666z" fill="#ADC4D9" p-id="1646"></path><path d="M768 74.666667m-53.333333 0a53.333333 53.333333 0 1 0 106.666666 0 53.333333 53.333333 0 1 0-106.666666 0Z" fill="#FF6242" p-id="1647"></path><path d="M650.666667 821.333333h-277.333334V768c0-23.466667 19.2-42.666667 42.666667-42.666667h192c23.466667 0 42.666667 19.2 42.666667 42.666667v53.333333z" fill="#FF6242" p-id="1648"></path><path d="M693.333333 533.333333m-106.666666 0a106.666667 106.666667 0 1 0 213.333333 0 106.666667 106.666667 0 1 0-213.333333 0Z" fill="#00DFEB" p-id="1649"></path><path d="M693.333333 533.333333m-42.666666 0a42.666667 42.666667 0 1 0 85.333333 0 42.666667 42.666667 0 1 0-85.333333 0Z" fill="#627B8C" p-id="1650"></path><path d="M330.666667 533.333333m-106.666667 0a106.666667 106.666667 0 1 0 213.333333 0 106.666667 106.666667 0 1 0-213.333333 0Z" fill="#00DFEB" p-id="1651"></path><path d="M330.666667 533.333333m-42.666667 0a42.666667 42.666667 0 1 0 85.333333 0 42.666667 42.666667 0 1 0-85.333333 0Z" fill="#627B8C" p-id="1652"></path></svg>
            </div>
            </div>
            <div>
            <div class="font-bold text-lg">Name: Tom</div>
            <div class="text-xs text-gray-500">
                <span class="mr-2">No: 007886</span>
                <span class="mr-2">gender: man</span>
                <span class="mr-2">hobby: skiing</span>
            </div>
            </div>
        </!--div-->
                    <!-- items -->
                    <!--div class="w-full flex p-3 pl-4 items-center hover:bg-gray-300 rounded-lg cursor-pointer">
            <div class="mr-4">
            <div class="h-9 w-9 rounded-sm flex items-center justify-center text-3xl" >
                <svg t="1645067516798" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1786" width="200" height="200"><path d="M347.733333 977.066667a249.6 34.133333 0 1 0 499.2 0 249.6 34.133333 0 1 0-499.2 0Z" fill="#45413C" p-id="1787"></path><path d="M597.333333 586.666667m-288 0a288 288 0 1 0 576 0 288 288 0 1 0-576 0Z" fill="#FFE500" p-id="1788"></path><path d="M597.333333 298.666667c-157.866667 0-288 128-288 288S437.333333 874.666667 597.333333 874.666667c157.866667 0 288-128 288-288S757.333333 298.666667 597.333333 298.666667z m0 531.2c-145.066667 0-262.4-117.333333-262.4-262.4 0-145.066667 117.333333-262.4 262.4-262.4 145.066667 0 262.4 117.333333 262.4 262.4 0 145.066667-117.333333 262.4-262.4 262.4z" fill="#EBCB00" p-id="1789"></path><path d="M597.333333 725.333333m-115.2 0a115.2 115.2 0 1 0 230.4 0 115.2 115.2 0 1 0-230.4 0Z" fill="#FFB0CA" p-id="1790"></path><path d="M597.333333 733.866667c-40.533333 0-76.8 21.333333-98.133333 53.333333 21.333333 32 55.466667 53.333333 98.133333 53.333333s76.8-21.333333 98.133334-53.333333c-21.333333-32-55.466667-53.333333-98.133334-53.333333z" fill="#FF866E" p-id="1791"></path><path d="M631.466667 379.733333l-125.866667-23.466666c-8.533333-2.133333-14.933333-6.4-14.933333-14.933334-2.133333-8.533333 2.133333-14.933333 8.533333-21.333333l115.2-85.333333-81.066667-14.933334c-10.666667-2.133333-17.066667-12.8-14.933333-23.466666 2.133333-10.666667 12.8-17.066667 23.466667-14.933334l125.866666 23.466667c8.533333 2.133333 14.933333 6.4 14.933334 14.933333 2.133333 8.533333-2.133333 14.933333-8.533334 21.333334l-115.2 85.333333 81.066667 14.933333c10.666667 2.133333 17.066667 12.8 14.933333 23.466667-2.133333 10.666667-12.8 17.066667-23.466666 14.933333zM401.066667 507.733333L298.666667 548.266667c-6.4 2.133333-12.8 2.133333-19.2-4.266667-4.266667-4.266667-6.4-12.8-4.266667-19.2l44.8-115.2-66.133333 27.733333c-8.533333 4.266667-19.2 0-21.333334-8.533333-4.266667-8.533333 0-19.2 8.533334-21.333333l102.4-40.533334c6.4-2.133333 12.8-2.133333 19.2 4.266667 4.266667 4.266667 6.4 12.8 4.266666 19.2l-44.8 115.2 66.133334-27.733333c8.533333-4.266667 19.2 0 21.333333 8.533333 4.266667 8.533333 0 17.066667-8.533333 21.333333zM460.8 305.066667l-241.066667 46.933333c-12.8 2.133333-25.6-2.133333-32-12.8-6.4-10.666667-6.4-23.466667 0-34.133333L341.333333 89.6 174.933333 121.6c-17.066667 4.266667-32-8.533333-36.266666-23.466667-2.133333-17.066667 8.533333-34.133333 25.6-36.266666L405.333333 14.933333c12.8-2.133333 25.6 2.133333 32 12.8 6.4 10.666667 6.4 23.466667 0 34.133334L283.733333 277.333333l166.4-32c17.066667-4.266667 32 8.533333 36.266667 23.466667 2.133333 17.066667-8.533333 34.133333-25.6 36.266667z" fill="#DABFF5" p-id="1792"></path><path d="M174.933333 93.866667l241.066667-46.933334c8.533333-2.133333 17.066667 0 23.466667 4.266667 2.133333-8.533333 2.133333-17.066667-4.266667-25.6-6.4-10.666667-19.2-14.933333-32-12.8L164.266667 61.866667c-17.066667 2.133333-27.733333 19.2-25.6 36.266666 2.133333 8.533333 6.4 14.933333 12.8 19.2 4.266667-10.666667 12.8-21.333333 23.466666-23.466666z" fill="#EDDBFF" p-id="1793"></path><path d="M755.2 672a36.266667 21.333333 0 1 0 72.533333 0 36.266667 21.333333 0 1 0-72.533333 0Z" fill="#FFAA54" p-id="1794"></path><path d="M369.066667 672a36.266667 21.333333 0 1 0 72.533333 0 36.266667 21.333333 0 1 0-72.533333 0Z" fill="#FFAA54" p-id="1795"></path><path d="M633.6 842.666667c0-14.933333 8.533333-27.733333 21.333333-34.133334 4.266667-2.133333 10.666667-6.4 12.8-10.666666l12.8-14.933334c2.133333-4.266667 6.4-6.4 10.666667-6.4 8.533333 0 14.933333 6.4 14.933333 14.933334V832c0 14.933333-10.666667 25.6-25.6 25.6h-10.666666v115.2c0 10.666667-8.533333 17.066667-17.066667 17.066667s-17.066667-8.533333-17.066667-17.066667v-130.133333z" fill="#4AEFF7" p-id="1796"></path></svg>
            </div>
            </div>
            <div>
            <div class="font-bold text-lg">Name: Tom</div>
            <div class="text-xs text-gray-500">
                <span class="mr-2">No: 007886</span>
                <span class="mr-2">gender: man</span>
                <span class="mr-2">hobby: skiing</span>
            </div>
            </div>
        </div>
        </div>

        </div>
        </div-->
                    <!-- Search -->
                    <!-- Page Content -->
                    <main>
                        <slot />
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
/* Compiled dark classes from Tailwind */
.dark .dark\:divide-gray-700 > :not([hidden]) ~ :not([hidden]) {
    border-color: rgba(55, 65, 81);
}
.dark .dark\:bg-gray-50 {
    background-color: rgba(249, 250, 251);
}
.dark .dark\:bg-gray-100 {
    background-color: rgba(243, 244, 246);
}
.dark .dark\:bg-gray-600 {
    background-color: rgba(75, 85, 99);
}
.dark .dark\:bg-gray-700 {
    background-color: rgba(55, 65, 81);
}
.dark .dark\:bg-gray-800 {
    background-color: rgba(31, 41, 55);
}
.dark .dark\:bg-gray-900 {
    background-color: rgba(17, 24, 39);
}
.dark .dark\:bg-red-700 {
    background-color: rgba(185, 28, 28);
}
.dark .dark\:bg-green-700 {
    background-color: rgba(4, 120, 87);
}
.dark .dark\:hover\:bg-gray-200:hover {
    background-color: rgba(229, 231, 235);
}
.dark .dark\:hover\:bg-gray-600:hover {
    background-color: rgba(75, 85, 99);
}
.dark .dark\:hover\:bg-gray-700:hover {
    background-color: rgba(55, 65, 81);
}
.dark .dark\:hover\:bg-gray-900:hover {
    background-color: rgba(17, 24, 39);
}
.dark .dark\:border-gray-100 {
    border-color: rgba(243, 244, 246);
}
.dark .dark\:border-gray-400 {
    border-color: rgba(156, 163, 175);
}
.dark .dark\:border-gray-500 {
    border-color: rgba(107, 114, 128);
}
.dark .dark\:border-gray-600 {
    border-color: rgba(75, 85, 99);
}
.dark .dark\:border-gray-700 {
    border-color: rgba(55, 65, 81);
}
.dark .dark\:border-gray-900 {
    border-color: rgba(17, 24, 39);
}
.dark .dark\:hover\:border-gray-800:hover {
    border-color: rgba(31, 41, 55);
}
.dark .dark\:text-white {
    color: rgba(255, 255, 255);
}
.dark .dark\:text-gray-50 {
    color: rgba(249, 250, 251);
}
.dark .dark\:text-gray-100 {
    color: rgba(243, 244, 246);
}
.dark .dark\:text-gray-200 {
    color: rgba(229, 231, 235);
}
.dark .dark\:text-gray-400 {
    color: rgba(156, 163, 175);
}
.dark .dark\:text-gray-500 {
    color: rgba(107, 114, 128);
}
.dark .dark\:text-gray-700 {
    color: rgba(55, 65, 81);
}
.dark .dark\:text-gray-800 {
    color: rgba(31, 41, 55);
}
.dark .dark\:text-red-100 {
    color: rgba(254, 226, 226);
}
.dark .dark\:text-green-100 {
    color: rgba(209, 250, 229);
}
.dark .dark\:text-blue-400 {
    color: rgba(96, 165, 250);
}
.dark .group:hover .dark\:group-hover\:text-gray-500 {
    color: rgba(107, 114, 128);
}
.dark .group:focus .dark\:group-focus\:text-gray-700 {
    color: rgba(55, 65, 81);
}
.dark .dark\:hover\:text-gray-100:hover {
    color: rgba(243, 244, 246);
}
.dark .dark\:hover\:text-blue-500:hover {
    color: rgba(59, 130, 246);
}

/* Custom style */
.header-right {
    width: calc(100% - 3.5rem);
}
.sidebar:hover {
    width: 16rem;
}
@media only screen and (min-width: 768px) {
    .header-right {
        width: calc(100% - 16rem);
    }
}
</style>
