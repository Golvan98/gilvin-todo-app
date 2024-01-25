<template>

    <div id="container" class="w-full h-screen bg-white text-red-500 flex-nowrap">
    
      <div id="navbar" class="bg-gray-900 w-full h-12">
    
      </div>
    
    
      <div  id="body content" class="w-full h-full bg-white flex ">
    
        <div class="w-20 h-full bg-gray-300">
    
        </div>
    
        <slot>
            
        </slot>
    
    
      </div>
    
     
    
    
    
    </div>
    
    
    </template>
    
    
    
    <script setup>

    </script>

<style>
  
.my-25-percent {
  margin-top: 25%;
  margin-bottom: 25%;
}

.mx-25-percent {
  margin-left: 25%;
  margin-right: 25%;
}


</style>