<template>
  <div id="container" class="w-full h-screen bg-white text-red-500 flex flex-col">
    <!-- Top Navbar -->
    <div id="topNavBar" class="bg-gray-900 w-full h-20 flex items-center justify-center space-x-12 font-bold shadow-lg text-1xl text-white">
      <div> Home </div>
      <div> Projects </div>
      <div> Account </div>
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
    <footer class="h-1/6 mt-8 mx-auto bg-gray-900 flex-nowrap">
      <div id="leftFooter" class="h-full bg-red-300">
        This is the left side of the footer. Icons are meant to be shown here and will persist when zoom reaches to an extent
      </div>
      <div id="rightFooter" class="h-full">
        This is the about option, this will not be rendered once zoom reaches to an extent.
      </div>
    </footer>
  </div>
</template>

<style>
  @media screen and (max-width: 768px) {
    /* Adjust styles for smaller screens */
   
    #leftFooter, #rightFooter{
      font-size: 2px;
    
      width: 100%;
      height: 100%;
    }
    #leftNavBar{
        display:none;
      }
  }

  @media screen and (min-width: 768px) {
    /* Adjust styles for different zoom levels */
    #leftFooter, #rightFooter {
      font-size: 14px;
      width:100%;
      font:green;
      
    }
  }


</style>
