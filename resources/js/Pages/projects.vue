<template>

<MainLayout>

<div id="secondBlock" class="bg-indigo-300 flex items-center justify-center mx-auto mr-5-pct ml-5-pct w-full h-full">

 <div id="thirdBlock" class="bg-inherit h-full w-full grid grid-cols-6 grid-rows-6 text-white">


    <div id="projectHeader" class="bg-white row-start-1 row-span-1 col-start-2 col-span-4 rounded-l-sm"> 
      <div class="w-full h-1/5 bg-indigo-300">  </div>
      <div class="w-full h-4/5 bg-indigo-300 font-bold text-6xl flex justify-between items-center"> 
       <div>  Project Management UI </div>
       <div class="text-2xl flex items-center justify-center"> Designed by Gilvin {{ selectedTab }}</div>
      </div>

      
    </div>

    <div id="projectNavBar" class="bg-white row-start-2 row-span-5 col-start-2 col-span-1 text-black ">

      <div class="mainNavButton flex justify-center"> 
        <button  @click="setSelectedTab('myProjects')" :class="{ 'bg-indigo-300': selectedTab === 'myProjects', 'bg-white': selectedTab !== 'myProjects' }" class="h-1/2 flex items-center justify-center w-1/2"> My Projects </button>
      </div>

       <div class="navButton flex justify-center"> 
        <button @click="setSelectedTab('myTasks')" :class="{ 'bg-indigo-300': selectedTab === 'myTasks', 'bg-white': selectedTab !== 'myTasks' }" class="h-1/2 flex items-center justify-center w-1/2"> My Tasks </button>
      </div>

      <div class="navButton flex justify-center"> 
        <button @click="setSelectedTab('otherProjects')" :class="{ 'bg-indigo-300': selectedTab === 'otherProjects', 'bg-white': selectedTab !== 'otherProjects' }" class="h-1/2 flex items-center justify-center w-1/2"> Other Projects </button>
      </div>

     
    </div>

    <div v-if="selectedTab === 'myProjects'" id="toDoRow" class="row-start-2 row-span-5 col-start-3 bg-white overflow-y-auto">
      <div class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center">
        <div> Projects </div>
        <button @click="showAddProjectModal = true" class="ml-2 bg-green-500 px-4 py-2 rounded-sm font-bold text-white"> Add Project</button>
        <addProjectModal v-if="showAddProjectModal" :showAddProjectModal="showAddProjectModal" @closeAddProjectModal="showAddProjectModal = false"></addProjectModal>

      </div>  

      <div v-if="selectedTab === 'myProjects'" v-for="project in projects" :key="projects.id" class="h-1/5 w-3/4 text-black mx-auto mt-2 rounded-lg">
        <button @click="selectProject(project)" :class="{ 'bg-indigo-400': selectedProjectId == project.id }" class="bg-indigo-100 rounded-lg w-full h-full">
        <div class="flex items-center justify-center mx-auto w-3/4 h-1/4 font-bold"> 
          <div class="w-5/6"> Project {{ project.project_name }}  </div>
            <div class="flex items-center justify-end w-1/6 h-full"> 
              <button v-if="currentUser.id == project.ownerId" @click="selectProjectAndOpenEditModal(project.id)" class="bg-cover text-black bg-inherit font-bold">•••</button>
            </div>
          <editProjectModal v-if="showEditProjectModal" :showEditProjectModal="showEditProjectModal" :currentProjectInfo="currentProjectInfo" :projects="projects"   @closeEditProjectModal="showEditProjectModal = false"></editProjectModal>
        </div>   
        
        
        <div id="projectDescription" class="mx-auto w-4/5 h-3/4 text-xs"> {{ project.project_description }}</div>
        </button>
      </div>

      
    </div>

    <div v-if="selectedTab === 'myTasks'" id="pendingTasks" class="row-start-2 row-span-5 col-start-3 overflow-y-auto bg-indigo-100">
      
      <div class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center bg-gray-100">
        <div> Pending </div>
      </div>  

      <div v-for="pendingTasksOfUser in pendingTasksOfUsers" :key="pendingTasksOfUsers.id" class="h-1/5 w-3/4 text-black mx-auto mt-2 rounded-lg bg-white">
        <div class="flex items-center justify-center mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-1/2">  Task: {{ pendingTasksOfUser.name }}   </div>          
        </div>   
        <div class="flex items-center justify-center mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-1/2">  Project: {{ pendingTasksOfUser.project_name }} </div>          
        </div>  
      </div>

    </div>



    <div v-if="selectedTab === 'myTasks'" id="inProgressTasks" class="row-start-2 row-span-5 col-start-4 overflow-y-auto bg-indigo-100">
      <div class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center">
        <div> In Progress </div>
      </div>  

      <div v-for="inProgressTasksOfUser in inProgressTasksOfUsers" :key="inProgressTasksOfUsers.id" class="h-1/5 w-3/4 text-black mx-auto mt-2 rounded-lg bg-white">
       
        <div class="flex items-center justify-center mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-1/2">  Task: {{ inProgressTasksOfUser.name }}   </div>          
        </div>   
        <div class="flex items-center justify-center mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-1/2">  Project: {{ inProgressTasksOfUser.project_name }} </div>          
        </div>  
        
        
        
      </div>

      
    </div>

    <div v-if="selectedTab === 'myProjects'" id="tasksRow" class="row-start-2 row-span-5 col-start-4 bg-white overflow-y-auto ">

      <div class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center">
       <div> Project Tasks </div> 
       <button v-if="selectedProjectId" @click="showAddTaskModal = true" class="ml-2 bg-green-500 px-4 py-2 rounded-sm font-bold text-white"> Add Task </button>
       <addTaskModal v-if="showAddTaskModal" :showAddTaskModal ="showAddTaskModal" :selectedProjectId="selectedProjectId" @closeAddTaskModal="showAddTaskModal = false"></addTaskModal>
      </div>

      <div id="maintask" v-for="task in filteredTasks()" :key="tasks.id" class="h-1/5 flex w-full bg-indigo-100  text-black mx-auto mt-2 rounded-lg">
        <div class="w-5/6"> {{ task.name }} </div>
          <div class="w-1/6 flex">
            <div class="h-auto"> 
              <button @click="selectTaskAndOpenEditTaskModal(task)"> 🖊️</button>
              <editTaskModal v-if="showEditTaskModal" :showEditTaskModal="showEditTaskModal" :selectedTask="selectedTask" @closeEditTaskModal="showEditTaskModal = false" > </editTaskModal>
            </div>
            <div class="h-auto"> 
              <button @click="selectTaskAndOpenDeleteTaskModal(task)"> 🗑️ </button>
              <deleteTaskModal v-if="showDeleteTaskModal" :showDeleteTaskModal="showDeleteTaskModal" @closeDeleteTaskModal="showDeleteTaskModal = false" :selectedTask="selectedTask"> </deleteTaskModal>
            </div>
          </div>
      </div>      
      
    </div>

    

    <div v-if="selectedTab === 'myTasks'" id="completedTasks" class="row-start-2 row-span-5 col-start-5 overflow-y-auto bg-indigo-100">
      
      <div class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center">
        <div> Completed </div>
      </div>  

      <div v-for="completedTasksOfUser in completedTasksOfUsers" :key="completedTasksOfUsers.id" class="h-1/5 w-3/4 text-black mx-auto mt-2 rounded-lg bg-white">
        <div class="flex items-center justify-center mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-1/2">  Task: {{ completedTasksOfUser.name }}   </div>          
        </div>   
        <div class="flex items-center justify-center mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-1/2">  Project: {{ completedTasksOfUser.project_name }} </div>          
        </div>  
      </div>
      
    </div>

    <div v-if="selectedTab === 'myProjects'" id="membersRow" class="row-start-2 row-span-5 col-start-5 bg-white rounded-sm overflow-y-auto">
      <div class="h-10-percent w-3/4 mx-auto bg-inherit  text-black font-bold flex items-center justify-center">
        <div> Project Members </div> 
         <button v-if="selectedProjectId && currentUser.id == projectOwnerId" @click="showAddMemberModal = true" class="ml-2 bg-green-500 px-4 py-2 rounded-sm font-bold text-white"> Add Members {{ memberUserIds }}  </button>
         <addMemberModal v-if="showAddMemberModal" :selectedProjectId="selectedProjectId" :nonProjectMembers="nonProjectMembers" :showAddMemberModal="showAddMemberModal" :users="users" @closeAddMemberModal="showAddMemberModal = false"> </addMemberModal>
        </div>  

      <div id="membersList" v-for="user in projectMembers()" class="h-1/5 w-full flex bg-inherit text-black mx-auto mt-2 rounded-lg">
        
          <div class="w-5/6 h-full bg-inherit flex justify-center"> 
           <div class="w-3/4 h-full bg-indigo-100 rounded-lg">  {{ user.name }} </div>
          </div>

          <div class="w-1/6 h-full bg-white flex justify-start">  
                <button v-if="selectedProjectId && currentUser.id == projectOwnerId" @click="selectAndRemoveMemberModal(user)" class="items-start flex h-1/6"> X </button>
                <removeMemberModal v-if="showRemoveMemberModal" :showRemoveMemberModal="showRemoveMemberModal" :selectedProjectId="selectedProjectId" :selectedMember="selectedMember" @closeRemoveMemberModal="showRemoveMemberModal=false">  </removeMemberModal>
          </div>
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
import removeMemberModal from '@/Pages/Modals/removeMemberModal.vue'

