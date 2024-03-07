<template>

<MainLayout>



<div id="firstBlock" class="bg-white flex items-center justify-center mx-auto mr-5-pct ml-5-pct w-full h-full">

 <div id="secondBlock" class="bg-inherit h-full w-full grid grid-cols-5 grid-rows-6 text-white">


    <div id="projectNavBarContainer" class="col-start-2 col-end-5 bg-inherit row-start-1 grid grid-cols-6 mt-2 row-span-1">

        <div id="projectNavBar" class="bg-indigo-300 col-start-2 col-end-6 rounded-lg mb-2">
            
        </div>       
        
    </div>

    <div id="toDoRow" class="row-start-2 row-span-5 col-start-2 bg-indigo-300 rounded-sm overflow-y-auto">

     <div v-for="project in projects" :key="projects.id" class="h-1/5 w-3/4 bg-white text-black mx-auto mt-2 rounded-lg">
        <button @click="selectProject(project.id)" :class="{ 'bg-green-400': selectedProjectId == project.id }" class="bg-white rounded-lg w-full h-full">
        <div class="mx-auto w-3/4 h-1/4 font-bold">  {{ project.project_name }}  </div>   
          {{ selectedProjectId }}
        <div id="projectDescription" class="mx-auto w-4/5 h-3/4 text-xs"> {{ project.project_description }}</div>
        </button>
     </div>
    
    </div>

    <div id="inProgressRow" class="row-start-2 row-span-5 col-start-3 bg-indigo-300 rounded-sm overflow-y-auto ">
      <div v-for="task in tasks" :key="tasks.id" >
         <div v-if="selectedProjectId ==task.project_id "> {{ task.name }} </div>
      </div>      
    </div>

    <div id="completeRow" class="row-start-2 row-span-5 col-start-4 bg-indigo-300 rounded-sm overflow-y-auto">

    </div>


  

 </div>


</div>













</MainLayout>




</template>



<script setup>

import { ref, watch , computed  } from 'vue'
import MainLayout from '@/Pages/Layouts/MainLayout.vue'

const props = defineProps ({
  projects: Object,
  tasks: Object,
  users: Object,
  projectUsers: Object
})

const selectedProjectId = ref(null);

const selectProject = (projectId) => {
selectedProjectId.value = projectId;
}

const isProjectSelected = (projectId) => {
return selectedProjectId.value === projectId;
}


</script>

<style>
 .mr-5-pct {
    margin-right: 10%;
  }
  .ml-5-pct{
    margin-left:5%;
  }


</style>
