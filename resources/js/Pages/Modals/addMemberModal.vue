<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">

        <form @submit.prevent="addMember" class="bg-white w-1/4 h-2/5 flex flex-col items-center justify-center text-gray-600 border border-gray-900 ">
    
            <div id="closeSection" class="w-full h-20-percent flex items-start justify-end"> 
                <button @click="closeAddMemberModal" class=" text-black hover:text-red-400 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                    </svg>
                </button>
            </div>

            <div id="addMemberlogo" class="w-full h-1/5 flex items-center justify-center sm:text-xs md:text-md lg:text-4xl mb-4"> 𝔾ℙ𝕄  </div>

            <div id="dropDown" class="w-4/5 h-3/5 flex flex-col items-center justify-center">
        

                <div id="addMemberLabel" class="h-1/4"> Add Member to Project {{ selectedProjectName }}</div>

                <select v-model="form.user_id" id="user_id" type="text" placeholder="Project Name" class="bg-gray-300 w-4/5 h-1/4 mx-auto text-xs"> 
                <option id="user_id" v-for="user in nonProjectMembers()" :value="user.id"> {{user.name}} </option>   
                </select>

                <input type="hidden" v-model="form.project_id" id="project_id">
                
                <div id="addMemberConfirmButton" class="w-3/5 whitespace-nowrap flex items-center justify-center mt-1 mb-4 h-1/4 bg-indigo-300 text-white"> <button class="addMemberConfirmButton2" type="submit"> Add Member </button> </div>
            
            </div>

        </form>

    </div>
</template>


<script setup>
const csrfToken = '{{ csrf_token() }}'; 
import { defineProps, defineEmits  } from 'vue';
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'
import { computed } from 'vue'
import { reactive } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { watch } from 'vue';
const page = usePage()


const props = defineProps({
  users: Object,
  showAddMemberModal: Boolean, // Assuming showAddMemberModal is a boolean prop
  nonProjectMembers:Object,
  selectedProjectId:Number,
  selectedProjectName:Object
});
const form = useForm ({
    user_id:null,
    project_id:props.selectedProjectId 
})

if (props.selectedProjectId) {
  watch(() => props.selectedProjectId, (newValue) => {
    form.project_id = newValue;
  });
}



const addMember = () => form.post('addMember');




const emits = defineEmits(['closeAddMemberModal']);
const closeAddMemberModal = () => {
  emits('closeAddMemberModal');
  // Emit an event if needed
};

const closeModal = () => {
  emits('closeAddMemberModal');
  // Emit an event if needed
};

</script>

<style>

@media screen and (min-width:901px){
  #addMemberlogo {

    font-size:72px;

  }

  #addMemberConfirmButton{
    padding-left:24px;
    padding-right:24px;
    font-size:16px;
  }

  #addMemberLabel{
    font-size:12px;
  }
}

@media screen and (max-width:900px){
  
  
  #user_id{ 
    height:1%;
    font-size: 4px;
  }


  #addMemberConfirmButton{
    padding-top: 2px;
    padding-bottom: 2px;
  }
  #addMemberLabel{
    display:none;
  }

}

</style>