const page = usePage()

const currentUser = computed(() => page.props.user )

const props = defineProps ({
  projects: Object,
  tasks: Object,
  users: Object,
  projectUsers: Object,
  inProgressTasksOfUsers:Object,
  pendingTasksOfUsers:Object,
  completedTasksOfUsers:Object
})


const selectedTab = ref('myProjects')

const setSelectedTab = (tab) =>
{
  selectedTab.value = tab;
}


const selectedProjectId = ref(null);
const projectOwnerId = ref(0);

const showAddTaskModal = ref(false);
const showAddProjectModal = ref(false);
const showAddMemberModal = ref(false);
const showEditProjectModal = ref(false);
const showEditTaskModal = ref(false);
const showDeleteTaskModal = ref(false);
const showRemoveMemberModal = ref(false);


const selectedTask = ref(0);
const selectedMember = ref(0);

// Watch the value of hideAddProjectModal from the router's current route query

const selectProjectAndOpenEditModal = (projectId) => {
    // Set the selectedProjectId to the projectId of the current iteration
    selectedProjectId.value = projectId;
    // Show the edit project modal
    showEditProjectModal.value = true;
}


const selectTaskAndOpenEditTaskModal = (taskInfo) => {
  selectedTask.value = taskInfo
  showEditTaskModal.value = true;
}

const selectTaskAndOpenDeleteTaskModal = (taskInfo) => {
  selectedTask.value = taskInfo
  showDeleteTaskModal.value = true;
}

const selectAndRemoveMemberModal = (member) => {
  selectedMember.value = member;
  showRemoveMemberModal.value = true;
}


const closeAddProjectModal = () => {
    showAddProjectModal.value = false;
};


const selectProject = (project) => {
  projectOwnerId.value = project.ownerId;
selectedProjectId.value = project.id;
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



  .m-10-pct {
    margin-left:10%;
    margin-right:10%;
    margin-top:10%;
    margin-bottom: 10%;
    margin: 10%;
  }

  .mainNavButton {
    height: 10%;
    width: 100%;
    margin-top:10%
  }

  .navButton {
    margin-top:5%;
    width: 100%;
  }

</style>
