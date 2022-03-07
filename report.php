<?php include('select.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>Report</title>
        
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rouge+Script&family=Rubik&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="report.css"/>
    </head>
    <body>
        <header>
            <div>
                <img class="logoimg" src="./images/logo_2-ng.png" alt="nextgenitlogo" />
            </div>
        </header>
        <section>
            <div class="container">
                <div class="bgblack">
                <form action="reportdb.php" method="post" class="form" style="background-color:#fff;">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <select class="list" id="company_name" name="company_name" placeholder="Company Name"  onchange="completefield()">
                                <option style="background-color:#fff;" value="">Company Name</option>
                                <?php while($row=mysqli_fetch_array($result)):;?>
                                <option style="background-color:#fff;"  value="<?php echo $row['company_name'];?>" ><?php echo $row['company_name'];?></option>
                                <?php endwhile;?>
                            </select>
                            
                        </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="text" id="onsite_engineer" name="onsite_engineer" placeholder="Onsite Engineer" value="" onchange="digitalsign()" >
                    </div>
                    <div class="col-12 col-md-6 ">
                        <input type="text" id="start_time" name="start_time" placeholder="Start time(HH:MM 24hr)" >
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 col-md-6">
                        <input type="text" id="date" name="date" placeholder="Date"  value ="">
                    </div>
                    <div class="col-12 col-md-6 ">
                        <input type="text" id="end_time" name="end_time" placeholder="End time(HH:MM 24hr)"  onchange="servicefill()" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="number" id="service_hour" name="service_hour" placeholder="Service hour">
                    </div>
                </div>
                <p>Client- Details:</p>
                <div class="row">
                    <div class="col-12">
                        <textarea id="address" name="address" rows="2" cols="30" placeholder="Address" value=""></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="email" id="email" name="email" placeholder="Email" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <textarea id="problems" name="problems" rows="2" cols="30" placeholder="Problems"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <textarea id="solution" name="solution" rows="2" cols="30" placeholder="Solution"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <textarea id="feedback" name="feedback" rows="2" cols="30" placeholder="Feedback"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <textarea id="digital_signature" name="digital_signature" rows="2" cols="30" placeholder="Digital Signature"></textarea>
                    </div>
                </div>
                <div class="row ">
                    <div class="col -4"></div>
                    <div class="col -4"></div>
                    <div class="col-4 submit-btn">
                        <button name="submit" onclick="">Submit</button>
                    </div>
                </div>
            </div>  
            </div> 
                </form>
            </div>
        </section>
        <script>
            function completefield(){
                const currentdate = new Date().toLocaleString().split(',')[0];
                document.getElementById('date').value = currentdate;

                var str=document.getElementById('company_name').value
                
                if (str.length == 0) {
                document.getElementById("address").value = "";
                document.getElementById("email").value = "";
                return;
            }
            else {
                // Creates a new XMLHttpRequest object
                     var xmlhttp = new XMLHttpRequest();
                     xmlhttp.onreadystatechange = function () {
  
                    // Defines a function to be called when
                    // the readyState property changes
                    if (this.readyState == 4 && 
                            this.status == 200) {
                          
                        // Typical action to be performed
                        // when the document is ready
                        var myObj = JSON.parse(this.responseText);
  
                        // Returns the response data as a
                        // string and store this array in
                        // a variable assign the value 
                        // received to first name input field
                          
                        document.getElementById("address").value = myObj[0];
                          
                        // Assign the value received to
                        // last name input field
                        document.getElementById("email").value = myObj[1];
                    }
                };
  
                // xhttp.open("GET", "filename", true);
                xmlhttp.open("GET", "selectautofill.php?company_name=" + str, true);
                  
                // Sends the request to the server
                xmlhttp.send();
            }

        }

        function servicefill(){
                

                var str=document.getElementById('company_name').value
                var strt_time=document.getElementById('start_time').value;
                var ent_time=document.getElementById('end_time').value;
                var StartTime = parseFloat(strt_time.replace(':','.'));
                var EndTime = parseFloat(ent_time.replace(':','.'));
                var difference=EndTime-StartTime;
                
                
                var total_hour_worked = Math.ceil(difference);

                if (str.length == 0) {
                document.getElementById("service_hour").value = "";
                return;
            }
            else {
                     var xmlhttp = new XMLHttpRequest();
                     xmlhttp.onreadystatechange = function () {

                    if (this.readyState == 4 && 
                            this.status == 200) {

                        var myObj = JSON.parse(this.responseText);
  

                        var servicehour=myObj[2];  
                        var hour=parseInt(servicehour);
                        var servicehour_remainder=hour-total_hour_worked;

                        document.getElementById("service_hour").value = servicehour_remainder;
                          
                    }
                };
  
                xmlhttp.open("GET", "selectautofill.php?company_name=" + str, true);
                xmlhttp.send();
            }

        }
        function digitalsign(){
            var siteengineername=document.getElementById("onsite_engineer").value;
            var currdate=document.getElementById("date").value;
            var digital_sign=siteengineername+"\n"+currdate;
            document.getElementById("digital_signature").value=digital_sign;

        }
        
        </script>
        <script src=
            "https://code.jquery.com/jquery-3.2.1.min.js">
        </script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
         <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
        
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>