<script lang="ts" setup>
  import { AccordionList, AccordionItem } from "vue3-rich-accordion";
  import { computed, ref } from "vue";
  import "vue3-rich-accordion/accordion-library-styles.css";
  const state = ref<Record<string, boolean>>({});
  const contentLines = ref<string[]>([]);
  const dynamicItems = ref<string[]>([]);
  const openMultipleItems = ref(false);
  const accordionBlockWidthPercents = ref(100);
  function addContentLine() {
    contentLines.value.push("Date now is " + Date.now());
  }
  function removeContentLine() {
    contentLines.value.pop();
  }
  function addDynamicItem() {
    dynamicItems.value.push("Date now is " + Date.now());
  }
  function removeDynamicItem() {
    dynamicItems.value.pop();
  }
  function onStateControllerChange(key: string, event: Event) {
    const newValue = !!(event.target as HTMLInputElement).checked || false;
    state.value[key] = newValue;
  }
  const vModelItems = computed(() => {
    return Object.entries(state.value);
  });
</script>

<template>
  <div class="sandbox">
    <div class="sandbox__accordion-block" :style="{ width: accordionBlockWidthPercents + '%' }">
      <AccordionList v-model:state="state" :open-multiple-items="openMultipleItems">
          <AccordionList open-multiple-items>
            <AccordionItem>
              <template #summary>Comida de Hermanda 25 de Marzo</template>
              <template #icon>+</template>
              Nos complace informaros que la proxima comidad de hermandad se disfrutara el 25 de Marzo despues de misa en el Restaurante
              de Huercal-Overa.
            </AccordionItem>
            <AccordionItem default-opened>
              <template #summary>Ensayo Costaleros</template>
              <template #icon>+</template>
              Martes y Jueves a las 19h
            </AccordionItem>
          </AccordionList>
        <AccordionItem v-for="item in dynamicItems" :key="item">
          <template #summary>This item is dynamically added</template>
          <template #icon>D</template>
          {{ item }}
        </AccordionItem>
        <AccordionItem id="mId3">
          <template #summary>Comida Costaleros Jueves 26</template>
          <div>
            <h1>
              Comida convivencia Jueves 26 a las 16h puerta de Hermandad costaleros paso blanco
            </h1>
          </div>
        </AccordionItem>
      </AccordionList>
    </div>

    <!--div class="v-model-rep">
      <h3>Props</h3>
      <div>
        Open multiple items
        <input v-model="openMultipleItems" type="checkbox" />
      </div>

      <h3>V-model representation</h3>
      <div v-for="vModelItem in vModelItems" :key="vModelItem[0]">
        {{ vModelItem[0] }}
        <input
          :checked="vModelItem[1]"
          type="checkbox"
          @change="event => onStateControllerChange(vModelItem[0], event)"
        />
      </div>

      <h3>Dynamic items</h3>
      <button @click="addDynamicItem">Add</button>
      <button @click="removeDynamicItem">Remove</button>

      <h3>Block resize</h3>
      <p>now width is: {{ accordionBlockWidthPercents }}%</p>
      <button @click="accordionBlockWidthPercents -= 20">Smaller</button>
      <button @click="accordionBlockWidthPercents += 20">Bigger</button>
    </!--div-->
  </div>
</template>

<style >
</style>

