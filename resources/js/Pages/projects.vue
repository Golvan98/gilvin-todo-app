<template>

<MainLayout>

<div id="secondBlock" class="bg-indigo-300 flex items-center justify-center mx-auto mr-5-pct ml-5-pct w-full h-full ">

 <div id="thirdBlock" class="bg-inherit h-full w-full grid grid-cols-6 grid-rows-6 text-white">


    <div id="projectHeader" class="bg-white row-start-1 row-span-1 col-start-2 col-span-4 rounded-l-sm border-b border-white"> 
      <div class="w-full h-1/5 bg-indigo-300">  </div>
      <div class="w-full h-4/5 bg-indigo-300 font-bold flex justify-between items-center"> 
       <div id="projectHeaderText">  Project Management UI </div>
       <div id="projectHeaderText" class=" flex items-center justify-center"> <div v-if="selectedTab !== 'myProjects'"> Current Tab: {{ selectedTab }}</div> <div v-if="selectedTab === 'myProjects'"> Project ID:{{ selectedProjectId }}  </div></div>
      </div>
      
    </div>

    <div id="projectNavBar" class="bg-white row-start-2 row-span-5 col-start-2 col-span-1 text-black  ">

      <div class="mainNavButton flex justify-center"> 
        <button  @click="setSelectedTab('myProjects')" :class="{ 'bg-indigo-300': selectedTab === 'myProjects', 'bg-white': selectedTab !== 'myProjects' }" class=" flex items-center justify-center w-1/2 " style="white-space: nowrap;"> Projects Overview</button>
      </div>
      
       <div class="navButton flex justify-center"> 
        <button @click="setSelectedTab('myTasks')" :class="{ 'bg-indigo-300': selectedTab === 'myTasks', 'bg-white': selectedTab !== 'myTasks' }" class=" flex items-center justify-center w-1/2 "> My Tasks </button>
      </div>

      <div id="yourProjects" class="navButton marginTenPercent flex justify-center"> 
        <button @click="setSelectedTab('otherProjects')" :class="{ 'bg-indigo-300': selectedTab === 'otherProjects', 'bg-white': selectedTab !== 'otherProjects' }" class="flex items-center justify-center w-1/2" style="white-space: nowrap;"> Your Projects </button>
      </div>

      <div id="listofProjectsByUser" v-for="projectsOwnedByUser in projectsOwnedByUsers" :key="projectsOwnedByUser.id" class="flex justify-center"> 
        <button @click="setTabAndProject(projectsOwnedByUser)" :class="{ 'bg-indigo-300': selectedTab === projectsOwnedByUser.project_name, 'bg-white': selectedTab !== projectsOwnedByUser.project_name }"> 
          <span class="truncate-text">{{ truncateText(projectsOwnedByUser.project_name, 8) }} </span>
        </button>
      </div>

     
    </div>

    
    <div  id="selectedPendingTasks" class="row-start-2 row-span-5 col-start-3 bg-white overflow-y-auto">
      <div id="tasksHeader" class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center h-1/6 mb-2">
        <div v-if="selectedProject" class="text-black"> Pending Tasks of {{ selectedProject.project_name }} </div>
          <button id="pendingPlusButton" v-if="selectedProjectId" @click="showAddTaskModal = true" class="text-2xl ml-2 text-indigo-500">+</button>
        <addTaskModal v-if="showAddTaskModal" :showAddTaskModal ="showAddTaskModal" :selectedProjectId="selectedProjectId" @closeAddTaskModal="showAddTaskModal = false"></addTaskModal>    
        
      </div>  
      
       <div id="mainTaskPlacer" v-for="task in pendingTasks()" :key=task.id class="flex items-start justify-center mx-auto w-full h-1/4 font-bold"> 
          
            <div id="taskPlacer" class="w-3/4 flex justify-center bg-indigo-300 h-3/4 rounded-lg"> 
                <div class="w-5/6 flex justify-center"> 
                    <div class="w-5/6"> <span class="truncate-text">{{ truncateText(task.name, 30) }}</span></div>
                </div>
               <div class="w-1/6 h-1/6 rounded-r-lg text-black flex justify-center"> <button @click="selectTaskAndOpenEditTaskModal(task)">••• </button> </div>
              <editTaskModal v-if="showEditTaskModal" :showEditTaskModal="showEditTaskModal" :selectedTask="selectedTask" @closeEditTaskModal="showEditTaskModal = false" > </editTaskModal>
            </div>
       </div>   

    </div>

    <div  id="selectedInProgressTasks" class="row-start-2 row-span-5 col-start-4 bg-white overflow-y-auto">
      
      <div id="tasksHeader"  class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center h-1/6 mb-2">
        <div v-if="selectedProject"> In Progress Tasks of {{ selectedProject.project_name }}  </div>
        <button id="pendingPlusButton" v-if="selectedProjectId" @click="showAddTaskModal = true" class="text-2xl ml-2 text-indigo-500">+</button>
        <addTaskModal v-if="showAddTaskModal" :showAddTaskModal ="showAddTaskModal" :selectedProjectId="selectedProjectId" @closeAddTaskModal="showAddTaskModal = false"></addTaskModal>    
      
      </div>  
      
       <div id="mainTaskPlacer" v-for="task in inProgressTasks()" :key=task.id class="flex items-start justify-center mx-auto w-3/4 h-1/4 font-bold"> 
          
            <div id="taskPlacer" class="w-full flex justify-center bg-indigo-300 h-3/4 rounded-lg"> 
                <div class="w-5/6 flex justify-center"> 
                    <div class="w-5/6"> <span class="truncate-text">{{ truncateText(task.name, 30) }}</span></div>
                </div>
               <div class="w-1/6 h-1/6 rounded-r-lg text-black flex justify-center"> <button @click="selectTaskAndOpenEditTaskModal(task)">••• </button> </div>
              <editTaskModal v-if="showEditTaskModal" :showEditTaskModal="showEditTaskModal" :selectedTask="selectedTask" @closeEditTaskModal="showEditTaskModal = false" > </editTaskModal>
            </div>

       </div>   

    </div>

    <div  id="selectedCompletedTasks" class="row-start-2 row-span-5 col-start-5 bg-white overflow-y-auto">
      <div id="tasksHeader"  class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center h-1/6 mb-2">
        <div v-if="selectedProject"> Completed Tasks of {{ selectedProject.project_name }}  </div>
        <button id="pendingPlusButton" v-if="selectedProjectId" @click="showAddTaskModal = true" class="text-2xl ml-2 text-indigo-500">+</button>
        <addTaskModal v-if="showAddTaskModal" :showAddTaskModal ="showAddTaskModal" :selectedProjectId="selectedProjectId" @closeAddTaskModal="showAddTaskModal = false"></addTaskModal>    
      
      </div>  
      
       <div id="mainTaskPlacer" v-for="task in completedTasks()" :key=task.id class="flex items-start justify-center mx-auto w-3/4 h-1/4 font-bold"> 
          
            <div id="taskPlacer" class="w-full flex justify-center  bg-indigo-300 h-3/4 rounded-lg"> 
                <div class="w-5/6 flex justify-center"> 
                    <div class="w-5/6"> <span class="truncate-text">{{ truncateText(task.name, 30) }}</span></div>
                </div>
               <div class="w-1/6 h-1/6 rounded-r-lg text-black flex justify-center"> <button @click="selectTaskAndOpenEditTaskModal(task)">••• </button> </div>
              <editTaskModal v-if="showEditTaskModal" :showEditTaskModal="showEditTaskModal" :selectedTask="selectedTask" @closeEditTaskModal="showEditTaskModal = false" > </editTaskModal>
            </div>

       </div>   

    </div>
   
    <div v-if="selectedTab === 'myProjects'" id="myProjectsRow" class="row-start-2 row-span-5 col-start-3 bg-white overflow-y-auto">
      <div class="h-10-percent w-3/4 mx-auto bg-inherit text-black  flex items-center justify-center">
        <div> Projects </div>
        <button id="addButton" @click="showAddProjectModal = true" class="ml-2 bg-indigo-500 px-4 py-2 rounded-sm font-bold text-white"> Add Project</button>
        <addProjectModal v-if="showAddProjectModal" :showAddProjectModal="showAddProjectModal" @closeAddProjectModal="showAddProjectModal = false"></addProjectModal>

      </div>  

      <div id="projectRectangles" v-if="selectedTab === 'myProjects'" v-for="project in projects" :key="projects.id" class="h-1/6 w-3/4 text-black mx-auto mt-2 rounded-lg">
        <button @click="selectProject(project)" :class="{ 'bg-indigo-400': selectedProjectId == project.id }" class="bg-indigo-100 rounded-lg w-full h-full">
        <div class="flex items-center justify-center mx-auto w-3/4 h-1/4"> 
          <div class="w-5/6 font-bold"> Project:  {{ truncateNecessary(project.project_name , 4) }}  </div>
            <div class="flex items-center justify-end w-1/6 h-full"> 
              <button v-if="currentUser.id == project.ownerId" @click="selectProjectAndOpenEditModal(project.id)" class="bg-cover text-black bg-inherit font-bold">•••</button>
              </div>
          <editProjectModal v-if="showEditProjectModal" :showEditProjectModal="showEditProjectModal" :currentProjectInfo="currentProjectInfo" :projects="projects"   @closeEditProjectModal="showEditProjectModal = false"></editProjectModal>
        </div>   
        
      
        <div id="projectDescription" class="mx-auto w-4/5 h-3/4 truncate-text"> {{ truncateText(project.project_description , 35) }}</div>
        </button>
      </div>

      
    </div>

    <div v-if="selectedTab === 'myProjects'" id="membersRow" class="row-start-2 row-span-5 col-start-5 bg-white rounded-r-lg overflow-y-auto">
      <div class="h-10-percent w-3/4 mx-auto bg-inherit  text-black font-bold flex items-center justify-center">
        <div> Project Members </div> 
         <button id="addButton" v-if="selectedProjectId && currentUser.id == projectOwnerId" @click="showAddMemberModal = true" class="ml-2 bg-indigo-500 px-4 py-2 rounded-sm font-bold text-white"> Add Members {{ memberUserIds }}  </button>
         <addMemberModal v-if="showAddMemberModal" :selectedProjectId="selectedProjectId" :nonProjectMembers="nonProjectMembers" :showAddMemberModal="showAddMemberModal" :users="users" @closeAddMemberModal="showAddMemberModal = false"> </addMemberModal>
        </div>  

      <div id="projectRectangles" v-for="user in projectMembers()" class="h-1/5 w-full flex bg-inherit text-black mx-auto mt-2 rounded-lg">
        
          <div class="w-5/6 h-full bg-inherit flex justify-center"> 
           <div class="w-3/4 h-full bg-indigo-100 rounded-sm">  {{ user.name }} </div>
          </div>

          <div class="w-1/6 h-full bg-white flex justify-start">  
                <button v-if="selectedProjectId && currentUser.id == projectOwnerId" @click="selectAndRemoveMemberModal(user)" class="items-start flex h-1/6"> X </button>
                <removeMemberModal v-if="showRemoveMemberModal" :showRemoveMemberModal="showRemoveMemberModal" :selectedProjectId="selectedProjectId" :selectedMember="selectedMember" @closeRemoveMemberModal="showRemoveMemberModal=false">  </removeMemberModal>
          </div>
      </div>  
    </div>

    <div v-if="selectedTab === 'myProjects'" id="tasksRow" class="row-start-2 row-span-5 col-start-4 bg-white overflow-y-auto ">

      <div class="h-10-percent w-3/4 mx-auto bg-inherit text-black font-bold flex items-center justify-center">
      <div> Project Tasks </div> 
      <button id="addButton" v-if="selectedProjectId" @click="showAddTaskModal = true" class="ml-2 bg-indigo-500 px-4 py-2 rounded-sm font-bold text-white"> Add Task </button>
      <addTaskModal v-if="showAddTaskModal" :showAddTaskModal ="showAddTaskModal" :selectedProjectId="selectedProjectId" @closeAddTaskModal="showAddTaskModal = false"></addTaskModal>
      </div>

      <div id="projectRectangles"  v-for="task in filteredTasks()" :key="task.id" class="h-1/5 flex justify-between  w-3/4 bg-indigo-100  text-black mx-auto mt-2 rounded-lg">
        
        <div class="w-4/6 ml-2 "> 
          <div > {{ task.name }}</div> 
        </div>

          <div class="w-2/6 flex">
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

    <div v-if="selectedTab === 'myTasks'" id="pendingTasks" class="row-start-2 row-span-5 col-start-3 overflow-y-auto bg-indigo-100">
      
      <div class="h-10-percent w-3/4 mx-auto bg-inherit font-bold flex items-center justify-center bg-gray-100">
        <div> Pending </div>
      </div>  

      <div v-for="pendingTasksOfUser in pendingTasksOfUsers" :key="pendingTasksOfUsers.id" class="h-1/5 w-3/4 mx-auto mt-2 rounded-lg bg-white">
        <div class="flex items-center justify-start mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-3/4">  Task: {{ truncateText(pendingTasksOfUser.name, 30) }}   </div>          
        </div>   
        <div class="flex items-center justify-start mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-1/4">  Project: {{ pendingTasksOfUser.project_name }} </div>          
        </div>  
      </div>

    </div>



    <div v-if="selectedTab === 'myTasks'" id="inProgressTasks" class="row-start-2 row-span-5 col-start-4 overflow-y-auto bg-indigo-100">
      <div class="h-10-percent w-3/4 mx-auto bg-inherit font-bold flex items-center justify-center">
        <div> In Progress </div>
      </div>  

      <div v-for="inProgressTasksOfUser in inProgressTasksOfUsers" :key="inProgressTasksOfUsers.id" class="h-1/5 w-3/4 mx-auto mt-2 rounded-lg bg-white">
       
        <div class="flex items-center justify-start mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-3/4">  Task: {{ truncateText(inProgressTasksOfUser.name, 30) }}   </div>          
        </div>   
        <div class="flex items-center justify-start mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-1/4">  Project: {{ inProgressTasksOfUser.project_name }} </div>          
        </div>  
        
        
        
      </div>

      
    </div>

    

    

    <div v-if="selectedTab === 'myTasks'" id="completedTasks" class="row-start-2 row-span-5 col-start-5 overflow-y-auto bg-indigo-100 rounded-r-lg">
      
      <div class="h-10-percent w-3/4 mx-auto bg-inherit font-bold flex items-center justify-center">
        <div> Completed </div>
      </div>  

      <div v-for="completedTasksOfUser in completedTasksOfUsers" :key="completedTasksOfUsers.id" class="h-1/5 w-3/4 mx-auto mt-2 rounded-lg bg-white">
        <div class="flex items-center justify-start mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-3/4">  Task: {{ truncateText(completedTasksOfUser.name, 30) }}   </div>          
        </div>   
        <div class="flex items-center justify-start mx-auto w-3/4 h-1/2 font-bold"> 
          <div class="w-3/4 h-1/4">  Project: {{ completedTasksOfUser.project_name }} </div>          
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
  completedTasksOfUsers:Object,
  projectsOwnedByUsers:Object
})

