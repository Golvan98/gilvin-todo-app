<template>

<MainLayout>



<div id="firstBlock" class="bg-gray-300 flex items-center justify-center mx-auto mr-5-pct ml-5-pct w-full h-full">

 <div id="secondBlock" class="bg-inherit h-4/5 w-full grid grid-cols-5 grid-rows-6">



    <div id="projectNavBarContainer" class="col-start-2 col-end-5 bg-inherit row-start-1 grid grid-cols-6 mt-2">

        <div id="projectNavBar" class="bg-white col-start-2 col-end-6 rounded-lg mb-2">

        </div>       
        
    </div>

    <div id="toDoRow" class="row-start-2 row-span-5 col-start-2 bg-gray-300 border border-black">

    </div>

    <div id="inProgressRow" class="row-start-2 row-span-5 col-start-3 bg-gray-300  border border-black">

    </div>

    <div id="completeRow" class="row-start-2 row-span-5 col-start-4 bg-gray-300  border border-black">

    </div>


  

 </div>


</div>













</MainLayout>




</template>



<script setup>

import MainLayout from '@/Pages/Layouts/MainLayout.vue'
</script>

<style>
 .mr-5-pct {
    margin-right: 10%;
  }
  .ml-5-pct{
    margin-left:5%;
  }


</style>
