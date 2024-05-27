<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">

          <form id="editTaskForm" @submit.prevent="editTask" class="bg-white w-1/4 h-1/2 flex-nowrap text-gray-600 border border-gray-900 ">
  
           
            <div id="editTaskCloseSection"  class="w-full h-10-percent flex items-start justify-end"> 
                  <button @click="closeModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg id="editTaskCloseButton" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
            </div>

            <div id="editTaskNameSection" class="h-35-percent flex flex-col items-center justify-center"> 

                <div id="editTaskNameLabel" class="w-full h-2/5 flex items-center justify-center font-bold"> 
                   Edit Task Name
                </div>          

                <div class="w-full h-3/5 flex items-start justify-center"> 
                    <input v-model="form.name" id="editTaskName" type="text" class="w-3/4 h-1/2" :placeholder="selectedTask.name"/>
                </div>
        
            </div>            
           
           

           <div id="editTaskStatusSection" class="w-full h-35-percent bg-inherit bg-white">

                <div id="editTaskStatusLabel" class="h-2/5 flex items-start justify-center font-bold"> 
                    Task Status {{ selectedTask.status }}
                </div>

                <div id="editTaskStatus" class="h-1/4 flex items-start justify-center">
                    <select class="h-full w-3/4" v-model="form.status" id="status" >
                        <option value="Pending" selected>Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Complete">Complete</option>   
                    </select>
                </div>

                <input type="hidden" v-model="form.task_id" id="task_id"/>
             
            </div>   

            <div id="editTaskButtonSection" class="h-20-percent flex items-center justify-center  "> 
               <div id="editTaskButtonSection2" class="flex justify-between w-5/6 h-3/5">
                <button id="editTaskEditButton" class="w-1/5 h-full bg-indigo-300 rounded-sm" type="submit"> Edit  Task </button>
                <button id="editTaskDeleteButton" @click="selectTaskAndOpenDeleteTaskModal(task)" class="w-1/5 h-full bg-red-300 rounded-sm"> Delete  Task </button>
                <deleteTaskModal v-if="showDeleteTaskModal" :showDeleteTaskModal="showDeleteTaskModal" @closeDeleteTaskModal="showDeleteTaskModal = false" :selectedTask="selectedTask"> </deleteTaskModal>
               </div>   
            </div>  

          
  
          </form>
          
      </div>
  </template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { defineProps, defineEmits, ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3'
import deleteTaskModal from '@/Pages/Modals/deleteTaskModal.vue'
const showDeleteTaskModal = ref(false);

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



const selectTaskAndOpenDeleteTaskModal = (taskInfo) => {
  props.selectedTask = taskInfo
  showDeleteTaskModal.value = true;
}

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

<style>
.h-35-percent{
    height:35%;
}

.h-30-percent{
    height:30%;
}

.h-20-percent{
    height:20%;
}
.h-10-percent{
      height: 10%;
  }


@media screen and (min-width: 900px){

 #editTaskForm{
    font-size:16px;
 }



 #editTaskEditButton {
width: 25%
}

#editTaskButtonSection{
font-size:10px;
font-weight: bold;
}
 
}

@media screen and (min-width: 1360px) and (max-width:9999999px)
{
    #editTaskEditButton, #editTaskDeleteButton{
    font-size: 16px;
 }
}


@media screen and (min-width: 1px) and (max-width:500px)
{
    #editTaskName{
      
        font-size:8px;
    }
    #status{
    
        font-size:8px;
    }

    #editTaskButtonSection{
        font-size:3px;
    }

    #editTaskCloseButton{
        height:0.75rem;
        width: 0.75rem;
        
    }

    #editTaskNameSection{
        margin-bottom: 2px;;
    }

}


</style>