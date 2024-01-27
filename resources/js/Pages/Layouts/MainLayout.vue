<template>

    <div id="container" class="w-full h-screen bg-white text-red-500 flex-nowrap">
    
      <div id="topNavBar" class="bg-gray-900 w-full h-20 flex items-center justify-center space-x-12 font-bold shadow-lg text-1xl text-white">
        <div> Home </div>
        <div> Projects </div>
        <div> Account </div>
      </div>
    
    
      <div id="body content" class="w-full h-full bg-white flex ">
    
        <div id="leftNavBar" class="w-20 h-full bg-gray-300 text-red-700">
            Hello, this is the navbar, this will not be shown when zoomed in 
        </div>
    
        <slot>
            
        </slot>
    
    
      </div>

      <footer class="h-1/6 mt-8 mx-auto bg-gray-900 flex items-center text-white justify-center">
          <div id="leftFooter" class="w-1/2 h-full flex items-center justify-center mx-12">
            This is the left side of the footer. Icons are meant to be shown here and will persist when zoom reaches to an extent
          </div>
          <div id="rightFooter" class="w-1/2 h-full flex items-center justify-center mx-12">
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