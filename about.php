<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Foundation | Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/foundation.min.css" />
    <link href="css/style.css" rel="stylesheet"/>
    
  </head>
  <body>
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name"><a href="responsive.html"><h1>Sushi Yamagata </a></h1></li>
        
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>
      <section class="top-bar-section">
        <ul class="left">
          <li class="divider"></li>
          <li class="active"><a href="#">About</a></li>
          <li class="divider"></li>
          <li><a href="#">Our food</a></li>
          <li class="divider"></li>
          <li class="has-dropdown">
            <a href="#">Menu</a>
            <ul class="dropdown">
              <li><a href="#">Sushi</a></li>
              <li class="has-dropdown"><a href="#">Steak</a>
                <ul class="dropdown">
                  <li><a href="#">New York Strip</a></li>
                  <li><a href="#">Center cut mignon</a></li>
                  <li><a href="#">Premium 10 oz sirloin</a></li>
                  <li><a href="#">12 oz Ribeye Steak</a></li>
                </ul>
              </li>
              <li><a href="#">Ramen</a></li>
              <li><a href="#">Seafood</a></li>
            </ul>
          </li>
          <li class="divider"></li>
          <li><a href="#">Reservations</a></li>
        </ul>
        <ul class="right">
          <li class="has-form">
          <div class="row collapse">
            <div class="large-8 small-9 columns">
            <input type="text" placeholder="Find Stuff">
            </div>
            <div class="large-4 small-3 columns">
              <a href="#" class="alert button expand">Search</a>
            </div>
          </div>
          </li>
          <li class="has-form">
            <a href="http://foundation.zurb.com/docs" class="button">Get Lucky</a>
          </li>
        </ul>
      </section>
    </nav>
    <div class="row">
      <div class="large-12 columns">
        <h1>Responsive Project</h1>
      </div>
    </div>
    
    <div class="row">
      <div class="large-12 columns" id="main">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu quam eu felis convallis malesuada. Pellentesque enim arcu, bibendum at sodales in, molestie quis ipsum. Donec at nibh risus. Proin felis velit, convallis sit amet elit et, porttitor semper erat. Aenean non elit a dui scelerisque sodales. Donec libero magna, volutpat ut mattis eget, tincidunt in urna. Ut id risus ipsum. Aenean vitae imperdiet massa. Mauris sed ligula purus. Quisque sodales fermentum felis, vel facilisis nisi. Vivamus tincidunt hendrerit dolor, eget dapibus nisl aliquam quis.
        </p>
        <p>
        Proin vulputate fringilla bibendum. Nullam dictum sapien at velit euismod, quis iaculis lectus adipiscing. Nam ut tempor nibh, sed pretium neque. Maecenas adipiscing tellus sodales augue molestie facilisis. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam erat volutpat. Duis vehicula tempus mi ac bibendum. Etiam sed euismod nunc. Integer vitae tortor nulla. Suspendisse porta sollicitudin neque in porta.
        </p>
      </div>
    </div>
    <div id="contact" class="clearfix">
      <h1>Contact Us</h1>
      <?php
//init variables
        $cf = array();
        $sr = false;
 
        if(isset($_SESSION['cf_returndata'])){
          $cf = $_SESSION['cf_returndata'];
          $sr = true;
          // cf for contact form
          //sr: if we previously process the form
        }
      ?>
      <ul id="errors" class="<?php echo ($sr && !$cf['form_ok']) ? 'visible' : ''; ?>">
        <li id="info">There were some problems with your form submission:</li>
        <?php 
          if(isset($cf['errors']) && count($cf['errors']) > 0) :
          foreach($cf['errors'] as $error) :
        ?>
        <li><?php echo $error ?></li>
        <?php
          endforeach;
          endif;
        ?>
      </ul>
      <p id="success">Thanks for your message! We will get back to you ASAP!</p>
    <form method="post" action="app.php">
      <form>
        <label for="name">Name: <span class="required">*</span></label>
        <input type="text" id="name" name="name" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['name'] : '' ?>" placeholder="John Doe" required="required" autofocus="autofocus" />
 
        <label for="email">Email Address: <span class="required">*</span></label>
        <input type="email" id="email" name="email" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['email'] : '' ?>" placeholder="johndoe@example.com" required="required" />
 
        <label for="telephone">Telephone: </label>
        <input type="tel" id="telephone" name="telephone" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['telephone'] : '' ?>" />
 
        <label for="enquiry">Enquiry: </label>
        <select id="enquiry" name="enquiry">
            <option value="General" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'General') ? "selected='selected'" : '' ?>>General</option>
            <option value="Sales" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'Sales') ? "selected='selected'" : '' ?>>Sales</option>
            <option value="Support" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'Support') ? "selected='selected'" : '' ?>>Support</option>
        </select>
 
      <label for="message">Message: <span class="required">*</span></label>
      <textarea id="message" name="message" placeholder="Your message must be greater than 20 charcters" required="required" data-minlength="20"><?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['message'] : '' ?></textarea>
 
      <span id="loading"></span>
      <input type="submit" value="Holla!" id="submit-button" />
      <p id="req-field-desc"><span class="required">*</span> indicates a required field</p>
    </form>
    <?php unset($_SESSION['cf_returndata']); ?>
    </div>
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/script.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
