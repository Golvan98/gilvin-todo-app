<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">

          <form @submit.prevent="removeMember" class="bg-white w-1/4 h-2/5 flex-nowrap text-gray-600 border border-gray-900 ">
  
           <div class="w-full h-1/2">
            <div id="removeMemberCloseSection" class="w-full flex items-start justify-end"> 
                  <button @click="closeModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg id="removeMemberCloseButton" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
            <div class="h-1/2 flex items-end justify-center"> Are you sure you want to remove {{ selectedMember.name }} from this project?  </div>
            <div class="h-1/2 flex items-center justify-center">
                <div> Task:  </div>
            </div>


             <div class="h-1/2 flex items-start justify-center w-full">

                <div class="w-1/3 h-1/2 flex items-center justify-center"> 
                    <button type="submit" class="bg-red-300 w-1/2 h-full rounded-sm text-white font-bold"> 
                        <input type="hidden" v-model="form.project_id" id="project_id">
                         <input type="hidden" v-model="form.member_id" id="member_id">
                      Yes 
                    </button> 
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

const form = useForm ({
    member_id:null,
    project_id:null
})

const removeMember = () => {
    form.project_id=props.selectedProjectId
    form.member_id=props.selectedMember.id
    form.post('/removeMember');
}


const props = defineProps ({
    showRemoveMemberModal:Boolean,
    selectedMember:Object,
    selectedProjectId:Number,
})

const emits = defineEmits(['closeRemoveMemberModal']);

const closeModal = () => {
    emits('closeRemoveMemberModal')
}


/*const emits = defineEmits(['closeDeleteTaskModal']);

const closeModal = () => {
  emits('closeDeleteTaskModal');
  // Emit an event if needed
}; */


</script>

<style>
@media screen and (max-width:500px)
{
    
    #removeMemberCloseButton {
        height:0.75rem;
        width: 0.75rem;
    }
}





</style>

