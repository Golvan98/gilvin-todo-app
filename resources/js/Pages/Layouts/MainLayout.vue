<template>
<div v-if="flashSuccess" class="alert fixed bg-green-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
               {{ flashSuccess }} 
  </div>

  <div id="container" class="w-full h-screen bg-white text-red-500 flex flex-col">
    <!-- Top Navbar -->
    <div id="topNavBar" class="bg-indigo-500 w-full grid grid-cols-3 grid-rows-1 h-16 font-bold shadow-lg text-1xl text-white ">
      <div id="leftSection" class="col-span-1"></div>
      <div id="midSection" class="col-span-1 bg-reen-300 flex items-center justify-center space-x-2.5">
        <div v-if="user">{{ user.name }}   </div>
        <Link href="home"> <div> Home  </div> </Link>
        <Link href="projects"> <div> Projects </div> </Link>
        <div> Get Started </div>
      </div>
      <div v-if="!user" id="rightSection" class="col-span-1 flex items-center justify-end mr-25-pct">
        <button @click="showLoginModal = true" class="mr-2">Login</button>
          <loginModal v-if="showLoginModal" :showLoginModal="showLoginModal" @closeLoginModal="showLoginModal = false"> </loginModal>
        <button @click="showRegisterModal = true"> Register </button> 
          <registerModal v-if="showRegisterModal" :showRegisterModal="showRegisterModal" @closeRegisterModal="showRegisterModal = false"> </registerModal>
      </div>
      <div v-if="user" id="rightSection" class="col-span-1 flex items-center justify-end mr-25-pct">
        <Link href="logout" method="delete" as="button" @click="showRegisterModal = false; showLoginModal = false;">Logout</Link>

      </div>
   
    </div>

    <!-- Body Content -->
    <div id="body content" class="flex-grow bg-white flex">
      <!-- Left Navbar -->
      <div id="leftNavBar" class="w-20 h-full bg-gray-300 text-red-700">
    
      </div>

      <!-- Main Content -->
      <slot></slot>
    </div>

    <!-- Footer -->
    <footer id="footer" class="h-10-percent mx-auto bg-indigo-500 flex w-full">
      <div id="leftFooter" class="h-full flex items-center justify-center">
        This is the Left Footer. This Remains on Top if it is zoomed in to an extent
      </div>
      <div id="rightFooter" class="bg-indigo-500 h-full flex items-center justify-center">
        This is the Right Footer. This Remains Below if it is zoomed in to an extent
      </div>
    </footer>
  </div>
</template>

<style>
  @media screen and (max-width: 768px) {
    /* Adjust styles for smaller screens */
    #footer {
      display: flex;
      flex-wrap: wrap;
      color:white ; 
    }

    #leftFooter, #rightFooter{
      font-size: 5px;
      width: 100%;
      height: 100%;
    }

    #topNavBar{
      font-size:13px;
   
    }
   
    #leftNavBar{
        display:none;
      }
      #leftSection, #rightSection{
      display:none;
    }
    #midSection{
      grid-column: span 3;
    }
  }

  @media screen and (min-width: 769px) 
  {

    #topNavBar{
      font-size: 14px;
    }

    /* Adjust styles for different zoom levels */
    #footer {
      flex: none;
      color:white ;
    }

    #leftNavBar{
        display:none;
    }
   
    #leftFooter, #rightFooter {
      font-size: 16px;
      width: 50% ;
      height: 100%;
      font:green;
      margin-left: 10px;
      margin-right: 10px
    }
  }

  .mr-25-pct {
    margin-right: 25%;
  }

  .h-10-percent{
      height: 10%;
  }

 


</style>

<script setup>
import loginModal from '@/Pages/Modals/loginModal.vue'
import registerModal from '@/Pages/Modals/registerModal.vue'
import { ref, watch , computed  } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()
const flashSuccess = ref(page.props.flash.success)

const user = computed( () => page.props.user)

const showLoginModal = ref(false);
const showRegisterModal = ref(false);




watch(() => page.props.flash.success, (newValue) => {
  flashSuccess.value = newValue;
  setTimeout(() => {
    flashSuccess.value = '';
  }, 1000); // Adjust the time (in milliseconds) as needed
})
  // Automatically hide the flash message after 1000ms (1 second)
 // const computedFlashSuccess = computed(() => flashSuccess.value)
</script>

<style>




</style>
