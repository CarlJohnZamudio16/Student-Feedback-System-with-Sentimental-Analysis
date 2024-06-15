<?php 
session_start(); // Start the session
require 'config.php';
?>


<?php
$current_page = basename($_SERVER['PHP_SELF']); // Get the current page filename
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Comments</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
    </head>
    <style>

    	table {
			border-collapse: collapse;
			width: 100%;
            
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {
			cursor: pointer;

		}

		th {
            background-color: #11ff00;
            text-transform: uppercase;
            font-weight: 400;
            font-size: 17px;
        }
        

        @keyframes gradient {
          0% {
        background-position: 0% 50%;
           }
         50% {
        background-position: 100% 50%;
          }
        100% {
        background-position: 0% 50%;
         }
        }

    .new-feedback {
    font-weight: bold; /* Make the text bold */
    padding: 5px; /* Add some padding for better visibility */
        }
      .time {
        width: 100px;
      }
      .name {
        width: 270px;
      }

      .navbar{
     background: linear-gradient(-45deg, #1aff00, #feff00, #45ff00, #f9ff00);
  background-size: 400% 400%;
  animation: gradient 15s ease infinite;
  color: black;
    }

li.text-muted{
color: red;
}
.sidebar-logo {
    display: flex;
    justify-content: center;
    align-items: center;
}

.sidebar-logo a {
    font-size: 60px;
    font-weight: 800;
}

a.sidebar-link::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 4px;
    border-radius: 4px;
    bottom: 0;
    left: 0;
    transform-origin: right;
    transform: scaleX(0);
    transition: transform .3s ease-in-out;
  }

a.sidebar-link:hover {
   padding-left: 35px;
     color: #00ff08;
     transition: all 0.3s ease;
     opacity: 0.5;
}

.btn-primary {
            margin-bottom: 1%;
            margin-top: 1%;
            
        }
        .btn-primary:hover {
            color: black;
            text-decoration: none;
          }



  .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7);
        color: black;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        animation: fadeIn 0.5s; /* Add animation here */
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .close {
        color: #aaa;
        margin-left: 99%;
        margin-top: -15px;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
.name-label{
	margin-top: -10px;
    font-weight: bold;
}
.main{
	display: flex;
	flex-direction: column;
	min-height: 100vh;
	min-width: 0;
	overflow: hidden;
	transition: all 0.35s ease-in-out;
	width: 100%;
	background: var(--bs-dark-bg-subtle);

	background-image: url('bbbbb.png'); /* Replace 'your-image.jpg' with your image */
  background-size: 440px 440px;
  background-position: center;
  background-repeat: no-repeat;
}
a.theme-toggle{
    background-color: transparent;
    position: absolute;
    top: 15%;
    right: 0;
}
.table-container{
    max-height: 270px; /* Set your preferred height */
    overflow-y: auto;
}
.table-container th{
     position: sticky;
    top: 0;
    z-index: 1;
}
.table-container table{
    width: 100%;
    border-collapse: collapse;
}
 /* CSS for modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Enable scroll if needed */
        }
        .modal-content {
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 40%; /* Could be more or less, depending on screen size */
            font-family: Arial, sans-serif;
        }
        
        /* Hide columns */
        .hidden {
            display: none;
        }
        
     .message1{
         margin-bottom: 15px;
         font-weight: 400;
        font-size: 20px;
        color: black;
     }
     .message2{
        margin-bottom: 80px;
        font-weight: 400;
        font-size: 17px;
        color: black;
     }
     .message3{
         margin-bottom: 5px;
         font-weight: 400;
        font-size: 17px;
        color: black;
     }
     .message4{
         margin-bottom: 5px;
         font-weight: 400;
        font-size: 17px;
       color: black;
     }
     .message5{
         margin-bottom: 5px;
         font-weight: 400;
        font-size: 17px;
        color: black;
     }
/* CSS for modal data */
#nameData {
    font-size: 28px;
    font-weight: 700;
    color: black;

}

