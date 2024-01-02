<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php';?>
    <title>Student Personal Data Sheet</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .si{
        width: 100%;
        height: auto;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    fieldset {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
        background-color: rgba(255, 255, 255, .8);
        color:black;
    }
    .row{
        border-radius: 5px;
        padding:5px;
        box-shadow: #ccc;
        border: 1px solid rgba(255, 255, 255, .5);
    }
</style>

</head>
<body>


    <!-- Bubbles -->
    <div class="bubbles" style="top: 5%; left: 5%;"></div>
    <div class="bubbles" style="top: 25%; left: 45%;"></div>
    <div class="bubbles" style="top: 55%; left: 75%;"></div>
    
<div class="container mt-4">
    <fieldset>
      <div class="text-center mb-2">
         <h3>Student Enrollment : Personal Data Sheet</h3>
         <p class="text-muted">Complete the form below to submit enrollment application.</p>
         <hr>
      </div>

    <div class="container d-flex justify-content-center">
    <form action="enroll.php" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
    
        <div class="text-center mb-2">
            <input type="text" id="sid" name="sid" class="text-center" readonly>
        </div>
   
    
         <!-- FULL NAME -->
         <div class="row mt-4">
            <div class="col-md-3">
                <label for="first_name">First Name</label>
                <input class="form-control" type="text" id="fn" name="fn" placeholder="First Name" required>
            </div>
            <div class="col-md-3">
                <label for="middle_name">Middle Name</label>
                <input class="form-control" type="text" id="mn" name="mn" placeholder="Middle Name">
            </div>
            <div class="col-md-3">
                <label for="last_name">Last Name</label>
                <input class="form-control" type="text" id="ln" name="ln" placeholder="Last Name" required>
             </div>
             <div class="col-md-3">
                <label for="suffix">Suffix</label>
                <input class="form-control" type="text" id="sf" name="sf" placeholder="Name Extension">
             </div>
         </div>
         <!-- END FULL NAME -->

        <!-- LINE 2-->
        <div class="row mt-4">
            <div class="col-md-3">
                <label for="bd">Birthdate</label>
             <input class="form-control" type="date" id="bd" name="bd" required>
            </div>
            <div class="hidden">
                <label for="age">Age</label>
                <input class="form-control" type="number" id="age" name="age" placeholder="Age" readonly>
            </div>
             
             <div class="col-md-3">
                 <label for="bp">Birthplace</label>
                 <input class="form-control" type="text" id="bp" name="bp" placeholder="Birth Place" required>
             </div>
             <div class="col-md-3">
                 <label for="r">Religion</label>
                 <input class="form-control" type="text" id="r" name="r" placeholder="Religion" required>
             </div>
             <div class="col-md-3">
                 <label for="sex">Gender</label>
                     <select class="form-select" name="sex" required>
                         <option value="Male">Male</option>
                         <option value="Female">Female</option>
                     </select>
             </div>
         </div>  
        <!-- END LINE 2-->
        
        <!-- LINE 3-->
        <div class="row mt-4">
             <div class="col-md-6">
                 <label for="pa">Present Address</label>
                 <input class="form-control" type="text" id="pa" name="pa" placeholder="Present Address" required>
             </div>
             <div class="col-md-3">
                 <label for="pa">Email Address</label>
                 <input class="form-control" type="email" id="em" name="em" placeholder="sample@hotmail.com" required>
             </div>
             <div class="col-md-3">
                 <label for="cs">Civil Status</label>
                     <select class="form-select" name="cs" required>
                         <option value="Single">Single</option>
                         <option value="Married">Married</option>
                         <option value="Widowed">Widowed</option>
                         <option value="Live In">Live In</option>
                     </select>
             </div>
        </div>
        <div class="row mt-4">     
             <div class="col-md-4">
                 <label for="no">Phone Number</label>
                 <input class="form-control" type="number" id="no" name="no" placeholder="XXXX XXX XXXX" oninput="formatPhoneNumber(this)" required>
             </div>
             <div class="col-md-4">
                 <label for="es">Employment Status</label>
                     <select class="form-select" name="es" required>
                         <option value="Student">Student</option>
                         <option value="Employed">Employed</option>
                         <option value="Unemployed">Unemployed</option>
                     </select>
             </div>
             <div class="col-md-4">
                 <label for="hh">Household ID No. (if 4P's)</label>
                 <input class="form-control" type="text" id="hh" name="hh" placeholder="Household ID Number">
             </div>
         </div>  
         <!-- END LINE 3-->

         <!-- LINE 4-->
         <div class="row mt-4">
             <div class="col-md-4">
                 <label for="ffn">Father's Name</label>
                 <input class="form-control" type="text" id="ffn" name="ffn" placeholder="Father's Name">
             </div> 
             <div class="col-md-4">
                 <label for="mfn">Mother's Maiden Name</label>
                 <input class="form-control" type="text" id="mfn" name="mfn" placeholder="Mother's Maiden Name">
             </div> 
             <div class="col-md-4">
                 <label for="sfn">Spouse's Name (if married)</label>
                 <input class="form-control" type="text" id="sfn" name="sfn" placeholder="Spouse Name">
             </div> 
         </div> 
         <!-- END LINE 4-->
        
        <!-- LINE 5-->
         <div class="row mt-4">
             <div class="col-md-8">
                 <label for="elem">Elementary</label>
                 <input class="form-control" type="text" id="elem" name="elem" placeholder="Elementary School Graduated" required>
             </div> 
             <div class="col-md-4">
                 <label for="elemyg">Year Graduated</label>
                 <input class="form-control" type="text" id="elemyg" name="elemyg" placeholder="20XX-20XX" required>
             </div>
         </div> 
         <!-- END LINE 5-->
        
        <!-- LINE 6-->
         <div class="row mt-4">
             <div class="col-md-8">
                 <label for="hs">High School</label>
                 <input class="form-control" type="text" id="hs" name="hs" placeholder="High School Graduated" required>
             </div> 
             <div class="col-md-4">
                 <label for="hsyg">Year Graduated</label>
                 <input class="form-control" type="text" id="hsyg" name="hsyg" placeholder="20XX-20XX" required>
             </div>
         </div> 
         <!-- END LINE 6-->
        
        <!-- LINE 7-->
         <div class="row mt-4">
             <div class="col-md-6">
                 <label for="c">College</label>
                 <input class="form-control" type="text" id="c" name="c" placeholder="College Graduated" >
             </div> 
             <div class="col-md-3">
                 <label for="cyg">Year Graduated</label>
                 <input class="form-control" type="text" id="cyg" name="cyg" placeholder="20XX-20XX" >
             </div>
             <div class="col-md-3">
                 <label for="cc">Course</label>
                 <input class="form-control" type="text" id="cc" name="cc" placeholder="Course/ Strand" >
             </div>
         </div> 
         <!-- END LINE 7-->
        
        <!-- LINE 8-->
         <div class="row mt-4">
             <div class="col-md-8">
                 <label for="lsa">Last School Attended</label>
                 <input class="form-control" type="text" id="lsa" name="lsa" placeholder="Last School Attended" required>
             </div> 
             <div class="col-md-4">
                 <label for="lsac">Course</label>
                 <input class="form-control" type="text" id="lsac" name="lsac" placeholder="Course Taken" required>
             </div>
         </div> 
         <!-- END LINE 8-->
        
        <!-- LINE 9-->
         <div class="row mt-4">
             <div class="col-md-8">
                 <label for="lsaa">Last School Attended Address</label>
                 <input class="form-control" type="text" id="lsaa" name="lsaa" placeholder="Last School Attended Address" required>
             </div>
             <div class="col-md-4">
                 <label for="ac">Admission Credential</label>
                 <select class="form-select" name="ac" required>
                         <option value="Yes">I have</option>
                         <option value="No">I don't have</option>
                     </select>
             </div>
         </div> 
        <!-- END LINE 9-->
        
        <!-- LINE 10-->
         <div class="row mt-4">
             <div class="col-md-8">
                 <label for="mc">Do you have any medical condition that may warrant attention?</label>
                     <select class="form-select" name="mc" required>
                         <option value="Yes">Yes</option>
                         <option value="No">No</option>
                     </select>
             </div>
             <div class="col-md-4">
                 <label for="mcs">If YES, please state particulars</label>
                 <input class="form-control" type="text" id="mcs" name="mcs" placeholder="State particular condition">
             </div>
         </div> 
        <!-- END LINE 10-->
        
        <!-- LINE 11-->
         <div class="row mt-4">
             <div class="col-md-6">
                 <label for="en">Emergency Person Name</label>
                 <input class="form-control" type="text" id="en" name="en" placeholder="Emergency Person Full Name">
             </div>
             <div class="col-md-6">
                 <label for="eno">Emergency Person Contact Number</label>
                 <input class="form-control" type="text" id="eno" name="eno" placeholder="XXXX XXX XXXX" oninput="formatPhoneNumber(this)">
             </div>
         </div> 
        <!-- END LINE 11-->
        
        <!-- LINE 12-->
         <div class="row mt-4">
             <div class="col-md-8">
                 <label for="ea">Emergency Person Address</label>
                 <input class="form-control" type="text" id="ea" name="ea" placeholder="Emergency Person Address" >
             </div>
             <div class="col-md-4">
                 <label for="er">Emergency Person Relationship</label>
                 <input class="form-control" type="text" id="er" name="er" placeholder="Emergency Person Relationship">
             </div>
         </div> 
        <!-- END LINE 12-->
        
        <!-- LINE 13-->
         <div class="row mt-4">
             <div class="col-md-12">
                 <label for="pc">Preferred Course</label>
                     <select class="form-select" id="pc" name="pc" required>
                         <?php
                            include 'dbconn.php';
                            
                            $sql = "SELECT * FROM course";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['courseId'] . "'>" . $row['degree'] . " in " . $row['course'] . " (" . $row['acronym'] . ")" . "</option>";
                                }
                            }

                            mysqli_close($conn);
                         ?>
                     </select>
             </div>
         </div> 
         <!-- END LINE 13-->
        
        <!-- LINE 14-->
         <div class="row mt-4">
             <div class="col-md-6">
                 <label for="image" class="form-label">
                 Image <input class="form-control" type="file" id="image" name="image" onchange="displayImage(this, 'si')"></label>
             </div>
         </div> 

         
         <div class="row mt-4">
                 <div class="col-md-6">
                     <img src="img/user.png" alt="Student Image" class="si" id="si">
                 </div>
         </div> 
         <!-- END LINE 14-->
        
        <!-- LINE 15-->
         <div class="row mt-4">
             <div class="col-md-8">
                 <p>Terms and Conditions</p>
                 <div class="checkbox-container">
                     <input type="checkbox" id="agree" name="agree" onclick="generatePassword()" required>
                     <label class="checkbox-label" for="agree">I agree to the <a href="terms.php" target="_blank">Terms and Conditions.</a></label>
                 </div>
             </div>
             <div class="hidden">
                 <label for="er">Password</label>
                 <input class="form-control" type="text" id="pw" name="pw" placeholder="Password">
             </div>
         </div>
        <!-- END LINE 15-->

         <button type="submit" name="enroll" class="btn btn-primary">Submit</button>

     </form>
    </div>
    </fieldset>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script>
      // JavaScript to calculate age based on birthdate
      document.getElementById("bd").addEventListener("input", function() {
         var birthdate = new Date(this.value);
         var today = new Date();
         var age = today.getFullYear() - birthdate.getFullYear();
         if (today.getMonth() < birthdate.getMonth() || (today.getMonth() === birthdate.getMonth() && today.getDate() < birthdate.getDate())) {
            age--;
         }
         document.getElementById("age").value = age;
      });
   </script>

