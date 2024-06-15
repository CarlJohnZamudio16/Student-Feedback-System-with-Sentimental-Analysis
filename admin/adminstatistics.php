<?php
$current_page = basename($_SERVER['PHP_SELF']); // Get the current page filename
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sentiment Insights</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style2.css">
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
            background: linear-gradient(-45deg, #1aff00, #feff00, #45ff00, #f9ff00);
        }

        th {
            background: linear-gradient(-45deg, #1aff00, #feff00, #45ff00, #f9ff00);
            background-size: 400% 400%;
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
            width: 250px;
        }

        .navbar {
            background: linear-gradient(-45deg, #1aff00, #feff00, #45ff00, #f9ff00);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            color: black;
        }

        li.text-muted {
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

        a.sidebar-link:hover{
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
        .name-label {
            margin-top: -10px;
            font-weight: bold;
        }
        .main {
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
        a.theme-toggle {
            background-color: transparent;
            position: absolute;
            top: 15%;
            right: 0;
        }
       
        
         /* Add glow effect to bar chart */
         .card-body1{
            width: 360px;
         }
         .card-body2{
            width: 320px;
         }
         .br{
            width: 360px;
         }
         .pi{
            width: 320px;
         }
         /* Style the container */
/* Dropdown styling */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Style the select elements */
.dropdown select {
  width: 136px; /* Adjust width as needed */
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 18px;
  cursor: pointer;
  appearance: auto; /* Remove default arrow icon */
}

/* Style the print button */
#printButton {
  border: none; /* Remove button border */
  background-color: transparent; /* Remove button background color */
  cursor: pointer;

}

/* Optional: Add hover effect */
#printButton:hover {
  /* Add styles for button hover state */
}

#printButton i {
  font-size: 28px; /* Adjust font size to increase or decrease icon size */
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
.bar{
 color: black;
 font-size: 25px;  
}
.log{
    color: black;
    font-size: 25px;
}
</style>

</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
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
                </ul>
            </div> <!-- Sidebar Content -->
            <!-- Your Sidebar Content Here -->
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
        <div class="mb-3">
            <h1><b>Sentiment Insights</b></h1>
        </div>
        <form method="POST" action="">
            <!-- Your Form Content Here -->
        </form>
        <div class="row">
            <div class="col-md-6">
                <div class="card border-0 br">
                    <div class="card-header">
                <h4 class="card-title7">
                    Sentiment Counts
                </h4>
                  </div>
                    <div class="card-body1">
                        <canvas id="myBarChart" width="150" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 pi">
                    <div class="card-header">
                <h6 class="card-title7">
                    Yearly Sentiment Percentage
                </h6>
                  </div>
                    <div class="card-body2">
                        <canvas id="myPieChart" width="150" height="150"></canvas>
                    </div>
                    <div class="dropdown">
                 <select id="year" class="year-dropdown">
            <!-- Populate options dynamically using JavaScript -->
                 </select>
                 <select id="semester">
            <!-- Populate options dynamically using JavaScript -->
                 </select>
                  <button id="printButton"><i class="fa-solid fa-print"></i></button>
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
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script1.js"></script>
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

        // Polling to update the chart every 30 seconds
        setInterval(fetchAndUpdateBarData, 30000);
        // Initial call to fetch data and update the chart
        fetchAndUpdateBarData();
</script>

<script>
    $(document).ready(function(){
        // Function to update chart based on selected year and semester
        function updateChart(year, semester) {
            // Fetch sentiment data from JSON file
            $.getJSON('admin_sentiment_data_yearly.json', function(data) {
                // Filter data for selected year and semester
                var filteredData = data.filter(function(item) {
                    return item.school_year == year && item.semester == semester;
                });

                if (filteredData.length > 0) {
                    var totalSentiments = filteredData.reduce((acc, curr) => {
                        return acc + Object.values(curr.sentiment).reduce((a, b) => a + b, 0);
                    }, 0);

                    // Update chart data
                    var sentiment = filteredData[0].sentiment;
                    var percentages = Object.keys(sentiment).map(key => (sentiment[key] / totalSentiments * 100).toFixed(2));

                    myPieChart.data.labels = Object.keys(sentiment);
                    myPieChart.data.datasets[0].data = percentages;
                    myPieChart.options.title.text = 'Sentiment Analysis Result of Year ' + year + ' Semester ' + semester; // Update chart title
                    myPieChart.update();
                } else {
                    // Handle case when no data is found for selected year and semester
                    alert("No data found for the selected year and semester.");
                }
            });
        }

        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [],
                datasets: [{
                    data: [],
                    backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56']
                }] 
            },
            options: {
                plugins: {
                    datalabels: {
                        // Configuration options for Chart.js datalabels plugin
                    }
                },
                title: {
                    display: true,
                    text: '', // Title will be updated dynamically
                    fontSize: 18
                }
                // Other chart options...
            }
        });

        // Populate year and semester dropdowns
        $.getJSON('admin_sentiment_data_yearly.json', function(data) {
            var years = [];
            var semesters = [];

            data.forEach(function(item) {
                if (!years.includes(item.school_year)) {
                    years.push(item.school_year);
                }
                if (!semesters.includes(item.semester)) {
                    semesters.push(item.semester);
                }
            });

            years.forEach(function(year) {
                $('#year').append($('<option>', {
                    value: year,
                    text: year
                }));
            });

            semesters.forEach(function(semester) {
                $('#semester').append($('<option>', {
                    value: semester,
                    text: "Semester " + semester
                }));
            });

            // Trigger initial chart update with default values
            updateChart($('#year').val(), $('#semester').val());
        });

        // Event listener for dropdown change
        $('#year, #semester').change(function(){
            var selectedYear = $('#year').val();
            var selectedSemester = $('#semester').val();
            updateChart(selectedYear, selectedSemester);
        });

        // Event listener for print button
        $('#printButton').click(function() {
            printChartData();
        });

        // Function to print chart data
        function printChartData() {
            // Fetch sentiment data from JSON file
            $.getJSON('admin_sentiment_data_yearly.json', function(data) {
                // Prepare the data for printing
                var printWindow = window.open('', '_blank', 'width=800,height=600');
                var officeName = 'Administrator Office'; // Name of the office
                var title = 'Sentiment Analysis Results';

                printWindow.document.write('<html><head><title>' + title + '</title>');
                printWindow.document.write('<style>body { font-family: Arial, sans-serif; }</style>');
                printWindow.document.write('</head><body>');
                printWindow.document.write('<h1>' + officeName + '</h1>'); // Add office name
                printWindow.document.write('<h2>' + title + '</h2>');

                // Group data by year and semester
                var groupedData = {};
                data.forEach(function(item) {
                    if (!groupedData[item.school_year]) {
                        groupedData[item.school_year] = {};
                    }
                    groupedData[item.school_year][item.semester] = item.sentiment;
                });

                // Iterate through grouped data and print results
                for (var year in groupedData) {
                    if (groupedData.hasOwnProperty(year)) {
                        printWindow.document.write('<h3>Year ' + year + '</h3>');
                        for (var semester in groupedData[year]) {
                            if (groupedData[year].hasOwnProperty(semester)) {
                                var sentiment = groupedData[year][semester];
                                var totalSentiments = Object.values(sentiment).reduce((a, b) => a + b, 0);
                                var percentages = Object.keys(sentiment).map(key => (sentiment[key] / totalSentiments * 100).toFixed(2));

                                printWindow.document.write('<h4>Semester ' + semester + '</h4>');
                                printWindow.document.write('<ul>');
                                Object.keys(sentiment).forEach(function(key, index) {
                                    var sentimentCount = sentiment[key].toFixed(2);
                                    printWindow.document.write('<li>' + key + ': ' + sentimentCount + ' (' + percentages[index] + '%)</li>');
                                });
                                printWindow.document.write('</ul>');
                            }
                        }
                    }
                }

                printWindow.document.write('</body></html>');
                printWindow.document.close();

                // Wait for the content to load and then print
                printWindow.onload = function() {
                    printWindow.print();
                    printWindow.close();
                };
            });
        }

    });
</script>
 <script>
        document.getElementById('logout-button').addEventListener('click', function(e) {
            e.preventDefault();
            // Assuming you have a logout endpoint
            window.location.href = '../login.php';
        });
    </script>

</body>

</html>
