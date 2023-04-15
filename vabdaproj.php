
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Management</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Project Registration</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="vabdaproj.php">Register <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="vabdaview.php">View Registered Teams</a>
      </li>

    </ul>
  </div>
</nav>













 <h1 class="text-center">Project Management System</h1>
  <div class="container">
  <h2>Team Details</h2>
  <br> 
    <form action="vabdaproj.php" method="post" onsubmit="return validateForm()">

   <!--  -->
   <div class="form-group">
          <h5>Team Member 1</h5>
          <input type="number" hidden id="size" name="size">
          <label>Registration Number: </label>
          <input type="text" class="form-control" id="regnum1" name="regnum1" required>
        </div>
        <div class="form-group">
          <label>Name: </label>
          <input type="text" class="form-control" id="name1" name="name1" required>
        </div>
        <div class="form-group">
          <label>Phone Number: </label>
          <input type="text" class="form-control" id="phone1" name="phone1" required>
        </div>
        <div class="form-group">
          <label>Email: </label>
          <input type="text" class="form-control" id="email1" name="email1" required>
        </div>
        <div id="teamMembers"></div>
        <input type="button" class="btn btn-primary" value="Add Team Member" onclick="addTeamMember()">

     

        <span id="err"></span>
        
  <br>
  <br>
  <br>
   <h2>Project Details</h2>
<!--  -->

      <div class="form-group">
        <label for="projectTitle">Project Title</label>
        <input type="text" class="form-control" id="projectTitle" name="projectTitle" required>
      </div>
      <div class="form-group">
        <label for="projectAbstract">Project Abstract</label>
        <textarea class="form-control" id="projectAbstract" name="projectAbstract" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label for="projectFunctionalities">Project Functionalities</label>
        <textarea class="form-control" id="projectFunctionalities" name="projectFunctionalities" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label for="resourcesRequired">Resources Required (Hardware and Software)</label>
        <textarea class="form-control" id="resourcesRequired" name="resourcesRequired" rows="3" required></textarea>
      </div>
      <div class="form-group">
        <label for="dataModel">Data Model (JPG image only)</label>
        <input type="file" class="form-control-file" id="dataModel" name="dataModel" accept="image/jpeg">
      </div>
      <input type="submit" class="btn btn-primary" name="fsubmit" id="fsubmit" value="Submit">

      
    </form>
  </div>
  <script>
    teamMemberCount=1;
function addTeamMember() {

if(teamMemberCount<3)
{
  teamMemberCount++;
const teamMemberDiv = document.createElement("div");
teamMemberDiv.innerHTML = `
<div class="form-group">
        <h5>Team Member ${teamMemberCount}</h5>
        <label>Registration Number: </label>
        <input type="text" class="form-control" id="regnum${teamMemberCount}" name="regnum${teamMemberCount}" required>
      </div>
      <div class="form-group">
        <label>Name: </label>
        <input type="text" class="form-control" id="name${teamMemberCount}" name="name${teamMemberCount}" required>
      </div>
      <div class="form-group">
        <label>Phone Number: </label>
        <input type="text" class="form-control" id="phone${teamMemberCount}" name="phone${teamMemberCount}" required>
      </div>
      <div class="form-group">
        <label>Email: </label>
        <input type="text" class="form-control" id="email${teamMemberCount}" name="email${teamMemberCount}" required>
      </div>
      <button type="button" class="btn btn-danger" onclick="removeTeamMember(this)">Remove Member</button>
      <br> <br>
`;    

document.getElementById("teamMembers").appendChild(teamMemberDiv);
}
else{
 const sel=document.getElementById("err");
 sel.innerText="Not More Than 3 members can be added";
 sel.style.color="red";
}
}
function removeTeamMember(btn)
{
  const toremove= btn.parentElement;
  toremove.remove();
  teamMemberCount--;
  const sel=document.getElementById("err");
  sel.innerHTML="";

}
function validateForm() {
  const size=document.getElementById("size");
  size.value=teamMemberCount;
const regNumRegex = /^\d{2}[A-Za-z]{3}\d{4}$/;
const phoneNumRegex = /^\d{10}$/;;
const namePattern = /^[A-Za-z]+$/;
const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

for (let i = 1; i <= teamMemberCount; i++) {
  const regNum = document.getElementById(`regnum${i}`).value;
  const name = document.getElementById(`name${i}`).value;
  const phoneNum = document.getElementById(`phone${i}`).value;
  const email = document.getElementById(`email${i}`).value;

  if (!regNumRegex.test(regNum)) {

   const sel=document.getElementById("err");
   sel.innerText=`Invalid registration number for team member ${i}`;
   sel.style.color="red";
    return false;
  }
  if (!namePattern.test(name)) {
      const sel = document.getElementById("err");
      sel.innerText = `Invalid name for team member ${i}`;
      sel.style.color = "red";
      return false;
  }
//   if (!phoneNumRegex.test(phoneNum)) {
//       const sel=document.getElementById("err");
//    sel.innerText=`Invalid phone number for team member ${i}`;
//    sel.style.color="red";
//     return false;
//   }
  if (!emailRegex.test(email)) {
      const sel=document.getElementById("err");
   sel.innerText=`Invalid email for team member ${i}`;
   sel.style.color="red";
    return false;
  }
}
return true;
}
   

    </script>


 


<?php

if(isset($_POST['fsubmit'])) {

    $servername = "localhost";

    $username = "root";

    $password = "1234";

    $dbname = "vaibhav"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {

        die("Connection Failed" . $conn->connect_error);

    }
  
  $teamSize = $_POST['size'];
  
  // retrieve the details of team members based on the team size
  $teamMembers = array();
  for($i=1; $i<=$teamSize; $i++) {
    $regnum = $_POST['regnum'.$i];
    $name = $_POST['name'.$i];
    $phone = $_POST['phone'.$i];
    $email = $_POST['email'.$i];
    $teamMembers[$i-1] = array('regnum'=>$regnum, 'name'=>$name, 'phone'=>$phone, 'email'=>$email);
  }
  $projectTitle = $_POST['projectTitle'];
  $projectAbstract = $_POST['projectAbstract'];
  $projectFunctionalities = $_POST['projectFunctionalities'];
  $resourcesRequired = $_POST['resourcesRequired'];



  if (isset($_FILES['dataModel'])) {
    $dataModelPath = $_FILES['data_model']['tmp_name'];
    $dataModelContent = file_get_contents($dataModelPath);
  }
  $query = "SELECT COUNT(*) as count FROM projects";
$result43 = mysqli_query($conn,$query);
$row = $result43->fetch_assoc();
$count = $row['count'];

  $sql2 = "INSERT INTO projects (project_id,project_title, project_abstract, project_functionalities, resources_required)
VALUES ('$count','$projectTitle', '$projectAbstract', '$projectFunctionalities', '$resourcesRequired')";
 $result12 = mysqli_query($conn, $sql2);

$stmt = $conn->prepare("INSERT INTO students (reg_num, name, phone_num, email,project_id) VALUES (?, ?, ?, ?, ?)");

foreach ($teamMembers as $member) {
  $stmt->bind_param("sssss", $member['regnum'], $member['name'], $member['phone'], $member['email'],$count);
  $stmt->execute();
}

  echo "<div class='alert alert-success' role='alert'>
  Record Successfully inserted
</div>";

}
?>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNSqnEw"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>
</html>