<script>
        function displayImage(input, imgId) {
        const selectedImage = document.getElementById(imgId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                selectedImage.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            selectedImage.src = ""; // Clear the image if no file is selected
        }
    }
    </script>

<script>
        function formatPhoneNumber(input) {
            // Remove any non-digit characters
            let phoneNumber = input.value.replace(/\D/g, '');

            // If the number has more than 11 digits, trim it
            if (phoneNumber.length > 11) {
                phoneNumber = phoneNumber.substr(0, 11);
            }
            
            // Format it as 12345678910
            input.value = phoneNumber;
        }
        
        // Prevent typing after 11 digits
        document.getElementById('contactNumber').addEventListener('input', function() {
            if (this.value.length >= 11) {
                this.value = this.value.slice(0, 11);
            }
        });
    </script>
   
   <script>
        function generatePassword() {
            fetch('gp.php') // The PHP script to generate the password
                .then(response => response.text())
                .then(password => {
                    document.getElementById('pw').value = password; // Display the password in the input field
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

    <script>
        function generateStudentID() {
            fetch('gid.php')
                .then(response => response.text())
                .then(studentID => {
                    document.getElementById('sid').value = studentID;
                })
                .catch(error => console.error('Error:', error));
        }
        generateStudentID();
    </script>

</body>
</html>
