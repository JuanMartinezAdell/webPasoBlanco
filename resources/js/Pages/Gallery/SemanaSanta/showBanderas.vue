<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import "viewerjs/dist/viewer.css";
import { component as Viewer } from "v-viewer";
import { ref } from "vue";

const images = ref([
    "/image/gallery/SemanaSanta/banderas23/bandera1.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera2.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera3.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera4.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera5.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera6.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera7.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera8.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera9.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera10.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera11.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera12.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera13.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera14.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera15.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera16.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera17.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera18.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera19.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera20.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera21.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera22.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera23.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera24.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera25.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera26.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera27.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera28.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera29.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera30.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera31.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera32.jpg",
    "/image/gallery/SemanaSanta/banderas23/bandera33.jpg",
]);

let $viewer;

const inited = (viewer) => {
    $viewer = viewer;
};

const show = () => {
    if ($viewer) {
        $viewer.show();
    }
};
</script>

<template>
    <AppLayout title="Banderas">
        <Viewer
            :options="options"
            :images="images"
            @inited="inited"
            class="gallery-container pt-20 pb-40"
            ref="viewer"
        >
            <template #default="scope">
                <div class="">
                    <img
                        class="gallery-items"
                        v-for="src in scope.images"
                        :src="src"
                        :key="src"
                    />
                    {{ scope.options }}
                </div>
            </template>
        </Viewer>
        <button type="button" @click="show">Show</button>
    </AppLayout>
</template>
