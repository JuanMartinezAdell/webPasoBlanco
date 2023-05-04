
<script setup>
import PaymentMethod from '@/NewComponents/PaymentMethod.vue';
import SubcriptionMethod from '@/NewComponents/SubcriptionMethod.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
  intent: {
    type: String,
    required: true,
  },
});

</script>


<template>
    <AppLayout title="Article">
        <div class="container py-20">

                <SubcriptionMethod />

                <PaymentMethod :intent="intent" />

        </div>
    </AppLayout>
</template>
