

<template>
  <MainLayout>
    <div class="w-full h-screen">
    <!-- Button to open the modal -->
    <div v-if="showModal" class="modal">
      <div class="modal-content bg-red-300 w-full  z-50">
        <button class=" fixed inset-0 z-50 flex items-center justify-center bg-red-300 bg-opacity-80 h-3/4" @click="close">ewaea</button>
        <p>This is a modal!</p>
      </div>
    </div>
    <button @click="showModal = true">Open Modal</button>
    
    <!-- The modal -->
    
  </div>
      
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/Pages/Layouts/MainLayout.vue';

import { ref } from 'vue';

const showModal = ref(false);

const close = () => {
  showModal.value = false;
  // Emit an event if needed
};
</script>