const truncateText = (text, maxLength) => {
    if (text.length > maxLength) {
      return text.substring(0, maxLength) + '...'; // Add ellipses (...) to indicate truncation
    } else {
      return text;
    }
  }


  const truncateNecessary = (text, maxLength) => {
    if (text.length > 8) {
      return text.substring(0, maxLength) + '...'; // Add ellipses (...) to indicate truncation
    } else {
      return text;
    }
  }

const selectedTab = ref('myProjects')

const setSelectedTab = (tab) =>
{
  selectedTab.value = tab;
}
 
const selectedProject = ref(null);

const setTabAndProject = (project) =>
{
  selectedTab.value = project.project_name;
  selectedProjectId.value = project.id;
  selectedProject.value = project
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
const inProgressTasks = () => {
  return props.tasks.filter(task => task.project_id === selectedProjectId.value && task.status === 'In Progress');
}

const pendingTasks = () => {
  return props.tasks.filter(task => task.project_id === selectedProjectId.value && task.status === 'Pending');
}

const completedTasks = () => {
  return props.tasks.filter(task => task.project_id === selectedProjectId.value && task.status === 'Complete');
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


@media screen and (min-width: 1200px) {

#pendingTasks, #inProgressTasks, #completedTasks{
  color: black;
  font-size: 10px;
}

}

@media screen and (min-width: 900px) and (max-width: 1199px) {

#pendingTasks, #inProgressTasks, #completedTasks{
  color: green;
  font-size: 7px;
}

}


