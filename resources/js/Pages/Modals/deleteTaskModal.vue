
<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">

          <form @submit.prevent="deleteTask" class="bg-white w-1/4 h-2/5 flex-nowrap text-gray-600 border border-gray-900 ">
  
           <div class="w-full h-1/2">
            <div id="deleteTaskCloseSection" class="w-full flex items-start justify-end"> 
                  <button @click="closeModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg id="deleteTaskCloseButton" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
            <div id="deleteTaskWarningMessage" class="h-1/2 flex items-end justify-center"> Are you sure you want to delete this task? </div>
            <div class="h-1/2 flex items-center justify-center">
                <div> Task: {{ selectedTask.name }} </div>
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
                    <button @click="closeModal" class="bg-indigo-300 w-1/2 h-full rounded-sm"> 
                      No
                    </button>
                </div>

            </div>


          
            
           </div>
           

          </form>
          
      </div>
</template>


<script setup>
import { useForm } from '@inertiajs/vue3';
import { defineProps, defineEmits, ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import { computed } from 'vue'
import { reactive } from 'vue'
import { watch } from 'vue';


const props = defineProps({
  showDeleteTaskModal: Boolean, // Assuming showAddMemberModal is a boolean prop
  selectedTask:Object

});
const form = useForm({
 // task_id: null // Added task_id to the form
});

const emits = defineEmits(['closeDeleteTaskModal']);

const closeModal = () => {
  emits('closeDeleteTaskModal');
  // Emit an event if needed
};


const deleteTask = () => {
  form.task_id = props.selectedTask.id;
  form.delete(`deleteTask/${props.selectedTask.id}`, {
    onSuccess: () => {
      closeModal();
      setTimeout(() => {
                // Reload the page after the delay
                location.reload();
            }, 500);
    },
  });
};

window.addEventListener('load', () => {
  const flashMessage = $inertia.page.props.value.flash;

  if (flashMessage && flashMessage.success) {
    // Display the customized message
    alert("Bonjour");
  }
});


</script>

<style>

.mx-25-pct {
    margin-right: 25%;
    margin-left: 25%
  }




@media screen and (min-width:1px) and (max-width:500px)
{

  #deleteTaskButtonsSection{
    margin-bottom:12px;
    
  }

  #deleteTaskWarningMessage{
    font-size:4px;
  }
  #deleteTaskCloseButton{
  height: 0.75rem;
  width:0.75rem;
}


}


@media screen and (min-width:501px) {
  /* 1%-200% */

  #logo{
  font-size:24px;
  font-weight: bold;

  }


}



</style>