#feedbackData {
    font-weight: 400;
    font-size: 22px;
    color: black;
}

#timeData {
    font-weight: 400;
    font-size: 15px; /* Text color for time */
    color: black;
}

#dateData {
    font-weight: 400;
    font-size: 15px; /* Text color for date */
    color: black;
}

#officeData {
    font-weight: 400;
    font-size: 15px; /* Text color for office */
    color: black;
}

 .comment{
    margin-right: 30px;
 }
 .transaction{
    width: 250px;
 }
 .date{
    width: 120px;
 }
 .time{
    width: 90px;
 }
 .name{
 width: 250px;
 }
 .sidebar-link.active {
  padding-left: 35px;
  color: #00ff08;
  transition: all 0.3s ease;
  opacity: 0.5; /* Make active link bold, for example */
  font-weight: bold;
}
label2{
    font-size: 18px;
    font-weight: 800;
}
.navbar-toggler-icon{
    color: black;
}
.bar{
    color: black;
    font-size: 25px;
}
</style>
<body>
	<div class="wrapper">
	 <aside id="sidebar">
	 	<!-- Sidebar Content -->
	 	<div class="h-100">
	 		<div class="sidebar-logo">
	 			<a href="" class="brand">ADMIN</a>
	 		</div>
	 	<ul class="sidebar-nav">
	 	  <li class="sidebar-header">
	 	  	 PAGES
	 	  </li>
	 		<li class="sidebar-item">
  <a href="admindashboard.php" class="sidebar-link <?php echo ($current_page == 'admindashboard.php') ? 'active' : ''; ?>">
    <i class="fa-solid fa-house"></i> Home
  </a>
</li>
<li class="sidebar-item">
  <a href="adminfeedback.php" class="sidebar-link <?php echo ($current_page == 'adminfeedback.php') ? 'active' : ''; ?>">
    <i class="fa-solid fa-comment"></i> Comments
  </a>
</li>
<li class="sidebar-item">
  <a href="adminstatistics.php" class="sidebar-link <?php echo ($current_page == 'adminstatistics.php') ? 'active' : ''; ?>">
    <i class="fa-solid fa-chart-simple"></i> Sentiment Insights
  </a>
</li>
       </li>
    </ul>
 </div>
	 </aside>
	 <div class="main">
	  <nav class="navbar navbar-expand px-3 border-bottom">
	  	<button class="btn" id="sidebar-toggle" type="button">
            <i class="fa-solid fa-bars bar"></i>
       </button>
	   <div class="navbar-collapse navbar">
	   	<ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <button class="btn nav-icon pe-md-0" id="logout-button" style="display: flex; align-items: center;">
                        <i class="fas fa-sign-out-alt" style="font-size: 1.5em;"></i></button>
                </li>
            </ul>
	   </div>
	</nav>
	<main class="content px-3 py-2">
		<div class="container-fluid">
			<div class=" mb-3">
				<h1><b>Comments</b></h1>
			</div>
			<form method="POST" action="">
                    <div class="row">
                        <div class="col-md-6 col-lg-2">
                            <label for="school-year">School Year:</label>
                            <select class="form-control" id="school-year" name="search_value">
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <label for="semester">Semester:</label>
                            <select class="form-control" id="semester" name="semester">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="search">Search</button>
                </form>
         <!-- table Element -->
         <div class="card border-0">
         	<div class="card-body">
           <div class="table-container">
   <?php
     // Get the current year
    $currentYear = date('Y');
    // Assuming the academic year starts in August, determine the current school year
    $startYear = date('m') >= 8 ? $currentYear : $currentYear - 1;
    $endYear = $startYear + 1;
    $schoolYear = "$startYear-$endYear";

    echo "<h2>School Year $schoolYear</h2>";
    ?>

    <table class="table">
        <tbody>
       <?php
// Function to load bad words from a text file
function loadBadWords($filePath) {
    $badWords = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_map('strtolower', $badWords);
}

