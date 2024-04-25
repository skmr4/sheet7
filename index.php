<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sheet7</title>
    <style>
        table{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h3>Recorder Added</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Fname</th>
            <th>Lname</th>
            <th>Course</th>
            <th>Grade</th>
        </tr>
        <?php
        require_once 'conn.php';
        try{
            $sql = "SELECT s.id, s.fname, s.lname, c.cour_code, c.mark FROM student s, student_course c";
            // $stmt = bindParam(':fname', $fname);
            // $stmt->execute();
            $stmt = $con->prepare($sql);
            $stds = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($stds as $s){
                    echo '<tr><td>'. $s['s.id'];
                    echo '</td><td>' . $s['s.fname'] . '</td>';
                    echo '</td><td>' . $s['s.lname'] . '</td>';
                    echo '</td><td>' . $s['c.cour_code'] . '</td>';
                    echo '</td><td>' . $s['c.mark'] . '</td>';
                    echo '</td><td>' . "<a href='degree.php? id = $s[std_id] && course = $s[cour_code]>Grade</a>" . '</td></tr>';   
                }
            }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        echo "<a href=addstudent.php>RegisterNewStudent "."<br>";
        echo "<a href=studentmark.php>Search "."<br>";
        ?>
    </table>
</body>
</html>