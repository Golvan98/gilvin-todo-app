<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">

          <form @submit.prevent="editTask" class="bg-white w-1/4 h-2/5 flex-nowrap text-gray-600 border border-gray-900 ">
  
           <div class="w-full h-1/2">
            <div id="closeSection" class="w-full flex items-start justify-end"> 
                  <button @click="closeModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
            <div class="h-1/2 flex items-end justify-center"> Task  </div>
            <div class="h-1/2 flex items-center justify-center">
                 
                <input v-model="form.name" id="name" type="text" class="w-3/4 h-1/2" :placeholder="selectedTask.name">

            </div>
          
            
           </div>
           

           <div class="w-full h-1/2 bg-inherit">

            <div class="h-1/4 flex items-start justify-center"> Task Status {{ selectedTask.status }}</div>
            <div class="h-1/4 flex items-start justify-center">
                <select v-model="form.status" id="status">
                    <option value="Pending" selected>Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Complete">Complete</option>   
                </select>
            </div>

            <input type="hidden" v-model="form.task_id" id="task_id">
            

            <div class="h-1/2 flex items-center justify-center"> 
                <button class="p-1 bg-gray-300" type="submit"> Edit  Task </button>
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
    task_id:null
});

const props = defineProps({
  showEditTaskModal: Boolean, // Assuming showAddMemberModal is a boolean prop
  selectedTask:Object
});


const emits = defineEmits(['closeEditTaskModal']);

const closeModal = () => {
  emits('closeEditTaskModal');
  // Emit an event if needed
};



const editTask = () => {
    form.task_id = props.selectedTask.id; // Corrected line
    form.post('editTask');
}



</script>