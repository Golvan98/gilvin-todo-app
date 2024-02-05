<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">
          <div class="bg-white w-1/4 h-1/2 flex flex-col items-center justify-center text-gray-600 border border-gray-900 ">
              <div id="closeSection" class="w-full h-10-percent flex items-start justify-end"> 
                  <button @click="closeRegModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
  
              <div class="w-full h-20-percent flex items-center justify-center sm:text-xs md:text-md lg:text-4xl"> 𝔾ℙ𝕄</div>
             <div id="2ndBlock" class="w-4/5 h-70-percent flex flex-col items-center justify-center">
              
      
              <input id="user" type="text" placeholder="username" class="bg-gray-300 w-4/5 h-10-percent py-4 mx-auto text-xs"> 
  
              
              <input id="password" type="password" placeholder="password" class="bg-gray-300 w-4/5 h-10-percent py-4 mx-auto mt-3 mb-2 text-xs"> 
  
              <div class="w-4/5 flex items-center justify-center mt-1 mb-4"> Register  </div>
              <div class=" flex items-center justify-center"> Register </div>
  
             </div>
  
          </div>
      </div>
  </template>
  
  
  
  <script setup>
  import { defineProps, defineEmits  } from 'vue';
  import { ref } from 'vue'
  
  const showModal = defineProps(['showRegisterModal']);
  const emits = defineEmits(['closeRegisterModal']);
  
  
  const closeRegModal = () => {
    emits('closeRegisterModal');
    // Emit an event if needed
  };
  
  //<button @click="close" class="">Close Content</button>
  
  </script> 
  
  <style>
      .h-10-percent{
          height: 10%;
      }
  
      .h-70-percent{
          height: 70%;
      }
  
      .h-20-percent{
          height: 20%;
      }
  </style>