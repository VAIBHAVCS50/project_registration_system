
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


<div class="container">
		<h2>Team Members and Projects</h2>
		<table class="table">
			<tbody>
				<?php
				// Connect to database
				$servername = "localhost";
				$username = "root";
				$password = "1234";
				$dbname = "vaibhav";
				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

				// Select all team members and their projects
                $sql = "SELECT s.reg_num, s.name, s.phone_num, s.email, p.project_id, p.project_title
                FROM students s
                JOIN projects p ON s.project_id = p.project_id
                ORDER BY p.project_id";
        $result = $conn->query($sql);
        
        // Display the team members grouped by project
        $current_project_id = null;
        while ($row = $result->fetch_assoc()) {
          if ($row["project_id"] != $current_project_id) {
            // New project, start a new group
            $current_project_id = $row["project_id"];
            echo "<h2>Project: " . $row["project_title"] . "</h2>";
          }
          echo "<p><strong>" . $row["name"] . "</strong><br>";
          echo "Registration number: " . $row["reg_num"] . "<br>";
          echo "Phone number: " . $row["phone_num"] . "<br>";
          echo "Email: " . $row["email"] . "</p>";
        }
        
        // Close the database connection
        $conn->close();
        ?>
			</tbody>
		</table>
	</div>

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
