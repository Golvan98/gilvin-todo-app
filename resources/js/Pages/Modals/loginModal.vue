<template>

        test content bitch {{ showModal }}
        <button @click="close"> close content</button>
</template>


<script setup>
import { defineProps, defineEmits  } from 'vue';
import { ref } from 'vue'

const showModal = defineProps(['showModal']);
const emits = defineEmits(['closeModal']);


const close = () => {
  emits('closeModal');
  // Emit an event if needed
};

</script>