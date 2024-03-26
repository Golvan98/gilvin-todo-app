<template>
<div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">
          <form @submit.prevent="createProject" class="w-1/4 flex flex-col items-center justify-center text-gray-600 border border-gray-900 bg-white h-3/5">

              <div id="closeSection" class="w-full h-10-percent flex items-start justify-end"> 
                  <button @click="closeProjectModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
  
              <div id="logo" class="w-full h-20-percent flex items-center justify-center sm:text-xs md:text-2xl lg:text-4xl mb-1"> 𝔾ℙ𝕄</div>

              <div id="2ndBlock" class="w-4/5 flex flex-col items-center justify-center h-70-percent">
                      <input type="hidden" name="_token" :value="csrfToken"> <!-- CSRF token field -->

                      <div id="nameSection" class="h-20-percent my-4">
                          <label for="name"></label>
                          <input id="name" type="text" placeholder="project name" class="lg:p-4 md:p-0.5">
                          <span v-if="form.errors.project_name" class="text-xs text-red-500 flex justify-start w-full"> {{form.errors.project_name}}</span>
                      </div>

                      <div id="emailSection" class="h-20-percent my-4">
                          <label for="email"></label>
                          <input id="email" v-model="form.project_description" type="text" placeholder="email" class="lg:p-4 md:p-0.5">
                          <span v-if="form.errors.project_description" class="text-xs text-red-500 flex justify-start w-full"> {{form.errors.project_description}}</span>
                      </div>

                      <div class="flex h-20-percent items-center justify-center mb-8">
                          <button type="submit"> Create Project</button>
                      </div>
                </div>
  
          </form>
      </div>
</template>


<script setup>

</script>