@media screen and (min-width: 400px) and (max-width: 899px) {

#pendingTasks, #inProgressTasks, #completedTasks{
  color: red;
  font-size:4px;
}
}

@media screen and (max-width: 399px)  {

#pendingTasks, #inProgressTasks, #completedTasks{
  color: red;
  font-size:3px;
}

}


@media screen and (min-width: 1px) and (max-width: 400px) {
 /*this registers if pixels is 1-400 */
  /* this section is fixated on myProjects Section */
  #myProjectsRow, #tasksRow, #membersRow{
    
    font-size: 3px;
  }
  #projectRectangles{
    font-size:5px;
  }

  #addButton {
    padding-left:1x;
    border-radius: 0%;
 
  
  }
}

@media screen and (min-width: 401px) and (max-width: 900px) {
  /*this registers if pixels is 400-900 */
  /* this section is fixated on myProjects Section */

  #myProjectsRow{
    
    font-size: 5px;
  }
 #tasksRow, #membersRow{
    font-size: 5px;
    color:blue
  }

  #addButton{
    font-size: 4px;
    padding-left: 8px;
    padding-right: 8px;
  }

  #projectRectangles{
    height: 10%;
    width: 90%;
  
  }


  
}
@media screen and (min-width: 901px) and (max-width: 1968px) {
    /*this registers if pixels is 901-1968px */
  /* this section is fixated on myProjects Section */
  #secondBlock, #thirdBlock {
    font-size: 12px;
  }
}



