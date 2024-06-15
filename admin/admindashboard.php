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
	<title>Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
     <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/style23.css">
    </head>
    <style>
        table {
            width: 100%;
            

        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            color:#11ff00;
            transition: all 0.2s ease;
            opacity: 0.5;
            cursor: pointer;

        }

        th {
            
            background-color: #11ff00;
            animation: gradient 15s ease infinite;
            color: black;
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
        width: 20px;
      }
      .name {
        width: 230px;
      }
      .transaction{
        width: 190px;
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


  
}
a.theme-toggle{
    background-color: transparent;
    position: absolute;
    top: 15%;
    right: 0;
}
.card-container{
    width: 60%;
}

.head{
    width: 100%;
}
.see-more-button {
   position: absolute;
    top: 93%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: transparent; /* Gray */
    opacity: 0.8;
    backdrop-filter: blur(10px);
    border: none;
    text-decoration: none;
    display: inline-block;
    padding: 5px 10px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 20px;
    border: 1px solid #11ff00;
}
.see-more-button:hover{
   box-shadow: ;
        box-shadow: 0 0 5px rgba(17, 255, 0, 0.2);
         transition: all 0.1s ease;
    color: #11ff00;
     transition: all 0.3s ease;
}
.container-transition{
    color: black;
}
.bar{
    color: black;
      font-size: 25px;
}
.card-title1{
    font-weight: 800;
    font-size: 15px;
    color: #15ff00;

}
.card-title2{
    font-weight: 800;
    font-size: 15px;
    color: #ff1c1c;

}
.card-title3{
    font-weight: 800;
    font-size: 15px;
    color: #0059ff;

}

.col-lg-2{
    width: 12%;
    
}
.card-body1 p{
    font-size: 45px;
 text-align: center;
 color: #11ff00;
}
.card-body2 p{
    font-size: 45px;
 text-align: center;
 color: #ff0000;
}
.card-body3 p{
    font-size: 45px;
 text-align: center;
 color: #ffff00;
}
.me{
    position: absolute;
    top: 63%;
    left: 68.5%;
    width: 26.5%;
    height: 18%;
}
.card-body1{
    width: 270px;
    height: 280px;
}
.br{
    width: 320px;
    height: 330px;
}
.sidebar-link.active {
  padding-left: 35px;
  color: #00ff08;
  transition: all 0.3s ease;
  opacity: 0.5; /* Make active link bold, for example */
  font-weight: bold;
}

