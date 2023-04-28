
<script setup>
import PaymentMethod from '@/NewComponents/PaymentMethod.vue';
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

                <PaymentMethod :intent="intent" />

        </div>
    </AppLayout>
</template>
