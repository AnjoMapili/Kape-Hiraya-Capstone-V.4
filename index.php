<div class="grid-container">
<?php
include "templates/header.php";
include "templates/sidebar.php";
?>
<!-- Main -->

    
      <main class="main-container">
      <?php
      include "templates/dropdownlist.php";
      ?>
      
        <div class="main-title">
            <h4>DASHBOARD</h4>
        </div>
        
        <div class="main-cards">

            <div class="card">
                <div class="card-inner">
                    <h3>TRANSACTIONS</h3>
                    <span class="material-icons-outlined"> point_of_sale </span>
                </div>
                     <h1 class="transaction-count">249</h1>
                     <a class="small text-white stretched-link" href="Transaction.php">View Details</a> 
            </div>

            <div class="card">
                <div class="card-inner">
                    <h3>PRODUCTS</h3>
                    <span class="material-icons-outlined"> inventory_2 </span>
                </div>
                     <h1>120</h1>
            </div>

            <div class="card">
                <div class="card-inner">
                    <h3>CUSTOMERS</h3>
                    <span class="material-icons-outlined"> groups </span>
                </div>
                     <h1>100</h1>
            </div>

            <div class="card">
                <div class="card-inner">
                    <h3>MONTHLY SALES</h3>
                    <span class="material-icons-outlined"> receipt_long </span>
                </div>
                     <h1>50</h1>
            </div>
            <div class="card">
                <div class="card-inner">
                    <h3>SALES REPORT</h3>
                    <span class="material-icons-outlined"> receipt</span>
                </div>
                     <h1>50</h1>
            </div>
          
    
        </div>

        <!-- Charts -->
        <div class="charts">

            <div class="charts-card">
                <h2 class="chart-title">Monthly Sales Report</h2>
                <div id="area-chart"></div>
            </div>

            <div class="charts-card">
                <h2 class="chart-title">Top 5 Products</h2>
                <div id="bar-chart"></div>
            </div>
           
         
        </div>
        <!-- End Charts -->
      </main>
      <!-- End Main -->
    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.36.0/apexcharts.min.js" ></script>
    <!-- Custom JS -->
    <script src="JS/script.js"></script>
    <script src="JS/dashboard.js"></script>

