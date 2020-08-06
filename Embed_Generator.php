<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Affiliate Embed Generator</title>
    <link rel="stylesheet" href="template.css" type="text/css">
    <link rel="stylesheet" href="https://fh-kit.com/buttons/v2/?red=cc0000&orange=ff6000&green=3AB134" type="text/css" media="screen" />

  </head>
  <body>
    <center><h1>Affiliate Embed Generator</h1></center>

    <?php ?>
    <?php ?>

<?php $main = new Embed(); ?>

    <?php
      class Embed {
        public static $panels = array();

        public function __construct(){
          $this->printEmbed();
        }
//figure out how to have panel object in panels array, loop through array and print
        public function printEmbed(){
            echo '<div id="fh-image-button-container" style="margin-top: 50px">';
            $panel1 = new Panel('Snorkeling', 'The best snorkeling around', 'image.com', 'fareharbor.com');
            $panel2 = new Panel('Scuba Diving', 'The best SCUBA', 'image.com', 'fareharbor.com');
            echo "</div>";
        }

      }

      class Panel {
          public $title;
          public $subtitle;
          public $image_url;
          public $booking_url;

          public function __construct($title, $subtitle, $image_url, $booking_url){
            $this->title = $title;
            $this->subtitle = $subtitle;
            $this->image_url = $image_url;
            $this->booking_url = $booking_url;
            $this->code = '<a class="image-button -half" style="background-image: url(' . $this->image_url . ');" target="_blank" href="'  . $this->booking_url . '">
  	                    <span class="tour-info">' . $this->title . '<br><span>'. $this->subtitle . '</span></span>
  	                    <span class="fh-button-true-flat-red fh-size--small book-btn">Book Now</span></a>';
            $this->printPanel();
          }

          public function printPanel(){
            echo '<a class="image-button -half" style="background-image: url(' . $this->image_url . ');" target="_blank" href="'  . $this->booking_url . '">
  	                    <span class="tour-info">' . $this->title . '<br><span>'. $this->subtitle . '</span></span>
  	                    <span class="fh-button-true-flat-red fh-size--small book-btn">Book Now</span></a>';
          }
      }

     ?>

  </body>
</html>
