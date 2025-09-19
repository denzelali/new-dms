<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Government Document Management System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom styles for government branding */
    .gov-seal {
      width: 32px;
      height: 32px;
      background-image: url('assets/LTFRB_Seal.png');
      background-size: cover;      
      background-position: center; 
      border-radius: 50%;          
      border: 2px solid #374151;  
    }

    .govs-seal {
      width: 32px;
      height: 32px;
      background-image: url('assets/dotr.png');
      background-size: cover;      
      background-position: center; 
      border-radius: 50%;          
      border: 2px solid #374151;  
    }

    .accessibility-link {
      position: absolute;
      left: -9999px;
      width: 1px;
      height: 1px;
      overflow: hidden;
    }
    
    .accessibility-link:focus {
      position: static;
      width: auto;
      height: auto;
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen">

  <!-- Skip to content link for accessibility -->
  <a href="#main-content" class="accessibility-link focus:absolute focus:top-4 focus:left-4 focus:bg-blue-600 focus:text-white focus:px-3 focus:py-2 focus:rounded focus:z-50">
    Skip to main content
  </a>

  <!-- Official Government Banner -->
  <div class="bg-gray-800 text-white py-2 text-sm">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
          <div class="gov-seal"></div>
          <div class="govs-seal"></div>
          <span>LTFRB</span>
        </div>
        <div class="flex items-center text-gray-400">
          <a href="https://www.facebook.com/LTFRBRegionX" target="_blank" class="hover:text-blue-600">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22 12a10 10 0 10-11.5 9.9v-7H8v-3h2.5V9.5c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.3 0-1.7.8-1.7 1.6V12H18l-.5 3h-2v7A10 10 0 0022 12z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Navigation -->
  <nav class="bg-white border-b-4 border-blue-600 shadow-sm" role="navigation" aria-label="Main navigation">
    <div class="container mx-auto px-4 py-4">
      <div class="flex justify-between items-center">
        <!-- Logo and Title -->
        <div class="flex items-center space-x-4">
          <!-- Back Button Placeholder -->
          <?php include("backbtn.php"); ?>
          
          <div class="border-l border-gray-300 pl-4">
            <a href="index.php" class="font-semibold text-xl text-gray-800 hover:text-blue-600 transition-colors">
              Document Management System
            </a>
            <div class="text-sm text-gray-600">Government Records & Tracking</div>
          </div>
        </div>

        <!-- Action Buttons + Search -->
        <div class="flex items-center space-x-3">
          <!-- Search Form -->
          <form action="index.php" method="GET" class="flex items-center space-x-2">
  <input 
    type="text" 
    name="search" 
    placeholder="Search documents..." 
    class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"
    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
  >
  <button type="submit" class="bg-green-600 text-white p-2 rounded hover:bg-blue-700 flex items-center justify-center">
  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <circle cx="11" cy="11" r="8" />
    <line x1="21" y1="21" x2="16.65" y2="16.65" />
  </svg>
</button>

</form>


          <!-- New Document Button -->
          <a href="add_document.php" 
   class="bg-blue-600 text-white w-9 h-9 flex items-center justify-center rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
  </svg>
</a>

        </div>
      </div>
    </div>
  </nav>

</body>
</html>
