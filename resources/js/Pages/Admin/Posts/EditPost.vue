<script setup>
    import { reactive } from 'vue';
    import { Head, Link, useForm, router } from '@inertiajs/vue3';
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import FormSection from '@/Components/FormSection.vue';
    import ActionMessage from '@/Components/ActionMessage.vue';

    import Oruga from '@oruga-ui/oruga-next';
    import '@oruga-ui/oruga-next/dist/oruga.css';
    import '@oruga-ui/oruga-next/dist/oruga-full.css';

    const props = defineProps({
        article: Object,
        categories: Object,
    });

    const form = useForm ({
            id: props.article.id,
            title: props.article.title,
            slug: props.article.slug,
            date: props.article.date,
            text: props.article.text,
            description: props.article.description,
            type: props.article.type,
            posted: props.article.posted,
            category_id: props.article.category_id,
            image: "",
    });

    const createArticle = () => {
        form.put(route("articles.update",form.id))
    };

    const uploadArticle = () => {
        form.post(route("articles.upload",form.id))
    };


</script>

<template>
    <AppLayout title="Articulos">
        <div class="container mx-auto px-6 py-6 mt-8 text-center">
            <div class="container mx-auto px-6 py-20">

                <FormSection  @submitted="createArticle" class="pb-16">
                    <template #title>
                        Crear Articulos
                    </template>

                    <template #description>
                        Crea los articulos para la Web.
                    </template>
                    <template #form>
                        <!-- Title -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="title" value="Title" />
                            <TextInput
                                id="title"
                                v-model="form.title"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="title"
                            />
                            <InputError :message="form.errors.title" class="mt-2" />
                        </div>

                        <!-- Slug -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="slug" value="Slug" />
                            <TextInput
                                id="slug"
                                v-model="form.slug"
                                type="text"
                                class="mt-1 block w-full"
                                autocomplete="slug"
                            />
                            <InputError :message="form.errors.slug" class="mt-2" />
                        </div>

                        <!-- Date -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="date" value="Date" />
                            <TextInput
                                id="date"
                                v-model="form.date"
                                type="date"
                                class="mt-1 block w-full"
                                autocomplete="date"
                            />
                            <InputError :message="form.errors.date" class="mt-2" />
                        </div>

                        <!-- Text -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="text" value="Text" />
                            <textarea
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    v-model="form.text"
                                ></textarea>
                            <InputError :message="form.errors.text" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="description" value="Description" />
                            <textarea
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    v-model="form.description"
                                ></textarea>
                            <InputError :message="form.errors.description" class="mt-2" />
                        </div>

                        <!-- Posted -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="posted" value="Post" />
                            <select  class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" v-model="form.posted">
                                <option value=""></option>
                                <option value="not">No</option>
                                <option value="yes">Si</option>
                            </select>
                            <InputError :message="form.errors.posted" class="mt-2" />
                        </div>

                        <!-- Type -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="type" value="Tipo" />
                            <select  class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" v-model="form.type">
                                <option value=""></option>
                                <option value="post">Post</option>
                                <option value="publicidad">Publicidad</option>
                                <option value="eventos">Eventos</option>
                                <option value="imagenes">Fotos</option>
                            </select>
                            <InputError :message="form.errors.type" class="mt-2" />
                        </div>

                         <!-- Category -->
                         <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="category_id" value="Categoria" />
                            <select  class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" v-model="form.category_id">
                                <option value=""></option>
                                <option v-for="category in categories" :value="category.id" :key="category.id">{{ category.title }}</option>
                            </select>
                            <InputError :message="form.errors.category_id" class="mt-2" />
                        </div>
                    </template>
                    <template #actions>
                        <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </ActionMessage>

                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </template>
                </FormSection>
            </div>
        </div>
    </AppLayout>
</template>
