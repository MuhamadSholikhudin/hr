<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
         var_dump($employee);
         echo "<br>";
         var_dump($jobs);
         echo "<br>";
         var_dump($dateresign);
         echo $dateresign['status_employee'];
         echo "<br>";
         print("<pre>".print_r($buildings,true)."</pre>");
         print("<pre>".print_r($dateresign,true)."</pre>");
    ?>


    <br>
    <select name="" id="">
    <?php 
        foreach($jobs as $job){ ?>
            <option value="<?= $job['job_level'] ?>"><?= $job['job_level'] ?></option>
        <?php
        }
        ?>
    </select>
    <select name="" id="">
    <?php 
        foreach($departments as $department){ ?>
            <option value="<?= $department['department'] ?>"><?= $department['department'] ?></option>
        <?php
        }
        ?>
    </select>
    <select name="" id="">
        <?php 
            foreach($buildings as $building){ ?>
                <option value="<?= $building ?>"><?= $building ?></option>
            <?php
            }
            ?>
    </select>
</body>
</html>