<template>
  <div v-if="visible" :class="['fixed top-5 right-5 p-4 rounded shadow', flashClass]">
    <p>{{ message }}</p>
    <button @click="closeFlashMessage" class="ml-4 text-white font-bold">
      &times;
    </button>
  </div>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
  message: String,
  type: {
    type: String,
    default: 'success'
  },
  duration: {
    type: Number,
    default: 3000
  }
});

const visible = ref(true);
const flashClass = ref('');

watch(() => props.type, (newValue) => {
  if (newValue === 'success') {
    flashClass.value = 'bg-green-500 text-white';
  } else if (newValue === 'error') {
    flashClass.value = 'bg-red-500 text-white';
  } else {
    flashClass.value = 'bg-blue-500 text-white';
  }
});

const closeFlashMessage = () => {
  visible.value = false;
};

setTimeout(() => {
  visible.value = false;
}, props.duration);
</script>

<style scoped>
</style>
