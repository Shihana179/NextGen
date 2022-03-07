<!DOCTYPE html >
<html>
    <head>
        
        <title>Client Details</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rouge+Script&family=Rubik&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="index.css"/>
    </head>
    <body>
        <header>
            <div>
                <img class="logoimg" src="./images/logo_2-ng.png" alt="nextgenitlogo" />
            </div>
        </header>
        <section>
            <div class="container">
                <form action="indexdb.php" method="post" class="form">
                    <div class="row ">
                        <div class="col-12 ">
                            <input type="text" id="name" name="company_name" placeholder="Company Name" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <input type="email" id="email" name="email" placeholder="Email" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="tel" id="phone" name="phone" placeholder="Phone" >
                        </div>
                    </div>
                    <p>Address:</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" id="address" name="address" placeholder="Street Address" >
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" id="city" name="city" placeholder="City" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" id="country" name="country" placeholder="Country" >
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" id="zip" name="zip" placeholder="Zip Code" >
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <input type="number" id="service" name="service" placeholder="Service Hours">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        <div class="col-4 submit-btn">
                            <button type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>