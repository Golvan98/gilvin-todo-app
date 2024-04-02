<template>
<div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">
          <form @submit.prevent="editProject" class="w-1/4 flex flex-col items-center justify-center text-gray-600 border border-gray-900 bg-white h-3/5">

              <div id="closeSection" class="w-full h-10-percent flex items-start justify-end"> 
                  <button @click="closeModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
  
              <div  id="logo" class="w-full h-20-percent flex items-center justify-center sm:text-xs md:text-2xl lg:text-4xl mb-1"> 𝔾ℙ𝕄  {{ projectName}} {{ projectId }}</div>
              
              <div id="2ndBlock" class="w-4/5 flex flex-col items-center justify-center h-70-percent">
                      <input type="hidden" name="_token" :value="csrfToken"> <!-- CSRF token field -->

                      <div id="nameSection" class="h-20-percent my-4">
                          <label for="project_name"> </label>
                          <input v-model="form.project_name" id="project_name" type="text" :placeholder="projectName" class="lg:p-4 md:p-0.5">
           </div>

                      <div id="description" class="h-20-percent my-4">
                          <label for="project_description"></label>
                          <input v-model="form.project_description" id="project_description" type="text" placeholder="email" class="lg:p-4 md:p-0.5">
                      </div>

                      <div class="flex w-full h-20-percent items-center justify-between mb-8 ">
                          <div class="w-1/2"> 
                            <button class="w-1/2" type="submit"> Edit Project </button>
                          </div>

                          <div class="w-1/2" type="delete"> 
                          
                            <a href="/deleteProject"> Delete </a>
                          </div>
                      </div>

                      

                      <input type="hidden" v-model="form.project_id" id="project_id">
                </div>
  
          </form>
</div>
</template>


<script setup>
const csrfToken = '{{ csrf_token() }}'; 
import { defineProps, defineEmits  } from 'vue';
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'
import { computed } from 'vue'
import { reactive } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { watch } from 'vue';

const page = usePage()

const form = useForm ({
    project_name:null,
    project_description:null,
    project_id:null 
})

const editProject = () => {
    form.project_id = projectId;
    form.post('editProject');
}

const props = defineProps({
  showEditProjectModal: Boolean, // Assuming showAddMemberModal is a boolean prop
  projects:Object,
  currentProjectInfo:Object,
  selectedProjectId:Number
});

const { currentProjectInfo } = props;

const projectName = currentProjectInfo?.project_name;
const projectId = currentProjectInfo?.id

const emits = defineEmits(['closeEditProjectModal']);

const closeEditProjectModal = () => {
  emits('closeEditProjectModal');
  // Emit an event if needed
};

const closeModal = () => {
  emits('closeEditProjectModal');
  // Emit an event if needed
};

</script>

<style>
#closeSection button,
[type="delete"] {
  cursor: pointer; /* Set cursor to pointer for clickable elements */
}

/* Add this CSS to explicitly set cursor to default for non-clickable elements */
#logo,
#2ndBlock,
#nameSection,
#description {
  cursor: default;
}
</style>