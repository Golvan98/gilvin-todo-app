<template>
<MainLayout>

    <body class="w-full h-full bg-cover bg-center mt-4 ml-4 mr-4 mb-4 flex justify-center items-center" style="background-image: url('https://scontent-mnl1-1.xx.fbcdn.net/v/t1.15752-9/421254918_758212862928699_3730173485801413278_n.png?stp=dst-png_s2048x2048&_nc_cat=103&ccb=1-7&_nc_sid=8cd0a2&_nc_ohc=1ReUqZlfNlsAX8s2o9c&_nc_ht=scontent-mnl1-1.xx&oh=03_AdQKo9aOdU6jKRv4NON1051BmXhVdb6KYgfDBarE1mH75Q&oe=65D9AAE6');">
      <div class="contrast-200 w-full flex justify-end drop-shadow-2xl font-bold text-3xl text-gray-900 mx-25-percent">
          
         <span class="bg-black text-white p-2 rounded-xl opacity-80"> Project Management Simplified </span> 
          

          
      </div>
    </body>


</MainLayout>
</template>



<script setup>
import MainLayout from '@/Pages/Layouts/MainLayout.vue'
</script>

<style>
  @media screen and (max-width: 768px) {
    .mx-25-percent {
      /* Adjust styles for smaller screens */
      margin-left: 5%;
      margin-right: 5%;
    }
  }
  @media screen and (max-width: 1920) {
    body {
        max-zoom: 3; /* Set the maximum zoom level to 1 */
    }
}


</style>