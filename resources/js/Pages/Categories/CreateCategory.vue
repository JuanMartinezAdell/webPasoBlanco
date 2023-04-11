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


    const form = useForm ({
            title: '',
            slug:'',
    });

    const createCategory = () => {
        form.post(route("categories.store"))
    };

</script>

<template>
    <AppLayout title="Category">
        <div class="container mx-auto px-6 py-6 mt-8 text-center">
            <div class="container mx-auto px-6 py-20">

                <FormSection  @submitted="createCategory">
                    <template #title>
                        Categorias
                    </template>

                    <template #description>
                        Introduce las Categoria y el Slug de los Post.
                    </template>
                    <template #form>
                        <!-- Title -->
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="title" value="Title" />
                            <TextInput
                                id="name"
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
