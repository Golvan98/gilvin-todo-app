<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">

          <form @submit.prevent="createTask" class="bg-white w-1/4 h-2/5 flex-nowrap text-gray-600 border border-gray-900 ">
  
           <div class="w-full h-3/5">

                <div id="addTaskCloseSection" class="w-full flex h-10-percent items-start justify-end"> 
                    <button @click="closeAddTaskModal" class=" text-black hover:text-red-400 focus:outline-none">
                        <svg class="h-6 w-6" id="addTaskCloseButton" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                        </svg>
                    </button>
                </div>
                <div id="addTaskFormLabel" class="whitespace-nowrap h-45-percent flex items-center  justify-center"> Add a task for project {{ selectedProjectId }} </div>
                <div id="addTaskNameForm" class="h-45-percent flex items-start justify-center">
                    <input v-model="form.name" id="addTaskName" type="text" class="w-3/4 h-1/2" placeholder="Task name here">     
                </div>
        
           </div>
    

           <div class="w-full h-2/5 bg-inherit flex items-center justify-center flex-col">

                <div id="addTaskSelectStatusLabel" class="h-1/3 w-full flex items-center justify-center"> Task Status</div>
              
                <select v-model="form.status" type="text"  placeholder="Project Name" id="addTaskFormStatus" class="h-1/3 w-3/4 flex items-start justify-center">
                    <option id="option1" value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Complete">Complete</option>   
                </select>
               
                <div class="h-1/2 w-full flex items-center justify-center"> 
                    <button id="createTaskButton" class="bg-indigo-300 w-1/3 h-1/2 text-white whitespace-nowrap flex items-center justify-center"> Create Task </button>
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

@media screen and (min-width:900px) {
    /* 150% to 0% */
    #addTaskFormLabel,#addTaskNameForm,#addTaskSelectStatusLabel,#selectStatus{
    font-size: 20px;

    }   
    #addTaskFormStatus{
        font-size:16px;
    }
}

@media screen and (min-width:600px) and (max-width:899px){
    /* 175 - 250% */
    #addTaskFormLabel,#addTaskNameForm,#addTaskSelectStatusLabel,#selectStatus{
    font-size: 10px;
        
    }   
    #addTaskFormLabel{
        margin-top:4px;
    }

    #addTaskFormStatus {
    font-size: 8px; /* Adjust the font size to your preference */
}

/* Style the options within the select element */
}

@media screen and (min-width:481px) and (max-width:599px){
    #addTaskFormLabel,#addTaskNameForm,#addTaskSelectStatusLabel,#selectStatus{
    font-size: 7px;
    }   

    #addTaskFormStatus{
        font-size:8px;
    }
    #addTaskName{
        font-size:8px;
    }
}

@media screen and (min-width:1px) and (max-width:480px){
    
    #addTaskFormLabel,#addTaskNameForm,#addTaskSelectStatusLabel,#selectStatus{
    font-size: 7px;
    }   

    #addTaskSelectStatusLabel{
        display:none;
    }

    #addTaskFormStatus{
        font-size:4px;
    }
    #addTaskName{
        font-size:4px;
    }

    #addTaskCloseButton{
        width: 0.75rem;
        height: 0.75rem;
    }
}


</style>
