<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">

          <form @submit.prevent="createTask" class="bg-white w-1/4 h-2/5 flex-nowrap text-gray-600 border border-gray-900 ">
  
           <div class="w-full h-3/5 bg-green-500">
            <div id="closeSection" class="w-full flex h-10-percent items-start justify-end"> 
                  <button @click="closeAddTaskModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
            <div id="formLabel" class="whitespace-nowrap h-45-percent flex items-center  justify-center"> Task Name for project {{ selectedProjectId }} </div>
            <div id="taskForm" class="h-45-percent flex items-center justify-center">
                <input v-model="form.name" id="name" type="text" class="w-3/4 h-1/2" placeholder="Task name here">     
            </div>
        
           </div>
    

           <div class="w-full h-2/5 bg-inherit">

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

<style>

.h-45-percent{
    height:45%;
}

@media screen and (min-width:901px) {
    /* 200% and below if maxwidth:1199px*/
    #formLabel{
    font-size: 18px;
   
    }   
}

@media screen and (min-width: 1px) and (max-width:899px){
   /* 250%-300% */

   #formLabel{
    font-size:11px;
    margin-top:4px;
   }
   #taskForm{
    font-size:4px;
   }

}

@media screen and (min-width:400px) and (max-width:480px){
    /* 400 px */

}

@media screen and (min-width:0px) and (max-width:400px){
    /* 500 px */
   

}


</style>
