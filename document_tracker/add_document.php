<?php include("config/db.php"); ?>
<?php include("includes/header.php"); ?>

<div class="container mx-auto px-4 py-6 min-h-screen">

<!-- Status Messages -->
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $submitted_by = mysqli_real_escape_string($conn, $_POST['submitted_by']);
    $submitted_date = !empty($_POST['submitted_date']) 
                        ? "'" . mysqli_real_escape_string($conn, $_POST['submitted_date']) . "'" 
                        : "NOW()";
    // $description = mysqli_real_escape_string($conn, $_POST['description']);
    // $priority = mysqli_real_escape_string($conn, $_POST['priority']);

    // Check if required fields are not empty
if (empty($title) || empty($status) || empty($location) || empty($category) || empty($submitted_by) || empty($submitted_date)) {
  echo '<div class="mt-6 bg-yellow-100 border-2 border-yellow-600 p-4 rounded">
          <p class="text-yellow-800 font-bold text-center">⚠ Please fill in all required document fields before submitting.</p>
        </div>';
} else {
    // Updated SQL query to include new fields
    $sql = "INSERT INTO documents (title, status, location, category, submitted_by, submitted_date, last_update, sync_status)
            VALUES ('$title', '$status', '$location', '$category', '$submitted_by', $submitted_date, NOW(), 'Unsynced')";

    if ($conn->query($sql) === TRUE) {
      echo "<div class='mt-6 bg-green-100 border-2 border-green-600 p-4 rounded'>
                <p class='text-green-800 font-bold text-center'>✓ DOCUMENT ADDED SUCCESSFULLY</p>
              </div>";
    } else {
      echo '<div class="mt-6 bg-red-100 border-2 border-red-600 p-4 rounded">
              <p class="text-red-800 font-bold text-center">✗ ERROR: ' . $conn->error . '</p>
            </div>';
    }
  }
}
  ?>
  
  <!-- Official Header -->
  <!-- <div class="bg-blue-900 text-white p-6 mb-6">
    <h2 class="text-2xl font-bold text-center">DOCUMENT MANAGEMENT SYSTEM</h2>
    <p class="text-center text-blue-100 mt-2">Add New Document</p>
  </div> -->

  <!-- Form Section - Full Width -->

  <div class="bg-white border-2 border-gray-300 p-8 h-full">
    <form method="POST" action="" class="h-full">
      
      <!-- Document Information Section -->
      <div class="border-b-2 border-gray-200 pb-4 mb-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">DOCUMENT INFORMATION</h3>
      </div>

      <!-- Two Column Grid Layout -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        
        <!-- Left Column -->
        <div class="space-y-6">
          
          <!-- Title Field -->
          <div>
            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">
              Document Title *
            </label>
            <input type="text" name="title" maxlength="300" 
       class="w-full p-3 border-2 border-gray-400 focus:border-blue-600 focus:outline-none bg-gray-50" 
       placeholder="Enter document title">

          </div>

          <!-- Status -->
          <div>
            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">
              Status
            </label>
            <select name="status" 
                    class="w-full p-3 border-2 border-gray-400 focus:border-blue-600 focus:outline-none bg-gray-50">
              <option value="Pending">Pending</option>
              <option value="Approved">Approved</option>
              <option value="In Review">In Review</option>
              <option value="Rejected">Rejected</option>
            </select>
          </div>

          <!-- Location Folder -->
          <div>
            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">
              Location Folder *
            </label>
            <select name="location" 
                   class="w-full p-3 border-2 border-gray-400 focus:border-blue-600 focus:outline-none bg-gray-50">
            <option value="">-- Select Location Folder --</option>
            <option value="ENDORSEMENT FOR FUEL CARD RELEASE">ENDORSEMENT FOR FUEL CARD RELEASE</option>
            <option value="ENDORSEMENT FOR CARD REPLACEMENT">ENDORSEMENT FOR CARD REPLACEMENT</option>
            <option value="ENDORSEMENT FOR CARD PIN RESET">ENDORSEMENT FOR CARD PIN RESET</option>
            <option value="ENDORSEMENT FOR CARD REACTIVATION">ENDORSEMENT FOR CARD REACTIVATION</option>
            <option value="ENDORSEMENT FOR CARD PIN MAILER">ENDORSEMENT FOR CARD PIN MAILER</option>
            <option value="OED MEMORANDUM LETTERS">OED MEMORANDUM LETTERS</option>
            <option value="CERTIFICATIONS">CERTIFICATIONS</option>
            <option value="REQUEST LETTER WITHIN LTFRB">REQUEST LETTER WITHIN LTFRB</option>
            <option value="LETTER OF NOTICE">LETTER OF NOTICE</option>
            <option value="LETTER OF INVITATION AND MEETINGS">LETTER OF INVITATION AND MEETINGS</option>
            <option value="FUEL SUBSIDY CERTIFICATES">FUEL SUBSIDY CERTIFICATES</option>
            <option value="RESOLUTION NO. FOR CORP/COOP">RESOLUTION NO. FOR CORP/COOP</option>
            <option value="CHECKLIST">CHECKLIST</option>
            <option value="MOA (GET CORP VS TRAFECO)">MOA (GET CORP VS TRAFECO)</option>
            <option value="THE GOOD BUS">THE GOOD BUS</option>
            <option value="SUPER 5 TRANSPORT">SUPER 5 TRANSPORT</option>
            <option value="ACCIDENT REPORT">ACCIDENT REPORT</option>
            <option value="SPECIAL OFFICE ORDER">SPECIAL OFFICE ORDER</option>
            <option value="ISSUES/COMPLAINTS">ISSUES/COMPLAINTS</option>
            <option value="PERSONAL FILE">PERSONAL FILE</option>
            <option value="TRANSPORT GROUP/S FILES">TRANSPORT GROUP/S FILES</option>
            <option value="BUREAU OF INTERNAL REVENUE">BUREAU OF INTERNAL REVENUE</option>
            <option value="ENDORSEMENT LETTER">ENDORSEMENT LETTER</option>
            <option value="REQUISITION AND ISSUE SLIP">REQUISITION AND ISSUE SLIP</option>
            <option value="ENDORSEMENT LETTER(RECEIVED COPY)">ENDORSEMENT LETTER(RECEIVED COPY)</option>
            <option value="FOR GOVERNOR UNABIA">FOR GOVERNOR UNABIA</option>
            <option value="MOA FOR WORK IMMERSION PARTNERSHIP">MOA FOR WORK IMMERSION PARTNERSHIP</option>
            <option value="SCP - LGU">SCP - LGU</option>
            <option value="LETTER FROM CITY OF CAGAYAN DE ORO">LETTER FROM CITY OF CAGAYAN DE ORO</option>
            <option value="COMISSION ON AUDIT">COMISSION ON AUDIT</option>
            <option value="RURAL TRANSIT MINDANAO INC">RURAL TRANSIT MINDANAO INC</option>
            <option value="MEMORANDUM LETTER">MEMORANDUM LETTER</option>
            <option value="ENDORSEMENT LETTER & MEMORANDUM ORDER">ENDORSEMENT LETTER & MEMORANDUM ORDER</option>
            </select>
          </div>

          

        </div>

        <!-- Right Column -->
        <div class="space-y-6">
          
          <!-- Category -->
          <div>
            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">
              Category *
            </label>
            <select name="category" 
                   class="w-full p-3 border-2 border-gray-400 focus:border-blue-600 focus:outline-none bg-gray-50">
                   <option value="">-- Select Category --</option>
            <option value="Incoming Communication">Incoming Communication</option>
            <option value="Outgoing Communication">Outgoing Communication</option>
            <option value="SPC">SPC</option>
            <option value="Probation/Monitoring">Probation/Monitoring</option>
            <option value="Authorities">Authorities</option>
            <option value="Inspections/Audits">Inspections/Audits</option>
            <option value="Hearing/Cases">Hearing/Cases</option>
            <option value="Training/Seminars">Training/Seminars</option>
            </select>
          </div>

          <!-- Submitted By -->
          <div>
            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">
              Submitted By *
            </label>
            <input type="text" name="submitted_by" 
                   class="w-full p-3 border-2 border-gray-400 focus:border-blue-600 focus:outline-none bg-gray-50">
          </div>
          
          <!-- Submitted Date -->
          <div>
            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">
              Submitted Date *
            </label>
            <input type="datetime-local" name="submitted_date" 
                   class="w-full p-3 border-2 border-gray-400 focus:border-blue-600 focus:outline-none bg-gray-50">
          </div>

          <!-- Additional Description/Notes Field -->
          <!-- <div>
            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">
              Notes
            </label>
            <textarea name="description" rows="4"
                     class="w-full p-3 border-2 border-gray-400 focus:border-blue-600 focus:outline-none bg-gray-50 resize-vertical"
                     placeholder="Additional information about the document..."></textarea>
          </div> -->

          <!-- Priority Level -->
          <!-- <div>
            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">
              Priority Level
            </label>
            <select name="priority" 
                   class="w-full p-3 border-2 border-gray-400 focus:border-blue-600 focus:outline-none bg-gray-50">
              <option value="Normal">Normal</option>
              <option value="High">High</option>
              <option value="Urgent">Urgent</option>
              <option value="Low">Low</option>
            </select>
          </div> -->

        </div>
      </div>

      <!-- Submit Section -->
      <div class="border-t-2 border-gray-200 pt-6 mt-8">
        <div class="flex justify-center gap-4">
          <button type="submit" 
                  class="bg-blue-900 hover:bg-blue-800 text-white font-bold py-3 px-8 border-2 border-blue-900 uppercase tracking-wide transition-colors">
            SAVE DOCUMENT
          </button>
          <button type="reset" 
                  class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-8 border-2 border-gray-500 uppercase tracking-wide transition-colors">
            CLEAR FORM
          </button>
        </div>
      </div>
    </form>
  </div>

  

  <!-- Footer Information -->
  <div class="mt-8 text-center text-gray-600 text-sm">
    <p>* Required fields must be completed</p>
    <p>For assistance, contact your system administrator</p>
  </div>
</div>

<style>
/* Government Office Styling */
body {
  font-family: 'Arial', sans-serif;
  background-color: #f8f9fa;
  min-height: 100vh;
}

/* Full height container */
/* .container {
  min-height: calc(100vh - 2rem);
} */

/* Responsive adjustments */
@media (max-width: 1023px) {
  .grid-cols-1.lg\:grid-cols-2 {
    grid-template-columns: 1fr;
  }
}

/* Print-friendly styles */
@media print {
  .no-print {
    display: none;
  }
  
  body {
    background: white;
  }
}

/* Accessibility improvements */
input:focus,
textarea:focus,
select:focus {
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
}

/* High contrast for better readability */
label {
  color: #1f2937;
}

/* Consistent spacing */
.container {
  line-height: 1.6;
}

/* Smooth transitions */
button {
  transition: all 0.2s ease-in-out;
}

/* Form validation styling */
input:invalid,
select:invalid {
  border-color: #ef4444;
}

input:valid,
select:valid {
  border-color: #10b981;
}
</style>

<?php include("includes/footer.php"); ?>