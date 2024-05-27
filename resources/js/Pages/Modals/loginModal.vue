<template>
  <div  class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950 bg-opacity-95 w-full">
        <form @submit.prevent="login" id="loginForm" class="bg-white w-1/4 h-2/5 flex flex-col items-center justify-center text-gray-600 border border-gray-900 ">

            <div id="loginCloseSection" class="w-full h-10-percent flex items-start justify-end"> 
                <button @click="closeLogModal" class=" text-black hover:text-red-400 focus:outline-none">
                    <svg id="loginCloseButton" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> 
                    </svg>
                </button>
            </div>

            <div id="loginLogo" class="w-full h-20-percent flex items-end justify-center sm:text-xs md:text-md lg:text-5xl mb-4"> 𝔾ℙ𝕄</div>

           <div id="login2ndBlock" class="w-4/5 h-70-percent flex flex-col items-center justify-center">
            
                <input id="loginEmail" v-model="form.email" type="text" placeholder="email@example.com" class= "w-4/5 mx-auto text-xs rounded-md h-20-percent"> 
                
                <div id="loginEmailErrors" v-if="form.errors.email" class="text-xs text-red-500 flex justify-start w-5/5 h-10-percent"> {{form.errors.email}}</div>
                
                <input id="loginPassword" v-model="form.password" type="password" placeholder="password" class="bg-gray-300 w-4/5 h-20-percent mx-auto mt-3 mb-2 text-xs rounded-md"> 
                <div id="loginPassword" v-if="form.errors.password" class="text-xs text-red-500 flex justify-start w-4/5"> {{form.errors.password}}</div>
                <div id="loginLoginButton" class="w-2/5 h-1/6 mb-2 flex items-center justify-center bg-indigo-300 rounded-sm"> <button type="submit"> Login </button> </div>
            
           </div>

        </form>
    </div>
</template>



<script setup>
import { useForm } from '@inertiajs/vue3';
import { defineProps, defineEmits  } from 'vue';
import { ref } from 'vue'

const form = useForm({
    email:null,
    password:null
});

const login = () => form.post('login');

const showModal = defineProps(['showLoginModal']);
const emits = defineEmits(['closeLoginModal']);


const closeLogModal = () => {
  emits('closeLoginModal');
  // Emit an event if needed
};

//<button @click="close" class="">Close Content</button>

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

@media screen and (min-width:1px) and (max-width:700px)
{
    #loginCloseButton{
        height:0.75rem;
        width:0.75rem;
    }

    #loginLogo
    {
        display:none;
    }

    #login2ndBlock{
        height:90%;
    }

    #loginEmail, #loginPassword, #loginLoginButton{
        font-size:8px
    }

    #loginForm{
        height:50%;
    }

    #loginEmailErrors{
        font-size:3px;
    }

    #loginLoginButton{
        font-size:6px;
    }
    


}


</style>


