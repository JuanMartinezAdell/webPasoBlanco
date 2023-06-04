<script setup>
import { reactive } from "vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import FormSection from "@/Components/FormSection.vue";
import ActionMessage from "@/Components/ActionMessage.vue";

const props = defineProps({
    posts: Object,
});

const form = useForm({
    name: "",
    email: "",
    phone: "",
    is_paid: "",
    address: "",
    group: "",
    description: "",
});

const createAgenda = () => {
    form.diary(route("agenda.store"));
};
</script>

<template>
    <AdminLayout title="Diary">
        <div class="container mx-auto px-6 py-6 mt-8 text-center">
            <div class="container mx-auto px-6 py-20">
                <FormSection @submitted="createAgenda" class="pb-16">
                    <template #title> Crear Usuario Hermandad </template>

                    <template #description>
                        Crea usuarios para la agenda de la Hermandad del Paso.
                    </template>
                    <template #form>
                        <!-- Title -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel
                                for="name"
                                value="Nombre Apellido Apellido"
                            />
                            <TextInput
                                id="title"
                                v-model="form.name"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="name"
                            />
                            <InputError
                                :message="form.errors.name"
                                class="mt-2"
                            />
                        </div>

                        <!-- Slug -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="slug"
                                v-model="form.email"
                                type="email"
                                class="mt-1 block w-full"
                                autocomplete="email"
                            />
                            <InputError
                                :message="form.errors.email"
                                class="mt-2"
                            />
                        </div>

                        <!-- Date -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="phone" value="Telefono" />
                            <TextInput
                                id="phone"
                                v-model="form.phone"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="phone"
                            />
                            <InputError
                                :message="form.errors.phone"
                                class="mt-2"
                            />
                        </div>

                        <!-- Address -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="address" value="Direccion" />
                            <textarea
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                v-model="form.address"
                            ></textarea>
                            <InputError
                                :message="form.errors.address"
                                class="mt-2"
                            />
                        </div>

                        <!--  Group -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="group" value="Grupo" />
                            <select
                                v-model="form.group"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            >
                                <option value=""></option>
                                <option value="hombre">Hombres</option>
                                <option value="mujeres">Mujeres</option>
                                <option value="admin">Administradores</option>
                                <option value="superusers">
                                    SuperUsuarios
                                </option>
                                <option value="externos">Externos</option>
                            </select>
                            <InputError
                                :message="form.errors.group"
                                class="mt-2"
                            />
                        </div>

                        <!-- Description -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="description" value="Notas" />
                            <textarea
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                v-model="form.description"
                            ></textarea>
                            <InputError
                                :message="form.errors.description"
                                class="mt-2"
                            />
                        </div>
                    </template>
                    <template #actions>
                        <ActionMessage
                            :on="form.recentlySuccessful"
                            class="mr-3"
                        >
                            Saved.
                        </ActionMessage>

                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Save
                        </PrimaryButton>
                    </template>
                </FormSection>
            </div>
        </div>
    </AdminLayout>
</template>
