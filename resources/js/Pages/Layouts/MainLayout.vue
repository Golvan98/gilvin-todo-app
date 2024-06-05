<template>
<div v-if="flashSuccess" class="alert fixed bg-green-500 text-white py-2 px-4 rounded-xl bottom-1 right-3 text-sm">
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
        This website is a Web project management app leveraging CRUD w/ Laravel, Vue.js, Docker & MySQL 
      </div>

      <div id="rightFooter" class="bg-indigo-500 h-full flex items-center justify-center">
        <a href="https://www.facebook.com/gilvin.zalsos" target="_blank" style="font-size: 16px;" class="text-white mx-2">ⓕ</a>
        <a href="https://twitter.com/GelvenZolsos" target="_blank" style="font-size: 16px" class="text-white mx-2">𝕏</a>

        <a href="https://www.linkedin.com/in/gilvin-zalsos-213692141/" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 16px; height: 16px;" class="mx-2">
          <path fill="currentColor" d="M21.98 0H2.02C.9 0 0 .9 0 2.02v19.96C0 23.1.9 24 2.02 24h19.96C23.1 24 24 23.1 24 21.98V2.02C24 .9 23.1 0 21.98 0zM7.26 20.015H4.026V9.13h3.234v10.885zM5.646 7.557a1.922 1.922 0 1 1 0-3.843 1.92 1.92 0 0 1 0 3.843zM20.016 20.015h-3.23v-5.701c0-1.362-.027-3.116-1.887-3.116-1.887 0-2.176 1.474-2.176 2.996v5.821h-3.23V9.13h3.155v1.59h.045c.44-.837 1.52-1.72 3.113-1.72 3.332 0 3.943 2.194 3.943 5.056v5.96z"/>
        </svg>
        </a>

        <a href="https://github.com/Golvan98" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width: 16px; height: 16px;" class="mx-2">
          <path fill="currentColor" d="M12 0C5.372 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.385.6.11.793-.261.793-.578 0-.286-.01-1.041-.015-2.044-3.348.724-4.055-1.611-4.055-1.611-.547-1.387-1.336-1.756-1.336-1.756-1.092-.746.083-.731.083-.731 1.207.085 1.84 1.239 1.84 1.239 1.07 1.834 2.805 1.303 3.49.998.108-.772.419-1.302.763-1.604-2.665-.303-5.467-1.332-5.467-5.93 0-1.31.468-2.383 1.235-3.224-.124-.303-.536-1.526.116-3.178 0 0 1.008-.322 3.3 1.23.957-.266 1.98-.398 3-.404 1.02.006 2.043.138 3 .404 2.29-1.552 3.297-1.23 3.297-1.23.654 1.652.242 2.875.118 3.178.77.841 1.232 1.914 1.232 3.224 0 4.61-2.807 5.624-5.478 5.92.43.371.817 1.102.817 2.222 0 1.604-.014 2.893-.014 3.286 0 .321.192.694.8.576C20.566 21.795 24 17.297 24 12c0-6.627-5.373-12-12-12z"/>
        </svg>
       </a>

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
   
    #leftNavBar, #midSection{
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
