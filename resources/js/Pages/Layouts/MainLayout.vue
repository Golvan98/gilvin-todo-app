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

      <footer class="h-1/6 mt-8 mx-auto bg-gray-900 flex items-center text-white justify-center">
          <div id="leftFooter" class="w-1/2 h-full flex items-center justify-center">
            This is the left side of the footer, this is meant to be shown when zoom reaches to an extent
          </div>
          <div id="rightFooter" class="w-1/2 h-full flex items-center justify-center">
            This is the about option, this will not be rendered once zoom reaches to an extent.
          </div>
      </footer>
    
     
    
    
    
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

.mx-10-percent{
  margin-left:10%;
  margin-right:10%;
}


</style>