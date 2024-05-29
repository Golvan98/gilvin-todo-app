<template>
<div id="allOfEditProjectModal"  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">
          <form @submit.prevent="editProject" class="w-1/4 flex flex-col items-center justify-center text-gray-600 border border-gray-900 bg-white h-3/5">

              <div id="editProjectCloseSection" class="w-full h-10-percent flex items-start justify-end"> 
                  <button @click="closeModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg id="editProjectCloseButton" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
  
              <div  id="editProjectLogo" class="w-full h-20-percent flex items-center justify-center sm:text-xs md:text-2xl mb-1"> 
                project {{ projectName}} {{ projectId }} 
              </div>
              
              <div id="editProject2ndBlock" class="w-4/5 flex flex-col items-center justify-center h-70-percent">
                      <input type="hidden" name="_token" :value="csrfToken"> <!-- CSRF token field -->

                      <div id="editProjectNameSection" class="h-30-percent flex flex-col items-center justify-center w-3/4 whitespace-nowrap">
                          <label for="editProjectName"> </label>
                          <input class="w-full h-1/2" v-model="form.project_name" id="editProjectName" type="text" :placeholder="projectName">
                          <div id="editProjectError" v-if="form.errors.project_name" class="text-xs text-red-500 flex justify-center items-center w-full h-1/2"> {{form.errors.project_name}}</div>
                    
                      </div>

                      <div id="description" class="h-30-percent flex flex-col items-center justify-center w-3/4">
                          <label for="editProjectProjectDescription"></label>
                          <input class="w-full h-1/2" v-model="form.project_description" id="editProjectProjectDescription" type="text" :placeholder="projectDescription">
                          <div id="editProjectError" v-if="form.errors.project_description" class="whitespace-nowrap text-xs text-red-500 flex justify-center items-center w-full h-1/2"> {{form.errors.project_description}}</div>
                    
                        </div>

                      <div id="editProjectButtonSection" class="flex w-4/5 h-10-percent items-center justify-center mb-8 space-x-2 ">

                          <div class="w-1/2 h-full bg-indigo-300 flex items-center justify-center rounded-sm"> 
                            <button id="editProjectEditButton" class="rounded-sm w-1/2 flex items-center justify-center h-1/2 whitespace-nowrap " type="submit"> Edit Project </button>
                          </div>


                          <a class="w-1/2 h-full bg-red-400 text-white flex items-center justify-center rounded-sm" :href="`/deleteProject/${projectId}`" @click="reloadPage"> 
                            <button id="editProjectDeleteButton" class="rounded-sm w-1/2 flex items-center justify-center h-1/2 whitespace-nowrap" > 
                               Delete
                            </button>
                          </a>

                      </div>

                      <input type="hidden" v-model="form.project_id" id="project_id">
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

const form = useForm ({
    project_name:null,
    project_description:null,
    project_id:null 
})



const props = defineProps({
  showEditProjectModal: Boolean, // Assuming showAddMemberModal is a boolean prop
  projects:Object,
  currentProjectInfo:Object,
  selectedProjectId:Number,
  projectId:Number
});

const { currentProjectInfo } = props;

const projectName = currentProjectInfo?.project_name;
const projectId = currentProjectInfo?.id
const projectDescription = currentProjectInfo?.project_description

const emits = defineEmits(['closeEditProjectModal']);

const closeEditProjectModal = () => {
  emits('closeEditProjectModal');
  // Emit an event if needed
};

const closeModal = () => {
  emits('closeEditProjectModal');
  // Emit an event if needed
};


/*const editProject = () => {
    form.project_id = projectId;
    form.post('editProject');
} */

const editProject = () => {
  form.project_id = projectId;
  form.post('editProject', {
    onSuccess: () => {
      if (!Object.keys(form.errors).length) {
        closeEditProjectModal();
       // This line will refresh the page
      }
    },
  });
}

const reloadPage = () => {
  // Navigate to the current page again, triggering a reload
  window.location.reload();
};















</script>

<style>
#editProjectCloseSection button,
[type="delete"] {
  cursor: pointer; /* Set cursor to pointer for clickable elements */
}

/* Add this CSS to explicitly set cursor to default for non-clickable elements */
#editProjectLogo,
#editProject2ndBlock,
#editProjectNameSection,
#description {
  cursor: default;
}

.h-30-percent{
      height: 30%;
  }


@media screen and (min-width:900px) {
  /* 1%-200% */

  #editProjectLogo{
  font-size:24px;
  font-weight: bold;

  }

  #editProjectError{
    font-size:9px;
    margin-top: 4px;
    color:red;
  }

}

@media screen and (min-width:600px) and (max-width: 899px) {
  /* 1%-250% */
#allOfEditProjectModal{
  color:white;

}
  #editProjectLogo{
    font-size:12px;
    font-weight: bold;
  }

  #editProjectError{
    font-size:5.5px;
    margin-top: 4px;
    margin-bottom: 4px;
    min-height:16px;
    color:red;
  }

}

@media screen and (min-width: 460px) and (max-width: 599px){
  /*300% */
  #allOfEditProjectModal{
  color:white;
  
}

#editProject2ndBlock{
  height:90%;
}
  #editProjectName {
    margin-top: 24px;
  
  }

  #editProjectNameSection {
    margin-bottom: 12px;
  }

  #editProjectLogo{
    display:none;
  }

  #editProjectEditButton, #editProjectDeleteButton{
    padding-top:4px;
    padding-bottom: 4px;
  }

  #editProjectError{
    font-size:4px;
    min-height:16px;
    color:red;
  }

 
}

@media screen and (min-width: 1px) and (max-width: 459px){
  /*500% */

  #editProjectError{
    font-size:2.9px;
    min-height:16px;
    color:red;
  }

  #allOfEditProjectModal{
  color:white;
}

  #editProjectLogo{
    display:none;
  }

#editProjectName {
    margin-top: 24px;
  }

  #editProjectProjectDescription{
    margin-top:12px;
  }

#editProjectNameSection {
    margin-bottom: 16px;
  }

#editProjectLogo{
    display:none;
  }


  #editProjectButtonSection{
    margin-top:16px;
  }

  
  #editProjectCloseSection{
    margin-bottom:24px;
  }

  #editProjectCloseButton{
    height: 0.75rem;
    width:0.75rem;
    margin-top:2px;
  }


}




</style>