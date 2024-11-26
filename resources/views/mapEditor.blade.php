<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
        for ($i=0; $i < 10; $i++) { 
            echo "<div class='row'>";
            for ($j=0; $j < 10; $j++) { 
                for ($j=0; $j < 10; $j++) { 
                    if ($map->where("coord_x", $i)->where("coord_y", $j)->count() == 1) {
                        echo "<div class='col-1' style='height: 50px; width: 50px; background-color: red;'>
                            <a href='".route('delete', ['coord_x' => $i, 'coord_y' => $j])."'>Delete</a>
                            </div>";
                    }
                    else if ($map->where("coord_x", $i+1)->where("coord_y", $j)->count() == 1
                    || $map->where("coord_x", $i-1)->where("coord_y", $j)->count() == 1
                    || $map->where("coord_x", $i)->where("coord_y", $j+1)->count() == 1
                    || $map->where("coord_x", $i)->where("coord_y", $j-1)->count() == 1
                    ) {
                        echo "<div class='col-1' style='height: 50px; width: 50px; background-color: green;'>
                            <a href='".route('create', ['coord_x' => $i, 'coord_y' => $j])."'>Create</a>
                            </div>";
                    }
                    else {
                        echo "<div class='col-1' style='height: 50px; width: 50px; background-color: blue;'></div>";
                    }
                }
            }
            echo "</div>";
        }
    ?>
</body>
</html>
