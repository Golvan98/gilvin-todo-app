<template>
    <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full ">
          <form @submit.prevent="register" :class="formClass">

              <div id="registerCloseSection" class="w-full h-10-percent flex items-start justify-end"> 
                  <button @click="closeRegModal" class=" text-black hover:text-red-400 focus:outline-none">
                      <svg id="registerCloseButton" class="h-6 w-6 items-start" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                      </svg>
                  </button>
              </div>
  
              <div v-if="!hasErrors" id="registerLogo" class="w-full h-10-percent flex items-end justify-center sm:text-xs md:text-2xl lg:text-4xl mb-1"> 𝔾ℙ𝕄</div>

              <div id="register2ndBlock" class="w-4/5 flex flex-col items-center justify-center h-80-percent gap-4">
                      <input type="hidden" name="_token" :value="csrfToken"> <!-- CSRF token field -->

                      <input id="registerNameSection" class="h-10-percent flex items-center w-3/4 " 
                      v-model="form.name" type="text" placeholder="name">             
                          <span id="registerError" v-if="form.errors.name" class="text-xs text-red-500 flex justify-start items-start  w-full"> {{form.errors.name}}</span>
                      </input>

                      <input id="registerEmailSection" v-model="form.email" type="text" placeholder="email" class="h-10-percent flex items-center w-3/4">
                          <span id="registerError" v-if="form.errors.email" class="text-xs text-red-500 flex items-start justify-start w-full"> {{form.errors.email}}</span>
                      </input>

                      <input id="registerPasswordSection" v-model="form.password" type="password" placeholder="password" class="h-10-percent flex items-center w-3/4">
                          <span id="registerError" v-if="form.errors.password || form.errors.email" class="flex items-start justify-start text-xs text-red-500 w-full"> {{form.errors.password}}</span>
                      </input>

                      <div class="flex h-auto items-center justify-center rounded-md ">
                          <button id="registerButton" type="submit" class="bg-gray-300 rounded-sm">Register</button>
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
import { computed } from 'vue'
import { reactive } from 'vue'


const form = useForm(
{
  name:null,
  email:null,
  password:null,
})

const csrfToken = '{{ csrf_token() }}'; // CSRF token value

//const login = () => form.post('register')
const register = () => form.post('register');
const showModal = defineProps(['showRegisterModal']);
const emits = defineEmits(['closeRegisterModal']);
const closeRegModal = () => {
  emits('closeRegisterModal');
  // Emit an event if needed
};

//<button @click="close" class="">Close Content</button>

const formClass = computed(() => ({
  'w-1/4 flex flex-col items-center justify-center text-gray-600 border border-gray-900 bg-white': true,
  'h-3/5': Object.keys(form.errors).length === 0,
  'h-5/6': Object.keys(form.errors).length > 0,
  'bg-red-300': Object.keys(form.errors).length > 0,
}));

</script> 

<style>
    .h-10-percent{
        height: 10%;
    }

    .h-15-percent{
        height: 15%;
    }

    .h-70-percent{
        height: 70%;
    }

    .h-80-percent{
        height: 80%;
    }

    .h-20-percent{
        height: 20%;
    }

    .h-60-percent{
        height: 80%;
    }

    #registerButton{
        margin-bottom:16px;
        padding:0.50rem;
    }

  
  @media screen and (min-width: 601px) and (max-width:1000px)
  {
    #registerError{
        font-size:6px;
        max-height: 4px;
        color:red;
        width:100%;
        margin-bottom:8px;
    }

    #registerLogo{
        display:none;
    }

  

    #register2ndBlock{
        height:90%;
    }

    #registerButton{
        font-size:8px;
        margin-bottom:4px;
        padding:0.15rem;
    }
  }

  
  @media screen and (max-width: 600px) {

    #registerCloseButton{
        height:0.75rem;
        width:0.75rem;
        margin-top:2px;
        margin-left:2px;
    }

    #registerLogo{
        display:none;
    }

      #registerNameSection, #registerEmailSection, #registerPasswordSection{
        max-height: 2px;
        min-height:2px;
}

    #register2ndBlock{
        height:90%;
        gap: 0.5rem;
        margin-top: 9px;
    }



    #registerError{
        font-size:2.5px;
        max-height: 2px;
        
    }

    #registerNameSection, #registerEmailSection, #registerPasswordSection{
    font-size:8px;
}

    #registerButton{
        font-size:4px;
        padding:0.05rem;
    }
   
  }



</style>
