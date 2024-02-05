<template>
  <div id="container" class="w-full h-screen bg-white text-red-500 flex flex-col">
    <!-- Top Navbar -->
    <div id="topNavBar" class="bg-gray-900 w-full grid grid-cols-3 grid-rows-1 h-16 font-bold shadow-lg text-1xl text-white">
      <div id="leftSection" class="col-span-1"></div>
      <div id="midSection" class="col-span-1 bg-reen-300 flex items-center justify-center space-x-2.5">
        <div> Home </div>
        <div> Projects </div>
        <div> Get Started </div>
      </div>
      <div id="rightSection" class="col-span-1 flex items-center justify-end mr-25-pct">
        <button @click="showLoginModal = true" class="mr-2">Login</button>
          <loginModal v-if="showLoginModal" :showLoginModal="showLoginModal" @closeLoginModal="showLoginModal = false"> </loginModal>
        <button @click="showRegisterModal = true"> Register </button> 
          <registerModal v-if="showRegisterModal" :showRegisterModal="showRegisterModal" @closeRegisterModal="showRegisterModal = false"> </registerModal>
      </div>
   
    </div>

    <!-- Body Content -->
    <div id="body content" class="flex-grow bg-white flex">
      <!-- Left Navbar -->
      <div id="leftNavBar" class="w-20 h-full bg-gray-300 text-red-700">
        Hello, this is the navbar, this will not be shown when zoomed in 
      </div>

      <!-- Main Content -->
      <slot></slot>
    </div>

    <!-- Footer -->
    <footer id="footer" class="h-1/6 mt-8 mx-auto bg-gray-900 flex w-full">
      <div id="leftFooter" class="h-full flex items-center justify-center">
        This is the Left Footer. This Remains on Top if it is zoomed in to an extent
      </div>
      <div id="rightFooter" class="bg-gray-900 h-full flex items-center justify-center">
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
      font-size: 10px;
      width: 100%;
      height: 100%;
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

  @media screen and (min-width: 769px) {
    /* Adjust styles for different zoom levels */
    #footer {
      flex: none;
      color:white ;
    }
   
    #leftFooter, #rightFooter {
      font-size: 24px;
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


</style>

<script setup>
import loginModal from '@/Pages/Modals/loginModal.vue'
import registerModal from '@/Pages/Modals/registerModal.vue'
import { ref } from 'vue'

const showLoginModal = ref(false);
const showRegisterModal = ref(false);
</script>
