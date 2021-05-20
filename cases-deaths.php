<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id = "form">
        <form action="" method="POST">
            <label for = "country">Επέλεξε χώρα</label>
            <select name= "select-country">
                <option value=""> --Χώρα-- </option>
                <option value="Austria" > Αυστρία </option>
                <option value="Belgium" > Βέλγιο </option>
                <option value="Bulgaria"> Βουλγαρία </option>
                <option value="Croatia"> Κροατία </option>
                <option value="Cyprus"> Κύπρος </option>
                <option value="Czechia"> Τσεχία </option>
                <option value="Denmark"> Δανία </option>
                <option value="Estonia"> Εσθονία </option>
                <option value="Finland"> Φινλανδία </option>
                <option value="France"> Γαλλία </option>
                <option value="Germany"> Γερμανία </option>
                <option value="Greece"> Ελλάδα </option>
                <option value="Hungary"> Ουγγαρία </option>
                <option value="Ireland"> Ιρλανδία </option>
                <option value="Italy"> Ιταλία </option>
                <option value="Latvia"> Λετονία </option>
                <option value="Lithuania"> Λιθουανία </option>
                <option value="Luxembourg"> Λουξεμβούργο </option>
                <option value="Malta"> Μάλτα </option>
                <option value="Netherlands"> Ολλανδία </option>
                <option value="Portugal"> Πορτογαλία </option>
                <option value="Romania"> Ρουμανία </option>
                <option value="Slovakia"> Σλοβακία </option>
                <option value="Slovenia"> Σλοβενία </option>
                <option value="Spain"> Ισπανία </option>
                <option value="Sweden"> Σουηδία </option>
            </select>
        </form>
    </div>
    <table>
        
            <?php
                include 'connect.php';

                //database connection code
                $conn = OpenCon();

                // Check connection
                if($conn -> connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // get the post records
                $txtCountry = $_POST['select-country'];

                //Select query
                $sql = "select tab.indicator, tab.weekly_count, tab2.tests_done from tab join tab2 on tab.country=tab2.country where tab.country = $txtCountry";
                
                $result = $conn-> query($sql);


                if($result-> num_rows > 0){
                    while ($row = $result-> fetch_assoc()){
            ?>
                    <tr>
                        <td><?php echo $row["indicator"];?></tb> 
                        <td><?php echo $row["weekly_count"];?></tb>
                        <td><?php echo $row["tests_done"]; ?></tb> 
                    </tr>
                        
            <?php
                    }
                }

                CloseCon($conn);
            ?>
        
    </table>
</body>
</html>





