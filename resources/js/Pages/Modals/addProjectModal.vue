<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">
        <form id="addProjectModal" @submit.prevent="createProject" class="w-1/4 flex flex-col items-center justify-center text-gray-600 border border-gray-900 bg-white h-3/5">

            <div id="closeSection" class="w-full h-10-percent flex items-start justify-end"> 
                  <button @click="closeProjectModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
  
               <div id="logo" class="w-full h-20-percent flex items-center justify-center text-6xl"> 𝔾ℙ𝕄</div>

               <div id="2ndBlock" class="flex flex-col items-center justify-center h-70-percent w-full">
                      <input type="hidden" name="_token" :value="csrfToken"> <!-- CSRF token field -->

                      <div id="formLabel" class="h-20-percent w-full flex justify-center text-3xl items-start whitespace-nowrap"> Create a Project</div>

                      <div id="nameSection" class="h-20-percent w-full flex justify-center">
                          <label for="name"></label>
                          <input id="project_name" v-model="form.project_name" type="text" placeholder="project name" class="w-1/2 rounded-lg h-3/4">
                          <div v-if="form.errors.project_name" class="text-xs flex justify-start w-1/2"> {{form.errors.project_name}}</div>
                      </div>

                      <div id="emailSection" class="h-20-percent w-full flex justify-center ">
                          <label for="project_description"></label>
                          <input id="project_description" v-model="form.project_description" type="text" placeholder="project description" class="w-1/2 rounded-lg h-3/4 text-xs">
                          <span v-if="form.errors.project_description" class="text-xs text-red-500 flex justify-start"> {{form.errors.project_description}}</span>
                      </div>

                      <div id="createProjectButton" class="flex h-20-percent items-center justify-center w-3/4">
                        <button @click="closeProjectModal" class="bg-gray-200 mr-2 h-1/2 w-1/3 rounded-sm p-1 flex items-center justify-center" type="submit mx-2"> Cancel </button>
                          <button class="bg-indigo-300 ml-2 h-1/2 w-1/3 rounded-sm whitespace-nowrap px-4 py-1 flex items-center justify-center" type="submit"> Create Project</button>
                </div>
            </div>
  
        </form>
    </div>
</template>


<script setup>
import { defineProps, defineEmits  } from 'vue';
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'
import { computed ,  } from 'vue'
import { reactive } from 'vue'


const form = useForm(
{
  project_name:null,
  project_description:null,

})

const csrfToken = '{{ csrf_token() }}'; // CSRF token value

const showModal = defineProps(['showAddProjectModal']);
const emits = defineEmits(['closeAddProjectModal']);


const closeProjectModal = () => {
  emits('closeAddProjectModal');
  // Emit an event if needed
};

//const login = () => form.post('register')
const createProject = () => {
  form.post('createProject');
  window.location.reload();
};









</script>

<style>

@media screen and (min-width:901px) and (max-width:1199px){
    /* 200% and below */
    #createProjectButton{
       
        width:100%;
    }

}

@media screen and (min-width: 1px) and (max-width:899px){
   /* 250%-300% */

   #project_description, #project_name{
        font-size:6px;
    }

    #addProjectModal{
        font-size: 4px;
    }
    #formLabel, #emailSection, #nameSection{
        font-size: 16px;
    }

    #createProjectButton{
        font-size:8px;
        width:100%;
    }

    #logo {
        font-size:54px;
    }

    #emailSection input::placeholder, #nameSection input::placeholder, #createProjectButton input::placeholder {
    font-size: 0.50rem; /* Equivalent to text-lg */
}

}

@media screen and (min-width:400px) and (max-width:480px){
    /* 400 px */

    #project_description, #project_name{
        font-size:5px;
    }
   
   #emailSection, #nameSection{
        font-size: 16px;
    }

    #formLabel{
        display:none;
    }

    #createProjectButton{
        font-size:6px;
        width:100%;
    }

    #logo {
        font-size:36px;
    }

    #emailSection input::placeholder, #nameSection input::placeholder, #createProjectButton input::placeholder {
    font-size: 0.35rem; /* Equivalent to text-lg */
}
}

@media screen and (min-width:0px) and (max-width:400px){
    /* 400 px */
   
   #emailSection, #nameSection{
        
        font-size: 1px;
    }

    #project_description{
        font-size:3px;
        color:indigo;
    }

    #project_name{
        font-size:3px;
        color:indigo;
    }

    #nameSection{
        margin-bottom: 4px;
    }

    #formLabel{
        display:none;
    }

    #createProjectButton{
        font-size:5px;
        width:100%;
    }

    #logo {
        font-size:26px;
    }

#emailSection input::placeholder,
    #nameSection input::placeholder,
    #createProjectButton input::placeholder {
        font-size: .18rem; /* Equivalent to text-lg */ 
    }
}


</style>