#customers {
        width: 100%;
        border-collapse: collapse;
    }

    .transaction {
        width: 20%; /* Adjust as needed */
    }

    .name {
        width: 20%; /* Adjust as needed */
    }

    .comment {
        width: 17%; /* Adjust as needed */
    }

    .time {
        width: 15%; /* Adjust as needed */
    }

    .date {
        width: 10%; /* Adjust as needed */
    }

    .new-feedback {
        font-weight: bold;
        
    }
    label2{
    font-size: 18px;
    font-weight: 800;
}
.log{
    color: black;
    font-size: 25px;
}
.card-title7{
    font-weight: 800;
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
	 	  	PAGES</li>
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
                        <i class="fas fa-sign-out-alt log"></i>
                    </button>
                </li>
            </ul>
	   </div>
	</nav>

	<main class="content px-3 py-2">
		<div class="container-fluid">
			<div class="row">
			<div class="col-12 col-md-6 d-flex">
    <div class="card flex-fill border-0 illustration">
        <div class="card-body p-0 d-flex flex-fill">
            <div class="row g-0 w-100">
                <div class="col-6">
                    <div class="p-3 m-1 container-transition" id="textContainer">
                        <h4>Welcome Back, Admin</h4>
                        <p class="mb-0">ADMIN Dashboard, Hello</p>
                    </div>
                    <div class="p-3 m-1 container-transition" id="buttonContainer" style="display:none;">
                        <button class="btn btn-primary">Profile <i class="fa-regular fa-user fa-bounce"></i></button>
                        <br>
                        <button class="btn btn-warning">Settings <i class="fa-solid fa-gear fa-spin"></i></button>
                        <br>
                        <button class="btn btn-danger">Log Out <i class="fa-solid fa-arrow-right-from-bracket fa-shake"></i></button>
                    </div>
                </div>
                <div class="col-6 align-self-end text-end">
                    <a href="#" id="imageLink">
                        <img src="img/meoww.webp" class="img-fluid illustration-img" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
   </div>
   <script>
     document.getElementById('imageLink').addEventListener('click', function () {
        var textContainer = document.getElementById('textContainer');
        var buttonContainer = document.getElementById('buttonContainer');

        // Toggle the visibility of text and buttons with a smooth transition effect
        if (textContainer.style.opacity === '0') {
            textContainer.style.display = 'block';
            buttonContainer.style.display = 'none';
            textContainer.style.opacity = '1';
        } else {
            textContainer.style.opacity = '0';
            buttonContainer.style.display = 'block';
            textContainer.style.display = 'none';
        }
    });
</script>
         <!-- table Element -->
        <div class="row">
    <div class="card-container">
        <div class="card border-0">
            <div class="card-header">
                <h2 class="card-title7">
                    COMMENTS
                </h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                     <?php

// Include the new censoring functions
function loadBadWords($filePath) {
    $badWords = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_map('strtolower', $badWords);
}

// Function to censor the message
function censorMessage($message, $badWords) {
    // Replace censored words with asterisks
    foreach ($badWords as $word) {
        $replacement = censorWord($word);
        $message = str_ireplace($word, $replacement, $message);
    }
    return $message;
}

// Function to censor specific words
function censorWord($word) {
    // Custom replacements for specific words
    return str_repeat("*", strlen($word));
}

// Function to truncate comments
function truncateComment($comment, $maxLength = 5) {
    if (strlen($comment) > $maxLength) {
        return substr($comment, 0, $maxLength) . '...';
    }
    return $comment;
}

// Load bad words from the text file
$badWordsFilePath = "words/full-list-of-bad-words_text-file_2022_05_05.txt"; // Replace with the actual path to your bad words file
$badWords = loadBadWords($badWordsFilePath);

// Existing code...
// Removed the conditional block checking for login
$encryptionKey = "5f0f95d0837dc37d81fb25ec0343edd737bc1e82d77f543d9f41e4597c131217";

if (isset($_POST['search'])) {
    // ... (existing code)
} else {
    $rowsToShowInitially = 2;
    $rowCount = 0;
    $totalRows = 0;

    $result = mysqli_query($con, "SELECT name, transaction, message, date, time, iv FROM adfeed ORDER BY date DESC, time DESC");

    echo "<table border='1' id='customers'>
            <tr>
                <th>Transaction</th>
                <th>Name</th>
                <th>Feedback</th>
                <th>Time</th>
                <th>Date</th>
            </tr>";

    while ($row = mysqli_fetch_array($result)) {
        $decryptedName = openssl_decrypt($row['name'], 'aes-256-cbc', $encryptionKey, 0, $row['iv']);
        $decryptedMessage = $row['message'];

        $Time = $row['time'];
        $Date = $row['date'];
        $transaction = $row['transaction'];

        $timeDifference = time() - strtotime($Date . ' ' . $Time);
        $highlightClass = ($timeDifference <= 86400) ? 'new-feedback' : '';

        $censoredMessage = censorMessage($decryptedMessage, $badWords);
        $truncatedMessage = truncateComment($censoredMessage);
        $truncatedMessage1 = truncateComment($transaction);
        $truncatedMessage2 = truncateComment($Date);

        $totalRows++; 

        echo "<tr>";
        echo "<td class='transaction $highlightClass clickable-cell'>" . $truncatedMessage1 . "</td>";
        echo "<td class='name $highlightClass clickable-cell'>" . $decryptedName . "</td>";
        echo "<td class='comment $highlightClass clickable-cell'>" . $truncatedMessage . "</td>";
        echo "<td class='time $highlightClass clickable-cell'>" . $Time . "</td>";
        echo "<td class='date $highlightClass clickable-cell'>" . $truncatedMessage2 . "</td>";
        echo "</tr>";
        $rowCount++;

        if ($rowCount >= $rowsToShowInitially) {
            echo "<tr class='last-row'>";
            echo "<td colspan='2'></td>"; 
            echo "<td class='relative-position'>...</td>"; 
            echo "</tr>";
            echo "</table>";
            echo "<a href='adminfeedback.php'><button class='see-more-button'>See More</button></a>";
            break;
        }
    }
}
?>





<script>
  document.addEventListener('DOMContentLoaded', function() {
    const cells = document.querySelectorAll('.clickable-cell');

    cells.forEach(cell => {
        cell.addEventListener('click', function() {
            window.location.href = 'adminfeedback.php'; // Change 'admindashboard.php' to your desired page
        });
    });
});
</script>
   </tbody>
     </table>
        </div>
           </div>
              </div>

    <div class="col-md-4">
        <div class="card border-0 br">
            <div class="card-header">
                <h4 class="card-title7">
                    Sentiment Count
                </h4>
            </div>
            <div class="card-body1">
                <canvas id="myBarChart" width="150" height="150"></canvas>
            </div>
        </div>
    </div>
</div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/chart.min.js"></script>
   <script>
    function fetchAndUpdateBarData() {
            fetch('admin_sentiment_data_counts.json') // Fetch data for the chart
                .then(response => response.json())
                .then(data => {
                    // Calculate maximum value for y-axis
                    var maxCount = Math.max(data.sentiment.positive, data.sentiment.negative, data.sentiment.neutral);
                    var buffer = 5; // Adjust this buffer value as needed
                    var maxY = Math.ceil((maxCount + buffer) / 5) * 5;

                    var options = {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: maxY // Set the maximum value of the y-axis dynamically
                            }
                        }
                    };

                    // Update chart data and options
                    myChart.data.datasets[0].data = [data.sentiment.positive, data.sentiment.negative, data.sentiment.neutral];
                    myChart.options = options;
                    myChart.update();
                })
                .catch(error => console.error('Error fetching bar data:', error));
        }

        // Initial call to fetch data and create the chart
        var myChart = new Chart(document.getElementById('myBarChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ["Positive", "Negative", "Neutral"],
                datasets: [{
                    label: 'Sentiment Analysis',
                    data: [0, 0, 0], // Initial data
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', // Positive
                        'rgba(255, 99, 132, 0.2)', // Negative
                        'rgba(255, 206, 86, 0.2)' // Neutral
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1,
                    barPercentage: 0.4
                }]
            },
            options: {}
        });

        // Polling to update the chart every 5 seconds
        setInterval(fetchAndUpdateBarData, 5000);
        // Initial call to fetch data and update the chart
        fetchAndUpdateBarData();
</script>




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