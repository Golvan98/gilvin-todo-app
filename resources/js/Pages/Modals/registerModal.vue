<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">
          <form @submit.prevent="register" class="w-1/4 flex flex-col items-center justify-center text-gray-600 border border-gray-900 bg-white h-2/5">
              <div id="closeSection" class="w-full h-20-percent flex items-start justify-end"> 
                  <button @click="closeRegModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
  
              <div id="logo" class="w-full h-10-percent flex items-center justify-center sm:text-xs md:text-md lg:text-2xl mb-1"> 𝔾ℙ𝕄</div>
             <div id="2ndBlock" class="w-4/5 flex flex-col items-center justify-center h-full">
              
              <input type="hidden" name="_token" :value="csrfToken"> <!-- CSRF token field -->
              
              <label for="name"></label><input id="name" v-model="form.name" type="text" placeholder="name" class="bg-gray-300 w-4/5 mb-2 h-10-percent mx-auto text-xs lg:py-4 md:py-0.5 sm:py-0.5"> 
              <div v-if="form.errors.name" class="text-xs text-red-500 flex justify-start w-4/5"> {{form.errors.name}}</div>

              <label for="email"></label><input id="email" v-model="form.email" type="text" placeholder="email" class="bg-gray-300 w-4/5 mb-2 h-10-percent mx-auto text-xs lg:py-4 md:py-0.5 sm:py-0.5"> 
              <div v-if="form.errors.email" class="text-xs text-red-500 flex justify-start w-4/5"> {{form.errors.email}}</div>

              <label for="password"></label><input id="password" v-model="form.password" type="text" placeholder="password" class="bg-gray-300 w-4/5 h-10-percent mx-auto mb-2 text-xs lg:py-4 md:py-0.5 sm:py-0.5"> 
              <div v-if="form.errors.password" class="text-xs text-red-500 flex justify-start w-4/5"> {{form.errors.password}}</div>

              <div class="flex items-center justify-center mb-8"> <button type="submit"> Register </button> </div>
  
             
             </div>
  
            </form>
      </div>
</template>

<script setup>
import { defineProps, defineEmits  } from 'vue';
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'
import { computed } from 'vue'
import { reactive } from 'vue'


const form = useForm(
{
  name:null,
  email:null,
  password:null,
})

const csrfToken = '{{ csrf_token() }}'; // CSRF token value

//const login = () => form.post('register')
const register = async () => {
 // Wait for the registration request to complete
 form.post('register');
  if (!form.errors.any()) {
    // Close the registration modal by setting showRegisterModal to false
    closeRegModal();
  }
  else{
    window.location.reload();
  }
};

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

  @media screen and (min-width: 768px)
  {
 
  }

  
  @media screen and (min-width: 100px) {
   
  }

</style>
