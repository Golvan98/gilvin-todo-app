
<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">

          <form @submit.prevent="deleteProject" class="bg-white w-1/4 h-2/5 flex-nowrap text-gray-600 border border-gray-900 ">
  
           <div class="w-full h-1/2">
            <div id="deleteTaskCloseSection" class="w-full flex items-start justify-end"> 
                  <button @click="closeDeleteProjectModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg id="deleteTaskCloseButton" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
            <div id="deleteTaskWarningMessage" class="h-1/2 flex items-end justify-center"> Are you sure you want to delete this project? </div>
            <div class="h-1/2 flex items-center justify-center">
                <div> Filler for project  {{ projectId }}</div>
            </div>

            <div class="h-1/2 flex items-center justify-center w-full mb-2">

                <div id="deleteTaskButtonsSection" class="w-1/3 h-1/2 flex items-center justify-center"> 
                  <div class="w-full h-full flex items-center justify-center"> 
                    <button type="submit" class="bg-red-300 w-1/2 h-full rounded-sm text-white font-bold"> 
                      Yes 
                    </button> 
                  </div> 
                </div>
              
                <div id="deleteTaskButtonsSection" class="w-1/3 h-1/2  flex items-center justify-center"> 
                    <button @click=" closeDeleteProjectModal"  class="bg-indigo-300 w-1/2 h-full rounded-sm"> 
                      No 
                    </button>
                </div>

            </div>


          
            
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
import { Link, usePage } from '@inertiajs/vue3'
import { watch } from 'vue';
import deleteProjectModal from '@/Pages/Modals/deleteProjectModal.vue'

const props = defineProps ({
    selectedProjectId: Number,
    projectId: Number
});

const form = useForm ({
    project_id:null
})

const emits = defineEmits(['closeDeleteProjectModal']);

const closeDeleteProjectModal = () => {
  emits('closeDeleteProjectModal');
  // Emit an event if needed
};



const closeModal = () => {
  emits('closeDeleteProjectModal');
  // Emit an event if needed
};

    const deleteProject = () => {
    form.project_id = props.projectId;
    form.delete(`deleteProject/${props.projectId}` ,{
    onSuccess: () => {
    closeModal();
    setTimeout(() => {
                // Reload the page after the delay
                location.reload();
            }, 500);
    },
    });
};

</script>

<style>
</style>