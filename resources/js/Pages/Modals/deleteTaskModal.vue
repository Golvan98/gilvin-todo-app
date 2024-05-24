
<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">

          <form @submit.prevent="destroyTask" class="bg-white w-1/4 h-2/5 flex-nowrap text-gray-600 border border-gray-900 ">
  
           <div class="w-full h-1/2">
            <div id="deleteTaskCloseSection" class="w-full flex items-start justify-end"> 
                  <button @click="closeModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
            <div class="h-1/2 flex items-end justify-center"> Are you sure you want to delete this task? </div>
            <div class="h-1/2 flex items-center justify-center">
                <div> Task: {{ selectedTask.name }} </div>
            </div>

            <div class="h-1/2 flex items-center justify-center w-full mb-2">

                <div class="w-1/3 h-1/2 flex items-center justify-center"> 
                  <Link :href="`/deleteTask/${selectedTask.id}`" class="w-full h-full flex items-center justify-center"> 
                    <button class="bg-red-300 w-1/2 h-full rounded-sm text-white font-bold"> 
                      Yes 
                    </button> 
                  </Link> 
                </div>
              
                <div class="w-1/3 h-1/2  flex items-center justify-center"> 
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


const props = defineProps({
  showDeleteTaskModal: Boolean, // Assuming showAddMemberModal is a boolean prop
  selectedTask:Object

});

const emits = defineEmits(['closeDeleteTaskModal']);

const closeModal = () => {
  emits('closeDeleteTaskModal');
  // Emit an event if needed
};


</script>

<style>

.mx-25-pct {
    margin-right: 25%;
    margin-left: 25%
  }


@media screen and (min-width:1px) {
  /* 1%-200% */

  #logo{
  font-size:24px;
  font-weight: bold;

  }


}




</style>