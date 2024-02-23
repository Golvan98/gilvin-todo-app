<template>

<MainLayout>



<div id="firstBlock" class="bg-gray-300 flex items-center justify-center mx-auto mr-5-pct ml-5-pct w-full h-full">

 <div id="secondBlock" class="bg-gray-300 h-4/5 w-full grid grid-cols-4 grid-rows-4">



    <div id="projectNavBarContainer" class="col-span-4 bg-gray-300 row-span-1  grid grid-cols-6 mt-2">

        <div id="projectNavBar" class="bg-white col-start-2 col-end-6 rounded-lg mb-2">

        </div>       
        
    </div>

    <div id="firstRow" class="row-span-3 col-span-1 bg-gray-300 border border-black">

    </div>

    <div id="secondRow" class="row-span-3 col-span-1 bg-gray-300  border border-black">

    </div>

    <div id="thirdRow" class="row-span-3 col-span-1 bg-gray-300  border border-black">

    </div>

    <div id="fourthRow" class="row-span-3 col-span-1 bg-gray-300  border border-black">

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
