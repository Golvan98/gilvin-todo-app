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
        <div> Projects  </div>
        <button @click="showAddProjectModal = true" class="ml-2 bg-red-300"> Add Project</button>
        <addProjectModal v-if="showAddProjectModal" :showAddProjectModal="showAddProjectModal" @closeAddProjectModal="showAddProjectModal = false"></addProjectModal>

      </div>  

      <div v-for="project in projects" :key="projects.id" class="h-1/5 w-3/4 bg-white text-black mx-auto mt-2 rounded-lg">
        <button @click="selectProject(project.id)" :class="{ 'bg-cyan-200': selectedProjectId == project.id }" class="bg-white rounded-lg w-full h-full">
        <div class="flex items-center justify-center mx-auto w-3/4 h-1/4 font-bold"> 
          <div class="w-3/4"> Project {{ project.project_name }}  </div>
          <button @click="selectProjectAndOpenEditModal(project.id)" class="flex items-center justify-center w-1/4 h-full bg-cover text-black bg-white font-bold">🖊</button>
          <editProjectModal v-if="showEditProjectModal" :showEditProjectModal="showEditProjectModal" :currentProjectInfo="currentProjectInfo" :projects="projects"   @closeEditProjectModal="showEditProjectModal = false"></editProjectModal>
        </div>   
        
        
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

      <div id="maintask" v-for="task in filteredTasks()" :key="tasks.id" class="h-1/5 flex w-full bg-white text-black mx-auto mt-2 rounded-lg">
          <div class="w-5/6"> {{ task.name }} </div>
          <div class="w-1/6">
            <div class="h-1/2"> 
              <button @click="selectTaskAndOpenEditTaskModal(task)"> Edit </button>
              <editTaskModal v-if="showEditTaskModal" :showEditTaskModal="showEditTaskModal" :selectedTask="selectedTask" @closeEditTaskModal="showEditTaskModal = false" > </editTaskModal>
            </div>

            <div class="h-1/2"> 
              <button @click="selectTaskAndOpenDeleteTaskModal(task)"> Delete </button>
              <deleteTaskModal v-if="showDeleteTaskModal" :showDeleteTaskModal="showDeleteTaskModal" @closeDeleteTaskModal="showDeleteTaskModal = false" :selectedTask="selectedTask"> </deleteTaskModal>
            </div>

          </div>
      </div>      
      
    </div>

    <div id="membersRow" class="row-start-2 row-span-5 col-start-4 bg-indigo-300 rounded-sm overflow-y-auto">
      <div class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center">
        <div> Project Members </div> 
         <button v-if="selectedProjectId" @click="showAddMemberModal = true" class="ml-2 bg-red-300"> Add Members {{ memberUserIds }}  </button>
         <addMemberModal v-if="showAddMemberModal" :selectedProjectId="selectedProjectId" :nonProjectMembers="nonProjectMembers" :showAddMemberModal="showAddMemberModal" :users="users" @closeAddMemberModal="showAddMemberModal = false"> </addMemberModal>
      </div>  

      <div id="membersList" v-for="user in projectMembers()" class="h-1/5 w-3/4 bg-white text-black mx-auto mt-2 rounded-lg">
          {{ user.name }}
      </div>  
    </div>


  

 </div>


</div>


</MainLayout>
</template>

<script setup>


import addMemberModal from '@/Pages/Modals/addMemberModal.vue'
import addProjectModal from '@/Pages/Modals/addProjectModal.vue'
import editProjectModal from '@/Pages/Modals/editProjectModal.vue'
import addTaskModal from '@/Pages/Modals/addTaskModal.vue'
import { ref, watch , computed } from 'vue'
import MainLayout from '@/Pages/Layouts/MainLayout.vue'
import loginModal from '@/Pages/Modals/loginModal.vue'
import registerModal from '@/Pages/Modals/registerModal.vue'
import { Link, usePage,  } from '@inertiajs/vue3'
import editTaskModal from '@/Pages/Modals/editTaskModal.vue'
import deleteTaskModal from '@/Pages/Modals/deleteTaskModal.vue'



const props = defineProps ({
  projects: Object,
  tasks: Object,
  users: Object,
  projectUsers: Object,
})


const showAddTaskModal = ref(false);
const showAddProjectModal = ref(false);
const showAddMemberModal = ref(false);
const showEditProjectModal = ref(false);
const showEditTaskModal = ref(false);
const showDeleteTaskModal = ref(false);

// Watch the value of hideAddProjectModal from the router's current route query

const selectProjectAndOpenEditModal = (projectId) => {
    // Set the selectedProjectId to the projectId of the current iteration
    selectedProjectId.value = projectId;
    // Show the edit project modal
    showEditProjectModal.value = true;
}

const selectedTask = ref(0);

const selectTaskAndOpenEditTaskModal = (taskInfo) => {
  selectedTask.value = taskInfo
  showEditTaskModal.value = true;
}

const selectTaskAndOpenDeleteTaskModal = (taskInfo) => {
  selectedTask.value = taskInfo
  showDeleteTaskModal.value = true;
}


const closeAddProjectModal = () => {
    showAddProjectModal.value = false;
};

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

const nonProjectMembers = () => {
  const memberUserIds = props.projectUsers
    .filter(projectUser => projectUser.project_id === selectedProjectId.value)
    .map(projectUser => projectUser.user_id);
  
  // Filter users who are not in projectMembers
  return props.users.filter(user => !memberUserIds.includes(user.id));
};


const currentProjectInfo = computed(() => {
  // Find the currently selected project
  const currentProject = props.projects.find(project => project.id === selectedProjectId.value);
  // Return the information of the current project
  return currentProject;
});


</script>

<style>
 .mr-5-pct {
    margin-right: 10%;
  }
  .ml-5-pct{
    margin-left:5%;
  }


  .pen-icon {
    background: none;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    border-radius: 50%;
}

.pen-icon:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-45deg);
    width: 2px;
    height: 40px;
    background-color: black;
}

.pen-icon:after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 6px;
    height: 2px;
    background-color: black;
}


</style>
