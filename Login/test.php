<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM sensor1";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Nitrogen</th>";
                                        echo "<th>Phosporus</th>";
                                        echo "<th>Kalium</th>";
                                        echo "<th>pH</th>";
                                        echo "<th>Temperatur</th>";
                                        echo "<th>Electrical Conductivity</th>";
                                        echo "<th>Humidity</th>";
                                        echo "<th>Date</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['ID_NAME'] . "</td>";
                                        echo "<td>" . $row['Nitrogen'] . "</td>";
                                        echo "<td>" . $row['Phosphorus'] . "</td>";
                                        echo "<td>" . $row['Kalium'] . "</td>";
                                        echo "<td>" . $row['pH'] . "</td>";
                                        echo "<td>" . $row['Temperature'] . "</td>";
                                        echo "<td>" . $row['Electrical_Conductivity'] . "</td>";
                                        echo "<td>" . $row['Humidity'] . "</td>";
                                        echo "<td>" . $row['Date'] . "</td>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>