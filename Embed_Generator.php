<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Affiliate Embed Generator</title>
    <link rel="stylesheet" href="template.css" type="text/css">
    <link rel="stylesheet" href="embed_generator.css" type="text/css">

    <link rel="stylesheet" href="https://fh-kit.com/buttons/v2/?red=cc0000&orange=ff6000&green=3AB134" type="text/css" media="screen" />
<script src="embed_generator.js"></script>
  </head>
  <body>
    <div id="pagearea">
    <center><h1>Affiliate Embed Generator</h1></center>
    <div id="inputfields">
      <form>


      </form>
    </div>

    <div id="embed_outer">


    </div>

    <?php
    /*
      class Embed {
        public static $panels = array();

        public function __construct(){
          $this->printEmbed();
        }
//figure out how to have panel object in panels array, loop through array and print
        public function printEmbed(){
            echo '<div id="fh-image-button-container" style="margin-top: 50px;">';
            //$panel1 = new Panel('Snorkeling', 'The best snorkeling around', 'https://media-prideofmaui.netdna-ssl.com/blog/wp-content/uploads/2019/08/Hawaii-snorkeling-spots-header.jpg', 'fareharbor.com');
            //$panel2 = new Panel('Scuba Diving', 'The best SCUBA', 'https://www.squalodivers.com/wp-content/uploads/2017/04/Adventure-diver.jpg', 'fareharbor.com');
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
            echo '<a class="image-button -half -tall" style="background-image: url(' . $this->image_url . ');" target="_blank" href="'  . $this->booking_url . '">
  	                    <span class="tour-info">' . $this->title . '<br><span>'. $this->subtitle . '</span></span>
  	                    <span class="fh-button-true-flat-red fh-size--small book-btn">Book Now</span></a>';
          }
      }
*/
     ?>
    <a class="fh-button-2d-red" id="generate">Generate Code</a>

     <h2>Copy and paste this code</h2>
     <center>
       <div>
         <textarea id="afil_code" rows="25" disabled="true">

         </textarea>
       </div>

     </center>
   </div>


   <script>
     var embed = [];
     var embedcode = ""
     var panel1 = new Panel('Snorkeling', 'The best snorkeling around', 'https://media-prideofmaui.netdna-ssl.com/blog/wp-content/uploads/2019/08/Hawaii-snorkeling-spots-header.jpg', 'fareharbor.com');
     var panel2 = new Panel('Scuba Diving', 'The best SCUBA', 'https://www.squalodivers.com/wp-content/uploads/2017/04/Adventure-diver.jpg', 'fareharbor.com');
     embed.push(panel1);
     embed.push(panel2);


     function addPanel(newPanel){
      embed.push(newPanel);
     }

     function updateEmbed(){
       jQuery(document).ready(function($){
       embedcode= "";
       embedcode += '<div id="fh-image-button-container" style="margin-top: 50px;"> \n'
       for (var i = 0; i < embed.length; i++){
         embedcode += embed[i].code;
         embedcode += '\n';
       }
       embedcode += '</div>'

 
          $("#afil_code").text(embedcode)
          $('#embed_outer').html(embedcode)

       });

     }

   </script>



   <script> 
     jQuery(document).ready(function($){
$('#generate').bind('click', updateEmbed)
     });
   </script>


  </body>
</html>
