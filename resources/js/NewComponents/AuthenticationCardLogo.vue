<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/'">
        <img width="250" height="250" :src="image" alt="Logo Paso">
    </Link>
</template>

<script>
    import image from '../../image/logo/logoPaso.png'

    export default {
        data(){
            return{
                image:image
            }
        }
    }
</script>
