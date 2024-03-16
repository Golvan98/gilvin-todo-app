<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">

          <form @submit.prevent="createTask" class="bg-white w-1/4 h-2/5 flex-nowrap text-gray-600 border border-gray-900 ">
  
           <div class="w-full h-1/2">
            
            <div class="h-1/2 flex items-end justify-center"> Task Name</div>
            <div class="h-1/2 flex items-center justify-center">
                <input type="text" class="w-3/4 h-1/2" placeholder="Task name here">     
            </div>

           </div>
           

           <div class="w-full h-1/2 bg-inherit">

            <div class="h-1/4 flex items-start justify-center"> Task Status</div>
            <div class="h-1/4 flex items-start justify-center">
                <select>
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
    status:null
});

const showAddProjectModal = defineProps(['showAddProjectModal']);
const emits = defineEmits(['closeAddProjectModal']);




const createTask = () => form.post('createTask');
const closeAddProjectModal = () => {
  emits('closeAddProjectModal');
  // Emit an event if needed
};

</script>
