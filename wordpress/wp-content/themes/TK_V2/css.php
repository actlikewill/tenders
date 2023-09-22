<?php // CSS.PHP 

$GLOBALS['themeColourA'] = '#EF4D2D';
$GLOBALS['themeColourB'] = '#f7f6f2';
$GLOBALS['linkColourA'] = '#000';

?>

<style type="text/css">

a {
  color: <?php echo $GLOBALS['themeColourA']; ?>;
  text-decoration: none;
}
a:hover,
a:focus {
  color: <?php echo $GLOBALS['linkColourA']; ?>;
  text-decoration: none;
}

body {
  font-family: 'Roboto', "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.428571429;
  color: #333333;
  // background-color: #ffffff;
  background: #f3f2f2 url(<?php echo get_template_directory_uri(); ?>/library/img/bg_housestyle2.png) top left no-repeat fixed;
}

h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
  font-family: 'Roboto', "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-weight: 500;
  line-height: 1.1;
  color: inherit;
}
.mc4wp-form {
//  background: url(<?php echo get_template_directory_uri(); ?>/library/img/mailchimp_bg.jpg);
  color: #EF4D2D;
  text-align: center;
  padding: 20px;  
}
.mc4wp-form input[type="submit"] {
    background-color: #EF4D2D;
    border: 0px;
    color: #FFF;
    font-weight: bold;
    text-transform: uppercase;
    padding: 13px 20px;
    width: 100%;
    border-radius: 5px;
}
.mc4wp-form input[type="submit"]:hover {
    background-color: #B12104;
    color: #FFF;
}
.mc4wp-form input[type="email"], .mc4wp-form input[type="text"] {
    border: 3px solid #EF4D2D;
    background-color: transparent;
    color: #FFF;
    font-weight: bold;
    /* text-transform: uppercase; */
    padding: 10px 20px;
    width: 100%;
    border-radius: 5px;
    text-align: center;
}
.mc4wp-form label {
    display: none;
}
.mc4wp-form input[type="email"]:focus, .mc4wp-form input[type="text"]:focus {
    border: 3px solid #FFF;
    box-shadow: none !important;
}  

/* INPUT PLACEHOLDER COLOUR */
.mc4wp-form input::-webkit-input-placeholder {
   color: #FFF;
}
.mc4wp-form input:-moz-placeholder { /* Firefox 18- */
   color: #FFF;  
}
.mc4wp-form input::-moz-placeholder {  /* Firefox 19+ */
   color: #FFF;  
}
.mc4wp-form input:-ms-input-placeholder {  
   color: #FFF;  
}

</style>