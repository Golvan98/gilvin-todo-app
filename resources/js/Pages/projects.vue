<template>

<MainLayout>

<div id="firstBlock" class="bg-white flex items-center justify-center mx-auto mr-5-pct ml-5-pct w-full h-full">

 <div id="secondBlock" class="bg-inherit h-full w-full grid grid-cols-5 grid-rows-6 text-white">


    <div id="projectNavBarContainer" class="col-start-2 col-end-5 bg-inherit row-start-1 grid grid-cols-6 mt-2 row-span-1">
        <div id="projectNavBar" class="bg-indigo-300 col-start-2 col-end-6 rounded-lg mb-2">

        </div>      
    </div>

    <div id="toDoRow" class="row-start-2 row-span-5 col-start-2 bg-indigo-300 rounded-sm overflow-y-auto">
      <div class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center">
        <div> Projects </div>
        <button @click="showAddProjectModal = true" class="ml-2 bg-red-300"> Add Project</button>
        <addProjectModal v-if="showAddProjectModal" :showAddProjectModal ="showAddProjectModal" @closeAddProjectModal="showAddProjectModal = false"> </addProjectModal>
      </div>  

      <div v-for="project in projects" :key="projects.id" class="h-1/5 w-3/4 bg-white text-black mx-auto mt-2 rounded-lg">
        <button @click="selectProject(project.id)" :class="{ 'bg-cyan-200': selectedProjectId == project.id }" class="bg-white rounded-lg w-full h-full">
        <div class="mx-auto w-3/4 h-1/4 font-bold"> Project {{ project.project_name }}  </div>   
        
        <div id="projectDescription" class="mx-auto w-4/5 h-3/4 text-xs"> {{ project.project_description }}</div>
        </button>
      </div>
    </div>

    <div id="tasksRow" class="row-start-2 row-span-5 col-start-3 bg-indigo-300 rounded-sm overflow-y-auto ">
      <div class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center">
       <div> Project Tasks </div> 
       <button @click="showAddTaskModal = true" class="ml-2 bg-red-300"> Add Task </button>
       <addTaskModal v-if="showAddTaskModal" :showAddTaskModal ="showAddTaskModal" :selectedProjectId="selectedProjectId" @closeAddTaskModal="showAddTaskModal = false"></addTaskModal>
      </div>

      <div id="maintask" v-for="task in filteredTasks()" :key="tasks.id" class="h-1/5 w-3/4 bg-white text-black mx-auto mt-2 rounded-lg">
          {{ task.name }}
      </div>      
    </div>

    <div id="membersRow" class="row-start-2 row-span-5 col-start-4 bg-indigo-300 rounded-sm overflow-y-auto">
      <div class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center">
        Project Members

      </div>  

      <div id="maintask" v-for="user in projectMembers()" :key="tasks.id" class="h-1/5 w-3/4 bg-white text-black mx-auto mt-2 rounded-lg">
          {{ user.name }}
      </div>  
    </div>


  

 </div>


</div>


</MainLayout>
</template>

<script setup>


import addProjectModal from '@/Pages/Modals/addProjectModal.vue'
import addTaskModal from '@/Pages/Modals/addTaskModal.vue'
import { ref, watch , computed  } from 'vue'
import MainLayout from '@/Pages/Layouts/MainLayout.vue'
const props = defineProps ({
  projects: Object,
  tasks: Object,
  users: Object,
  projectUsers: Object,
})


const showAddProjectModal = ref(false);
const showAddTaskModal = ref(false);
const showAddMemberModal = ref(false);


const selectedProjectId = ref(0);

const selectProject = (projectId) => {
selectedProjectId.value = projectId;
}
const isProjectSelected = (projectId) => {
return selectedProjectId.value === projectId;
}

const filteredTasks = () => {
  return props.tasks.filter(task => task.project_id === selectedProjectId.value);
}

const projectMembers = () => {
  const memberUserIds = props.projectUsers
    .filter(projectUser => projectUser.project_id === selectedProjectId.value)
    .map(projectUser => projectUser.user_id);
  return props.users.filter(user => memberUserIds.includes(user.id));
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
