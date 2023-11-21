<html>
    <head>
        <title>Evaluable 1 Docker</title>
        
    </head>
    <body>
        
            <?php
                echo "<h1>Examen Docker</h1>";

                $conn = mysqli_connect('db', 'root', 'root', "midb");
                $query = 'SELECT * FROM persona';
                $result = mysqli_query($conn, $query);

                echo '<table class="table table-striped">';
                echo 'ID NOMBRE';
                while($value = $result->fetch_array(MYSQLI_ASSOC)){
                    echo '<tr>';
                    foreach($value as $element){
                        echo '<td>' . $element . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';

                $result->close();
                mysqli_close($conn);
            ?>
        
    </body>
</html>