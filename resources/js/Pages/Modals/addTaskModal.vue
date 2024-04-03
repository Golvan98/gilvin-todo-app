<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">

          <form @submit.prevent="createTask" class="bg-white w-1/4 h-2/5 flex-nowrap text-gray-600 border border-gray-900 ">
  
           <div class="w-full h-1/2">
            <div id="closeSection" class="w-full flex items-start justify-end"> 
                  <button @click="closeAddTaskModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
            <div class="h-1/2 flex items-end justify-center"> Task Name for project {{ selectedProjectId }} </div>
            <div class="h-1/2 flex items-center justify-center">
                <input v-model="form.name" id="name" type="text" class="w-3/4 h-1/2" placeholder="Task name here">     
            </div>
          
            
           </div>
           

           <div class="w-full h-1/2 bg-inherit">

            <div class="h-1/4 flex items-start justify-center"> Task Status</div>
            <div class="h-1/4 flex items-start justify-center">
                <select v-model="form.status" id="status">
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Complete">Complete</option>   
                </select>
            </div>
            

            <div class="h-1/2 flex items-center justify-center"> 
                <button class="p-1 bg-gray-300"> Create Task </button>
            </div>  

           </div>
          
  
          </form>
          
      </div>
  </template>

  <script setup>
import { useForm } from '@inertiajs/vue3';
import { defineProps, defineEmits, ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

const form = useForm({
    name:null,
    status:null,
    project_id:null
    
    
});

const { selectedProjectId, showAddTaskModal } = defineProps(['selectedProjectId', 'showAddTaskModal']);

const emits = defineEmits(['closeAddTaskModal']);

const createTask = () => {
    // Set the form's project_id to the selectedProjectId
    form.project_id = selectedProjectId;
    // Post the form data
    form.post('createTask');
};
const closeAddTaskModal = () => {
  emits('closeAddTaskModal');
  // Emit an event if needed
};

</script>
