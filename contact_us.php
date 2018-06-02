<!DOCTYPE html>
<!-- robert -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <!-- normilize css file being lodaing in -->
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <!-- bootstrap being loading in -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- this is the css style for the webpage -->
    <link rel="stylesheet" type="text/css" href="css/contactUs.css" />
  </head>
  <body>
    <!-- jumbotron is holding the image and contact us wordds at top of page -->
      <div class="jumbotron rounded-0">
        <div id="jumboInfo">
          <h1 class="display-3 text-center">Contact US</h1>
          <p class="lead text-center">We would love to hear from you!</p>
        </div>
      </div>
  <!-- this is the form container holdign the contact us form i commented this out becasue i am displaying the agencies locations and assoastied agents-->
  <!-- <div class="container-fluid">
      <form>
      row for first and last name
        <div class="row">

        colum for first name
          <div class="col-sm-6">
            <div class="form-group">
              <label for="fname">First Name</label>
              <input class="form-control" type="text" name="fname" placeholder="Your name..">
            </div>
          </div>

          column for last name
          <div class="col-sm-6">
            <div class="form-group">
              <label for="lname">Last Name</label>
              <input class="form-control" type="text" name="lname" placeholder="Your last name..">
            </div>
          </div>
        </div>

        row for email and phone number
        <div class="row">

        column for email
          <div class="col-sm-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control" type="emal" name="email" placeholder="Your email..">
            </div>
          </div>

          column or phone number
          <div class="col-sm-6">
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input class="form-control" type="tel" name="phone" placeholder="Your last name..">
            </div>
          </div>
        </div>

        column for text box
          <div class="form-group">
          <label for="info">Message</label>
              <textarea class="form-control" name="info" rows="4" maxlength="2000" cols="80"></textarea>
            </div>

            submit button
        <div class="form-group">
          <input class="btn btn-primary btn-lg" type="submit" value="Submit">
        </div>
    </form>
  </div> -->
  <!-- this is the container holding the address of the company and google maps -->

  <!-- this is a row to hold the contact info of each office -->
  <div class="container text-center">
    <div class="row">
      <div class="col-sm-6">
        Travel Experts Calgary
      </div>
      <div class="col-sm-6">
        Travel Experts Okotoks
      </div>
    </div>
    <?php include "agenciesContact.php" ?>
    <div class="row">
      <div class="col-sm-6">
        <?php include "calgaryAgents.php" ?>
      </div>
      <div class="col-sm-6">
        <?php include "okotoksAgents.php" ?>
      </div>
    </div>
  </div>
    <!-- i inlcude the footer here which is a styled bootstrap footer, i will update that later -->
    <?php include "footer.php" ?>
    <script type="text/javascript" src="js/contactUs.js"></script>
  </body>
<!-- robert   -->
</html>