// Function to censor the message
function censorMessage($message, $badWords) {
    foreach ($badWords as $word) {
        $replacement = censorWord($word);
        $message = str_ireplace($word, $replacement, $message);
    }
    return $message;
}

// Function to censor specific words
function censorWord($word) {
    return str_repeat("*", strlen($word));
}

// Function to truncate comments
function truncateComment($comment, $maxLength = 20) {
    if (strlen($comment) > $maxLength) {
        return substr($comment, 0, $maxLength) . '...';
    }
    return $comment;
}

// Load bad words from the text file
$badWordsFilePath = "words/full-list-of-bad-words_text-file_2022_05_05.txt";
$badWords = loadBadWords($badWordsFilePath);

// Assuming $con is your database connection object
if (isset($con)) {
    $encryptionKey = "5f0f95d0837dc37d81fb25ec0343edd737bc1e82d77f543d9f41e4597c131217";

    if (isset($_POST['search'])) {
        $search_value = mysqli_real_escape_string($con, $_POST['search_value']); // Prevent SQL injection
        $semester = mysqli_real_escape_string($con, $_POST['semester']); // Prevent SQL injection
        $query = "SELECT name, transaction, office, message, iv, date, time FROM adfeed WHERE school_year = '$search_value' AND semester = '$semester'";
        $search_result = mysqli_query($con, $query);

        if (mysqli_num_rows($search_result) > 0) {
            echo "<h3>Search results for School Year $search_value and Semester $semester</h3>";
            echo "<table border='1' id='customers'>
                  <tr>
                      <th>Transaction</th>
                      <th>Name</th>
                      <th>Comments</th>
                      <th>Time</th>
                      <th>Date</th>
                  </tr>";

            while ($row = mysqli_fetch_assoc($search_result)) {
                $name = openssl_decrypt($row['name'], 'aes-256-cbc', $encryptionKey, 0, $row['iv']);
                $censored_message = censorMessage($row['message'], $badWords);
                $truncated_message = truncateComment($censored_message); // Truncate the censored message

                echo "<tr>";
                echo "<td class='transaction'>" . $row['transaction'] . "</td>";
                echo "<td class='name'>" . $name . "</td>";
                echo "<td class='comment' data-full-comment='" . htmlspecialchars($row['message']) . "'>" . $truncated_message . "</td>";
                echo "<td class='hidden'>" . $row['office'] . "</td>";
                echo "<td class='time'>" . $row['time'] . "</td>";
                echo "<td class='date'>" . $row['date'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<h3>No results found for school year $search_value and Semester $semester</h3>";
        }
    } else {
        $result = mysqli_query($con, "SELECT name, transaction, message, iv, date, time, office FROM adfeed ORDER BY date DESC, time DESC");

        echo "<table border='1' id='customers'>
              <tr>
                  <th>Transaction</th>
                  <th>Name</th>
                  <th>Comments</th>
                  <th>Time</th>
                  <th>Date</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            $name = openssl_decrypt($row['name'], 'aes-256-cbc', $encryptionKey, 0, $row['iv']);
            $censored_message = censorMessage($row['message'], $badWords);
            $truncated_message = truncateComment($censored_message); // Truncate the censored message

            echo "<tr>";
            echo "<td class='transaction'>" . $row['transaction'] . "</td>";
            echo "<td class='name'>" . $name . "</td>";
           echo "<td class='comment' data-full-comment='" . htmlspecialchars($row['message']) . "'>" . $truncated_message . "</td>";
            echo "<td class='hidden'>" . $row['office'] . "</td>";
            echo "<td class='time'>" . $row['time'] . "</td>";
            echo "<td class='date'>" . $row['date'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
} else {
    // Handle the case where database connection is not set
}
?>




        </tbody>
    </table>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div id="modal-data"></div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        // JavaScript/jQuery code
       document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];

    // When a row is clicked, show the modal with the row data
    var tableRows = document.querySelectorAll("#customers tr");
    tableRows.forEach(function(row, index) {
        if (index !== 0) { // Skip header row
            row.addEventListener("click", function() {
                var rowData = this.cells[1].innerText; // Get the data from the third cell (Name)
                var modalContent = "<div class='message1'><strong>Name:</strong> <span class='modal-data' id='nameData'>" + rowData + "</span></div>";
                rowData = this.cells[2].innerText; // Get the data from the fourth cell (Comments)
                var fullComment = this.cells[2].getAttribute("data-full-comment"); // Get the full comment from the data attribute
                modalContent += "<div class='message2'><strong>Comments:</strong> <span class='modal-data' id='feedbackData'>" + fullComment + "</span></div>";
                rowData = this.cells[4].innerText; // Get the data from the first cell (Time)
                modalContent += "<div class='message3'><strong>Time:</strong> <span class='modal-data' id='timeData'>" + rowData + "</span></div>";
                rowData = this.cells[0].innerText; // Get the data from the second cell (Transaction)
                modalContent += "<div class='transaction-modal'><strong>Transaction:</strong> <span class='modal-data' id='transactionData'>" + rowData + "</span></div>";
                rowData = this.cells[5].innerText; // Get the data from the first cell (Date)
                modalContent += "<div class='message4'><strong>Date:</strong> <span class='modal-data' id='dateData'>" + rowData + "</span></div>";
                rowData = this.cells[3].innerText; // Get the data from the fifth cell (Office)
                modalContent += "<div class='message5'><strong>Office:</strong> <span class='modal-data' id='officeData'>" + rowData + "</span></div>";

                document.getElementById("modal-data").innerHTML = modalContent;
                modal.style.display = "block"; // Show the modal
            });
        }
    });

    // When the user clicks on the close button, close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});
    </script>

    <script>
        $(document).ready(function() {
            // Function to adjust the width of the fixed header cells to match the content
            function adjustHeaderWidths() {
                $('#table thead th').each(function(index) {
                    var cellWidth = $(this).outerWidth();
                    $('#table th:nth-child(' + (index + 1) + ')').css('width', cellWidth);
                });
            }

            // Call the function on page load and window resize
            adjustHeaderWidths();
            $(window).resize(function() {
                adjustHeaderWidths();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Function to adjust the width of the fixed header cells to match the content
            function adjustHeaderWidths() {
                $('#table thead th').each(function(index) {
                    var cellWidth = $(this).outerWidth();
                    $('#table th:nth-child(' + (index + 1) + ')').css('width', cellWidth);
                });
            }

            // Call the function on page load and window resize
            adjustHeaderWidths();
            $(window).resize(function() {
                adjustHeaderWidths();
            });
        });
    </script>
</div>

     <div id="detailModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModalBtn">&times;</span>
            <div>
                <label class="name-label" for="name"></label>
                <span id="name">John Doe</span>
            </div>
            <br>
            <div>
                <label class="name-label" for="time">Time:</label>
                <span id="time">10:00 AM</span>
            </div>
            <br>
            <div>
                <label  class="name-label" for="office">Office:</label>
                <span id="office">Room 123</span>
            </div>
            <br>
            <div>
                <label class="name-label" for="feedback">Feedback:</label>
                <p id="feedback">This is a sample feedback. Add your feedback content here.</p>
            </div>
        </div>
    </div>
        </div>
         </div>
       </div>
	</main>
	<a href="#" class="theme-toggle">
		<i class="fa-solid fa-moon"></i>
		<i class="fa-solid fa-sun"></i>
	</a>
	<footer class="footer">
		<div class="container-fluid">
			<div class="row text-muted">
				<div class="col-6 text-start">
					<p class="mb-0">
						<a href="#" class="text-muted">
							<label2>Central Philippines State University Hinigaran Campus</label2>
						</a>
					</p>
				</div>
			</div>
		</div>
	</footer>
	 </div>
	</div>
	<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script1.js"></script>
     <script>
        document.getElementById('logout-button').addEventListener('click', function(e) {
            e.preventDefault();
            // Assuming you have a logout endpoint
            window.location.href = '../login.php';
        });
    </script>
</body>


</html>