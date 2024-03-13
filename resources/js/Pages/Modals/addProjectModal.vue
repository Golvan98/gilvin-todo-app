<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">
          <form @submit.prevent="login" class="bg-white w-1/4 h-2/5 flex flex-col items-center justify-center text-gray-600 border border-gray-900 ">
  
              <div id="closeSection" class="w-full h-20-percent flex items-start justify-end"> 
                  <button @click="closeAddProjectModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
  
              <div class="w-full h-10-percent flex items-center justify-center sm:text-xs md:text-md lg:text-4xl mb-4"> 𝔾ℙ𝕄</div>
             <div id="2ndBlock" class="w-4/5 h-70-percent flex flex-col items-center justify-center">
              
              <input id="email" type="text" placeholder="email@example.com" class="bg-gray-300 w-4/5 h-10-percent py-4 mx-auto text-xs"> 
              
              
              <input id="password" type="password" placeholder="password" class="bg-gray-300 w-4/5 h-10-percent py-4 mx-auto mt-3 mb-2 text-xs"> 
            

              <div class="w-4/5 flex items-center justify-center mt-1 mb-4"> <button type="submit"> Login </button> </div>
             
  
             </div>
  
          </form>
      </div>
  </template>

  <script setup>



const showAddProjectModal = defineProps(['showAddProjectModal']);
const emits = defineEmits(['closeAddProjectModal']);


const closeAddProjectModal = () => {
  emits('closeAddProjectModal');
  // Emit an event if needed
};
</script>