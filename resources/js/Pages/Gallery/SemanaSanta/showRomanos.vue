<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import "viewerjs/dist/viewer.css";
import { component as Viewer } from "v-viewer";
import { ref } from "vue";

const images = ref([
    "/image/gallery/SemanaSanta/romanos23/Romanos1.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos2.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos3.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos4.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos5.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos6.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos7.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos8.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos9.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos10.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos11.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos12.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos14.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos15.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos17.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos18.jpg",
    "/image/gallery/SemanaSanta/romanos23/Romanos19.jpg",
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
    <AppLayout title="Romanos">
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
