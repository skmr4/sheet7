<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade</title>
</head>
<body>
    <h3>Grading a Student With ID 
        <?php?>
        IN The Course 
        <?php ?>
    </h3>
    <form>
        <label for="mark">Mark:</label>
        <input type="number" name="mark">
        <br>
        <input type="submit">
        <br>
        <a href="index.php">Cancel</a>
    </form>
    <?php
    if(isset($_POST['mark'])){
        $sql = "UPDATE student_course SET mark = :m WHERE std_id = :id AND cour_code = :cc";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
            ':m' => $_POST['mark'],
            ':id' => $_POST['std_id'],
            ':cc' => $_POST['cour_code']
        ));
    }
    ?>
</body>
</html>