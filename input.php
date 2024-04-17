<?php 
    include("database.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $hospital_type = $_POST["hospital_type"];
            $speciality = $_POST["speciality"];
            $location = $_POST["location"];
            $rating = $_POST["rating"];
            $price = $_POST["price"];
        }
    
    try{
        $query = " SELECT * FROM `healthcareprovider` WHERE `ID` IS NOT NULL AND `Type` = '$hospital_type' 
        AND `Address` LIKE '%$location%' AND `Price` <= '$price' ";
        $result = mysqli_query($connection, $query);
        $query1 = " SELECT * FROM `doctor` WHERE `Specialization` LIKE '%$speciality%' AND `Price` <= '$price'";
        $result1 = mysqli_query($connection, $query1);
        
        /*$query2 = "SELECT * FROM `healthcareprovider` WHERE `ID` IS NOT NULL AND `Address` LIKE '%$location%' ";
        $result2 =  mysqli_query($connection, $query2);
        $query3 = "SELECT * FROM `healthcareprovider` WHERE `ID` IS NOT NULL AND `Price` <= '$price'";
        $result3 = mysqli_query($connection, $query3);
        $query4 = "SELECT * FROM `doctor` WHERE `DID` IS NOT NULL AND `HID` IS NOT NULL AND `Price` <= '$price'";
        $result3 = mysqli_query($connection, $query4);
        */
    }
    catch (mysqli_sql_exception){
        debug_print_backtrace();
    }
    mysqli_close($connection);

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Project 329</title>
    <link rel="icon" href="images/logo.png" sizes="16x16" type="image/png" />
    <link rel="icon" href="images/logo.png" sizes="32x32" type="image/png" />
    <link rel="apple-touch-icon" href="images/logo.png" />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,500,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="cost.css" />
  </head>
  <body>
    <header>
      <div class="logo">Project 329</div>
      <nav>
        <ul>
            <li><a href="Cost.php">Back</a></li>
            <li><a href="index.html">Home</a></li>
        </ul>
      </nav>
    </header>

    <section>
        
      <h1 class="desire">Best Matches</h1>

      <!-- New table section -->
      <div class="table-container" style="padding: 20px">
        <table class="data-table">
          <thead>
            <tr>
              <th>Hospital ID</th>
              <th>Hospital Name</th>
              <th>Hospital Address</th>
              <th>Hospital Type</th>
              <th>Hospital Price</th>
              <th>Get Appointment</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            
            try{                        
                while($row=mysqli_fetch_assoc($result)){
                    $HID = $row['ID'];
                    $HName = $row['Name'];
                    $HAddress = $row['Address'];
                    $HType = $row['Type'];
                    $HPrice = $row['Price'];
                
            
            ?>
            <tr>
                <td><?php echo $HID ?></td>
                <td><?php echo $HName ?></td>
                <td><?php echo $HAddress?></td>
                <td><?php echo $HType ?></td>
                <td><?php echo $HPrice ?></td>
              <td>
                <button class="submitbutton" onclick="openForm()">
                  Click Here
                </button>
              </td>
            </tr>
            <?php 
                }
            }
            catch (mysqli_sql_exception){
                debug_print_backtrace();
            }
                    ?>
            <tr>
                <th>Doctor ID</th>
                <th>Hospital ID</th>
                <th>Doctor Name</th>
                <th>Doctor Specialization </th>
                <th>Cost of Visit </th>
            </tr>
            <?php 
                while($row1=mysqli_fetch_assoc($result1)){
                    $DID = $row1['DID'];
                    $HID = $row1['HID'];
                    $DName = $row1['Name'];
                    $DSpecialization = $row1['Specialization'];
                    $DPrice = $row1['Price'];
                ?>        
            <tr>
                <td><?php echo $DID ?></td>
                <td><?php echo $HID ?></td>
                <td><?php echo $DName?></td>
                <td><?php echo $DSpecialization ?></td>
                <td><?php echo $DPrice ?></td>
            </tr>
            <?php 
                }  
            ?>      
          </tbody>
        </table>
      </div>
    </section>
    <section>
      <h1 class="desire">Running Offers!</h1>
      <div class="doctorcontainer">
        <div class="demo-card-v14-grid">
          <a class="card-v14" href="#0">
            <h4>40% off at Square Hospital</h4>

            <p class="card-v14__description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente
              dolorem officia consequatur inventore omnis.
            </p>

            <p class="card-v14__link">Explore →</p>
          </a>

          <a class="card-v14" href="#0">
            <h4>20% off!</h4>

            <p class="card-v14__description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            </p>

            <p class="card-v14__link">Explore →</p>
          </a>

          <a class="card-v14" href="#0">
            <h4>Free Dental Checkup!</h4>

            <p class="card-v14__description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente
              dolorem officia consequatur inventore omnis.
            </p>

            <p class="card-v14__link">Explore →</p>
          </a>
          <a class="card-v14" href="#0">
            <h4>Medicines at cheap rates!</h4>

            <p class="card-v14__description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente
              dolorem officia consequatur inventore omnis.
            </p>

            <p class="card-v14__link">Explore →</p>
          </a>
          <a class="card-v14" href="#0">
            <h4>Free Checkup for 20 patients!</h4>

            <p class="card-v14__description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente
              dolorem officia consequatur inventore omnis.
            </p>

            <p class="card-v14__link">Explore →</p>
          </a>
          <a class="card-v14" href="#0">
            <h4>Offer!</h4>

            <p class="card-v14__description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente
              dolorem officia consequatur inventore omnis.
            </p>

            <p class="card-v14__link">Explore →</p>
          </a>
          <a class="card-v14" href="#0">
            <h4>OFFER!</h4>

            <p class="card-v14__description">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente
              dolorem officia consequatur inventore omnis.
            </p>

            <p class="card-v14__link">Explore →</p>
          </a>
        </div>
        <img class="doctorimg" src="images/doctor.png" alt="" />
      </div>
    </section>

    <footer>
      <div class="footer-content">
        <p>Project 329</p>
        <p>©2023 Group 38</p>
      </div>
    </footer>
  </body>
</html>