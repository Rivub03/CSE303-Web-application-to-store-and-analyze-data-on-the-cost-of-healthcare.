<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project 329</title>
    <link rel="icon" href="images/logo.png" sizes="16x16" type="image/png">
    <link rel="icon" href="images/logo.png" sizes="32x32" type="image/png">
    <link rel="apple-touch-icon" href="images/logo.png">
    <link rel="stylesheet" href="dashboard.css">
    <style>
        /* Existing styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            Project 329
        </div>
        <div class="header-center">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="header-right">
            <button id = "managebillbutton"> Manage Bill </button>
            <button id = "addpromo"> Add Promo </button>
            <a href="#" class="logout-btn">Logout</a>
        <nav>
            
        </nav>
        </div>
    </header>
    <main>
        <section class="data-section">
            <div class="form-container">
                <h2>Healthcare Provider</h2>
                <form id="form1" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <input type="hidden" name="form1" value="1">
                    
                    <label for="input1">Hospital Name:</label>
                    <input type="text" id="HName" name="HName">

                    <label for="input2">Hospital ID:</label>
                    <input type="text" id="HID" name="HID">

                    <label for="input3">Hospital Type:</label>
                    <input type="text" id="HType" name="HType">

                    <label for="input4">Hospital Address:</label>
                    <input type="text" id="HAddress" name="HAddress">
                    
                    <label for="input5">Hospital Bill:</label>
                    <input type="number" id="HPrice" name="HPrice">

                    

                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="form-container">
                <h2>Doctor</h2>
                <form id="form2" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <input type="hidden" name="form2" value="1">
                    
                    <label for="input1">Doctor ID:</label>
                    <input type="Number" id="DID" name="DID">

                    <label for="input2">Hospital ID:</label>
                    <input type="Number" id="HID" name="HID">
                   
                    <label for="input3">Doctor Name:</label>
                    <input type="text" id="DName" name="DName">

                    <label for="input4">Doctor Specialization:</label>
                    <input type="text" id="DSpecialization" name="DSpecialization">

                    <label for="input5">Cost of Visit</label>
                    <input type="number" id="DPrice" name="DPrice">
                    <button type="submit">Submit</button>
                </form>
        </section>

    <section>
        
    </section>
    </main>

    <footer>
        <div class="footer-content">
            <p>Project 329</p>
            <p>&copy; 2023 Group 38</p>
        </div>
    </footer>    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logoutButton = document.querySelector('.logout-btn');

            logoutButton.addEventListener('click', function(event) {
                event.preventDefault();
                window.location.href = 'index.html';
            });
        const addpromobutton = document.getElementById("addpromo");
        addpromobutton.addEventListener('click', function() {
            window.location.href = 'hcproviders.html';
            });

        const managebillbutton = document.getElementById("managebillbutton");
        managebillbutton.addEventListener('click', function() {
            window.location.href = 'managebill.html';
            });
        });
    </script>
</body>
</html>


<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST['form1'])) {
            $HName = filter_input(INPUT_POST, "HName", FILTER_SANITIZE_SPECIAL_CHARS);
            $HID = filter_input(INPUT_POST, "HID", FILTER_SANITIZE_SPECIAL_CHARS);
            $HType = filter_input(INPUT_POST, "HType", FILTER_SANITIZE_SPECIAL_CHARS);
            $HAddress = filter_input(INPUT_POST, "HAddress", FILTER_SANITIZE_SPECIAL_CHARS);
            $HPrice = filter_input(INPUT_POST, "HPrice", FILTER_SANITIZE_SPECIAL_CHARS);
            
            /*echo "Name is $HName";
            echo "HID is $HID";
            echo "Type is $HType";
            echo "Address is $HAddress";
            echo "Price is $HPrice";*/

            if(empty($HName)){
                echo"Please enter an Name$HName";
            }
            elseif(empty($HID)){
                echo"Please enter a Cost$HID";
            }
            elseif(empty($HType)){
                echo"Please enter a Cost$HType";
            }
            elseif(empty($HAddress)){
                echo"Please enter a Cost$HAddress";
            }
            elseif(empty($HPrice)){
                echo"Please enter a Price$HPrice";
            }
            else{
                $sql = "INSERT INTO HealthcareProvider (ID, Name, Address, Type, Price)
                        VALUES ('$HID','$HName', '$HAddress', '$HType', '$HPrice')";
                
                try{
                    mysqli_query($connection, $sql);
                    echo"Item is Registered!";  
                }
                catch(mysqli_sql_exception){
                    echo"Form 1 Could not be entered into database :((";
                }
            }
        }
        if (isset($_POST['form2'])) {
            
            $DID = filter_input(INPUT_POST, "DID", FILTER_SANITIZE_SPECIAL_CHARS);
            $HID = filter_input(INPUT_POST, "HID", FILTER_SANITIZE_SPECIAL_CHARS);
            $DName = filter_input(INPUT_POST, "DName", FILTER_SANITIZE_SPECIAL_CHARS);
            $DSpecialization = filter_input(INPUT_POST, "DSpecialization", FILTER_SANITIZE_SPECIAL_CHARS);
            $DPrice = filter_input(INPUT_POST, "DPrice", FILTER_SANITIZE_SPECIAL_CHARS);
            
            /*echo "Name is $HName";
            echo "HID is $HID";
            echo "Type is $HType";
            echo "Address is $HAddress";
            echo "Price is $HPrice";*/

            if(empty($DID)){
                echo"Please enter a Doctor ID$DID";
            }
            elseif(empty($HID)){
                echo"Please enter a Hospital ID$HID";
            }
            elseif(empty($DName)){
                echo"Please enter a Name$DName";
            }
            elseif(empty($DSpecialization)){
                echo"Please enter a Specialization $DSpecialization";
            }
            elseif(empty($DPrice)){
                echo"Please enter a Price$DPrice";
            }
            else{
                $sql = "INSERT INTO Doctor (DID, HID, Name, Specialization, Price)
                        VALUES ('$DID','$HID', '$DName', '$DSpecialization', '$DPrice')";
                
                try{
                    mysqli_query($connection, $sql);
                    echo"Item is Registered!";  
                }
                catch(mysqli_sql_exception){
                    echo"Form 2 Could not be entered into database :((";
                }
            }

        }
    }



    mysqli_close($connection);
?>

