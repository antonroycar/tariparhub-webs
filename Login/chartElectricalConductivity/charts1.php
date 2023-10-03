<?php
// Include config file
require_once "config.php";

// Initialize arrays to store data for each parameter
$IDSensor1 = array();
$IDSensor2 = array();
$IDSensor3 = array();
$IDSensor4 = array();
$IDSensor5 = array();
$IDSensor6 = array();
$IDSensor7 = array();
$IDSensor8 = array();
$IDSensor9 = array();
$ECDataSensor1 = array();
$ECDataSensor2 = array();
$ECDataSensor3 = array();
$ECDataSensor4 = array();
$ECDataSensor5 = array();
$ECDataSensor6 = array();
$ECDataSensor7 = array();
$ECDataSensor8 = array();
$ECDataSensor9 = array();


// Attempt select query execution
$sqlSensor1 = "SELECT * FROM tb_sensor1";
if ($resultSqlSensor1 = mysqli_query($link, $sqlSensor1)) {
    if (mysqli_num_rows($resultSqlSensor1) > 0) {
        while ($row = mysqli_fetch_assoc($resultSqlSensor1)) {
            // Extract data for each parameter and Date
            $IDSensor1[] = (float)$row['ID'];
            $ECDataSensor1[] = (float)$row['Konduktivitas_Listrik'];
        }
        // Free result set
        mysqli_free_result($resultSqlSensor1);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sqlSensor2 = "SELECT * FROM tb_sensor2";
if ($resultSqlSensor2 = mysqli_query($link, $sqlSensor2)) {
    if (mysqli_num_rows($resultSqlSensor2) > 0) {
        while ($row = mysqli_fetch_assoc($resultSqlSensor2)) {
            // Extract data for each parameter and Date
            $IDSensor2[] = (float)$row['ID'];
            $ECDataSensor2[] = (float)$row['Konduktivitas_Listrik'];
        }
        // Free result set
        mysqli_free_result($resultSqlSensor2);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sqlSensor3 = "SELECT * FROM tb_sensor3";
if ($resultSqlSensor3 = mysqli_query($link, $sqlSensor3)) {
    if (mysqli_num_rows($resultSqlSensor3) > 0) {
        while ($row = mysqli_fetch_assoc($resultSqlSensor3)) {
            // Extract data for each parameter and Date
            $IDSensor3[] = (float)$row['ID'];
            $ECDataSensor3[] = (float)$row['Konduktivitas_Listrik'];
        }
        // Free result set
        mysqli_free_result($resultSqlSensor3);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sqlSensor4 = "SELECT * FROM tb_sensor4";
if ($resultSqlSensor4 = mysqli_query($link, $sqlSensor4)) {
    if (mysqli_num_rows($resultSqlSensor4) > 0) {
        while ($row = mysqli_fetch_assoc($resultSqlSensor4)) {
            // Extract data for each parameter and Date
            $IDSensor4[] = (float)$row['ID'];
            $ECDataSensor4[] = (float)$row['Konduktivitas_Listrik'];
        }
        // Free result set
        mysqli_free_result($resultSqlSensor4);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sqlSensor5 = "SELECT * FROM tb_sensor5";
if ($resultSqlSensor5 = mysqli_query($link, $sqlSensor5)) {
    if (mysqli_num_rows($resultSqlSensor5) > 0) {
        while ($row = mysqli_fetch_assoc($resultSqlSensor5)) {
            // Extract data for each parameter and Date
            $IDSensor5[] = (float)$row['ID'];
            $ECDataSensor5[] = (float)$row['Konduktivitas_Listrik'];
        }
        // Free result set
        mysqli_free_result($resultSqlSensor5);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sqlSensor6 = "SELECT * FROM tb_sensor6";
if ($resultSqlSensor6 = mysqli_query($link, $sqlSensor6)) {
    if (mysqli_num_rows($resultSqlSensor6) > 0) {
        while ($row = mysqli_fetch_assoc($resultSqlSensor6)) {
            // Extract data for each parameter and Date
            $IDSensor6[] = (float)$row['ID'];
            $ECDataSensor6[] = (float)$row['Konduktivitas_Listrik'];
        }
        // Free result set
        mysqli_free_result($resultSqlSensor6);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sqlSensor7 = "SELECT * FROM tb_sensor7";
if ($resultSqlSensor7 = mysqli_query($link, $sqlSensor7)) {
    if (mysqli_num_rows($resultSqlSensor7) > 0) {
        while ($row = mysqli_fetch_assoc($resultSqlSensor7)) {
            // Extract data for each parameter and Date
            $IDSensor7[] = (float)$row['ID'];
            $ECDataSensor7[] = (float)$row['Konduktivitas_Listrik'];
        }
        // Free result set
        mysqli_free_result($resultSqlSensor7);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sqlSensor8 = "SELECT * FROM tb_sensor8";
if ($resultSqlSensor8 = mysqli_query($link, $sqlSensor8)) {
    if (mysqli_num_rows($resultSqlSensor8) > 0) {
        while ($row = mysqli_fetch_assoc($resultSqlSensor8)) {
            // Extract data for each parameter and Date
            $IDSensor8[] = (float)$row['ID'];
            $ECDataSensor8[] = (float)$row['Konduktivitas_Listrik'];
        }
        // Free result set
        mysqli_free_result($resultSqlSensor8);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sqlSensor9 = "SELECT * FROM tb_sensor9";
if ($resultSqlSensor9 = mysqli_query($link, $sqlSensor9)) {
    if (mysqli_num_rows($resultSqlSensor9) > 0) {
        while ($row = mysqli_fetch_assoc($resultSqlSensor9)) {
            // Extract data for each parameter and Date
            $IDSensor9[] = (float)$row['ID'];
            $ECDataSensor9[] = (float)$row['Konduktivitas_Listrik'];
        }
        // Free result set
        mysqli_free_result($resultSqlSensor9);
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}






// Close connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Monthly Average Parameters</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<body>
<div id="container" style="width: 580px; height: 400px;"></div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('container', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: <?php echo json_encode($IDSensor9); ?>,
                    accessibility: {
                        description: 'Dates'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Value'
                    }
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: 'Sensor 1',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: <?php echo json_encode($ECDataSensor1); ?>,
                    accessibility: {
                        description: 'Monthly average Sensor 1 value'
                    }
                }, 
                {
                    name: 'Sensor 2',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: <?php echo json_encode($ECDataSensor2); ?>,
                    accessibility: {
                        description: 'Monthly average Sensor 2 value'
                    }
                }, {
                    name: 'Sensor 3',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: <?php echo json_encode($ECDataSensor3); ?>,
                    accessibility: {
                        description: 'Monthly average Sensor 3 value'
                    }
                }, {
                    name: 'Sensor 4',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: <?php echo json_encode($ECDataSensor4); ?>,
                    accessibility: {
                        description: 'Monthly average Sensor 4 value'
                    }
                }, {
                    name: 'Sensor 5',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: <?php echo json_encode($ECDataSensor5); ?>,
                    accessibility: {
                        description: 'Monthly average Sensor 5 value'
                    }
                }, {
                    name: 'Sensor 6',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: <?php echo json_encode($ECDataSensor6); ?>,
                    accessibility: {
                        description: 'Monthly average Sensor 6 value'
                    }
                }, {
                    name: 'Sensor 7',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: <?php echo json_encode($ECDataSensor7); ?>,
                    accessibility: {
                        description: 'Monthly average Sensor 7 value'
                    }
                }, {
                    name: 'Sensor 8',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: <?php echo json_encode($ECDataSensor8); ?>,
                    accessibility: {
                        description: 'Monthly average Sensor 8 value'
                    }
                }, {
                    name: 'Sensor 9',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: <?php echo json_encode($ECDataSensor9); ?>,
                    accessibility: {
                        description: 'Monthly average Sensor 9 value'
                    }
                }
            ]
            });
        });
    </script>
</body>
</html>