#selectedCompletedTasks{
    border-top-right-radius: 4px;
 
  }

  #projectNavBar{
    border-top-left-radius: 4px;
  }

  

@media screen and (min-width: 769px) {
 
  #projectHeader{
    height:80%;
    color: white;
    font-size: 20px;
   }

   #tasksHeader
  {
    height: 15%;
    font-size: 10px;
  }

  #taskPlacer{
    font-size:15px;
  }


}




@media screen and (max-width: 768px) {


  #listofProjectsByUser{
    
    font-size:8px;
  }

  #projectNavBar{
    font-size:4px;
    color:red
  }

  #yourProjects{
    font-size:6px;
  }

   #projectHeader{
    height:80%;
    color:white
   }

  #projectHeaderText{
    font-size: 8px;
    line-height: 2;
  }

   #mainTaskPlacer{
    width:80%;
    height: 80px;
   }


  #taskPlacer{
    font-size: 5px;
    height: 60px;
    width: 90%;

    border-radius: 1px;
  }

  #tasksHeader
  {
    height: 15%;
    font-size: 5px;
  }



  #projectNavBar{
  font-size: 6px;
  align-items: center;
  }

  #selectedPendingTasks {
  font-size: 6px;
  align-items: center;
}

  #selectedCompletedTasks{
  font-size: 6px;
  align-items: center;
}


#selectedInProgressTasks{
  font-size: 6px;
  align-items: center;
}

  #pendingPlusButton{
    font-size: 6px;
}

}
















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
    
    width: 100%;
    margin-top:10%
  }

  .navButton {
    margin-top:5%;
    width: 100%;
  }

  .marginTenPercent {
    margin-top: 10%;
  }

  .margin10Bottom{
    margin-bottom: 10%;
  }

  .width90Percent
  {
    width:90%;
  }

  .width10Percent{
    width:10%;
  }

</style>
