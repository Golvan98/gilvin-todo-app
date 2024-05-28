<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">
        <form id="addProjectModal" @submit.prevent="createProject" class="w-1/4 flex flex-col items-center justify-center text-gray-600 border border-gray-900 bg-white h-3/5">

            <div id="addProjectCloseSection" class="w-full h-10-percent flex items-start justify-end"> 
                  <button @click="closeProjectModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg id="addProjectCloseButton" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
  
               <div id="addProjectlogo" class="w-full h-20-percent flex items-center justify-center text-6xl"> 𝔾ℙ𝕄</div>

               <div id="addProject2ndBlock" class="flex flex-col items-center justify-center h-70-percent w-full">
                      <input type="hidden" name="_token" :value="csrfToken"> <!-- CSRF token field -->

                      <div id="addProjectFormLabel" class="h-20-percent w-full flex justify-center text-3xl items-start whitespace-nowrap"> Create a Project</div>

                      <div id="addProjectNameSection" class="h-30-percent w-full flex flex-col items-center justify-center ">
                          <label for="add_project_name"></label>
                          <input id="add_project_name" v-model="form.project_name" type="text" placeholder="project name" class="w-1/2 rounded-lg h-1/2 flex items-center">
                          <div id="addProjectError" v-if="form.errors.project_name" class="text-xs text-red-500 flex justify-center items-center w-4/5 h-1/2"> {{form.errors.project_name}}</div>
                      </div>

                      <div id="addProjectDescriptionSection" class="h-30-percent w-full flex flex-col items-center justify-center ">
                          <label for="add_project_description"></label>
                          <input id="add_project_description" v-model="form.project_description" type="text" placeholder="project description" class="w-1/2 rounded-lg h-1/2 text-xs">
                          <div id="addProjectError" v-if="form.errors.project_description" class="text-xs text-red-500 flex justify-center items-center w-4/5 h-1/2"> {{form.errors.project_description}}</div>
                      </div>

                      <div id="createProjectButton" class="flex h-20-percent items-center justify-center w-3/4">
                        <button @click="closeProjectModal" class="bg-gray-200 mr-2 h-1/2 w-1/3 rounded-sm p-1 flex items-center justify-center" type="submit mx-2"> Cancel </button>
                          <button id="createProjectButtonConfirm" class="bg-indigo-300 ml-2 h-1/2 w-1/3 rounded-sm whitespace-nowrap px-4 py-1 flex items-center justify-center" type="submit"> Create Project</button>
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
 
};









</script>

<style>

    .h-15-percent{
            height: 15%;
    }

    .h-30-percent{
        height: 30%;
    }


@media screen and (min-width:900px) and (max-width:1199px){
    /* 200% and below */
    #createProjectButton{
        width:100%;
    }


}

@media screen and (min-width: 401px) and (max-width:899px){
   /* 175%-300% */

   #add_project_description, #add_project_name{
        font-size:6px;
    }

    #addProjectFormLabel{
        display:none;
    }

    #addProjectError{
        color:red;
        width:100%;
        font-size:4px;
    }

    #addProjectlogo {
       font-size: 14px;
    }

    #addProjectModal{
        font-size: 4px;
    }
    #addProjectFormLabel, #addProjectDescriptionSection, #addProjectNameSection{
        font-size: 16px;
    }

    #createProjectButton{
        font-size:8px;
        width:100%;
    }

    #createProjectButtonConfirm{
        width:40%;
        color:white;    
    }

   

    #addProjectDescriptionSection input::placeholder, #addProjectNameSection input::placeholder, #createProjectButton input::placeholder {
    font-size: 0.50rem; /* Equivalent to text-lg */
}

}

@media screen and (min-width:401px) and (max-width:480px){
    /* 400 px */

    #add_project_description, #add_project_name{
        font-size:5px;
    }
   
   #addProjectDescriptionSection, #addProjectNameSection{
        font-size: 16px;
    }

    #addProjectFormLabel{
        display:none;
    }

    #createProjectButton{
        font-size:6px;
        width:100%;
    }

    #addProjectlogo {
        font-size:36px;
    }

    #addProjectDescriptionSection input::placeholder, #addProjectNameSection input::placeholder, #createProjectButton input::placeholder {
    font-size: 0.35rem; /* Equivalent to text-lg */
}
}

@media screen and (min-width:0px) and (max-width:400px){
    /* 400 px */
   
   #addProjectDescriptionSection, #addProjectNameSection{
        font-size: 1px;
    }

    #createProjectButton{
        margin-top:6px;
    }

    #addProjectError{
        font-size:2px;
        color:red;
    }

    #addProject2ndBlock{
        height:90%;
    }

    #addProjectCloseButton{
        height:0.75rem;
        width:0.75rem;
    }

  
    
    #add_project_description{
        font-size:3px;
        color:indigo;
        
    }

    #add_project_name{
        font-size:3px;
        color:indigo;
    }

    #addProjectNameSection{
        margin-bottom: 4px;
    }

    #addProjectFormLabel{
        display:none;
    }

    #createProjectButton{
        font-size:5px;
        width:100%;
    }

    #addProjectlogo {
        font-size:26px;
    }

#addProjectDescriptionSection input::placeholder,
    #addProjectNameSection input::placeholder,
    #createProjectButton input::placeholder {
        font-size: .18rem; /* Equivalent to text-lg */ 
    }

    #addProjectError{
        font-size:2px;
      
    }
    #addProjectlogo{
        display:none;
    }

}


</style>