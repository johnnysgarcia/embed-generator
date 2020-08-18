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
      <form id="embedForm0">
        <div id="newItem0">
          <label>Tour title:</label><br>
          <input type="text" name="title" id="tourTitle0" value="Snorkeling" required></input><br>
          <label>Tour subtitle:</label><br>
          <input type="text" name="title" id="tourSubtitle0" value="The best snorkeling around" required></input><br>
          <label>Image URL:</label><br>
          <input type="text" name="title" id="tourImage0" value="https://media-prideofmaui.netdna-ssl.com/blog/wp-content/uploads/2019/08/Hawaii-snorkeling-spots-header.jpg" required></input><br>
          <label>Booking URL:</label><br>
          <input type="text" name="title" id="tourBooking0" value="fareharbor.com" required></input><br>
        </div><br>
      </form>

      <form id="embedForm1">
        <div id="newItem1">
          <label>Tour title:</label><br>
          <input type="text" name="title" id="tourTitle1" value="Scuba Diving" required></input><br>
          <label>Tour subtitle:</label><br>
          <input type="text" name="title" id="tourSubtitle1" value="The best SCUBA" required></input><br>
          <label>Image URL:</label><br>
          <input type="text" name="title" id="tourImage1" value="https://www.squalodivers.com/wp-content/uploads/2017/04/Adventure-diver.jpg" required></input><br>
          <label>Booking URL:</label><br>
          <input type="text" name="title" id="tourBooking1" value="fareharbor.com" required></input><br>
        </div><br>
      </form>
    </div>
    <br>
    <a class="fh-button-2d-orange" id="addPanel">Add Panel</a>
    <a class="fh-button-2d-green" id="removePanel">Remove Panel</a>
    <br><br>
    <a class="fh-button-2d-red" id="generate">Generate Code</a>


    <div id="embed_outer">


    </div>

     <h2>Copy and paste this code</h2>
     <center>
       <div>
         <textarea id="afil_code" rows="25" disabled="true">

         </textarea>
       </div>

     </center>
   </div>

   <script> 

  </script>

   <script>
   var embed = [];
   var embedcode = ""


   var count = 2;
   var tempTourTitle;
   var tempTourSubtitle;
   var tempTourImage;
   var tempTourBooking;
   function generate(){
     embedcode= "";
     embed= [];
     for (var i = 0; i < count; i++){
       tempTourTitle = document.getElementById("tourTitle" + i).value;

       tempTourSubtitle = document.getElementById("tourSubtitle" + i).value;

       tempTourImage = document.getElementById("tourImage" + i).value;

       tempTourBooking = document.getElementById("tourBooking" + i).value;

       embed.push(new Panel(tempTourTitle, tempTourSubtitle, tempTourImage, tempTourBooking));
     }
     /*
     tourTitle0 = document.getElementById("tourTitle0").value;
     tourSubtitle0 = document.getElementById("tourSubtitle0").value;
     tourImage0 = document.getElementById("tourImage0").value;
     tourBooking0 = document.getElementById("tourBooking0").value;
     embed.push(new Panel(tourTitle0, tourSubtitle0, tourImage0, tourBooking0));
     tourTitle1 = document.getElementById("tourTitle1").value;
     tourSubtitle1 = document.getElementById("tourSubtitle1").value;
     tourImage1 = document.getElementById("tourImage1").value;
     tourBooking1 = document.getElementById("tourBooking1").value;
     embed.push(new Panel(tourTitle1, tourSubtitle1, tourImage1, tourBooking1));
     */
     updateEmbed();
   }

   function addPanel(){
     console.log("add panel");
     var formCode = `<form id="embedForm` + count + `">
       <div id="newItem` + count + `">
         <label>Tour title:</label><br>
         <input type="text" name="title" id="tourTitle` + count + `" value="Scuba Diving" required></input><br>
         <label>Tour subtitle:</label><br>
         <input type="text" name="title" id="tourSubtitle` + count + `" value="The best SCUBA" required></input><br>
         <label>Image URL:</label><br>
         <input type="text" name="title" id="tourImage` + count + `" value="https://www.squalodivers.com/wp-content/uploads/2017/04/Adventure-diver.jpg" required></input><br>
         <label>Booking URL:</label><br>
         <input type="text" name="title" id="tourBooking` + count + `" value="fareharbor.com" required></input><br>
       </div><br>
     </form>`;
     var fields = document.getElementById('inputfields');
     fields.insertAdjacentHTML('beforeend', formCode);
     count++;

   }

   function removePanel(){
     console.log("remove panel")

   }

     //takes all items in embed array, prints them and displays their code
     function updateEmbed(){
       jQuery(document).ready(function($){
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
$('#generate').bind('click', generate);
$('#addPanel').bind('click', addPanel);
$('#removePanel').bind('click', removePanel);

//$('#createButton').bind('click', pushToArray)
     });
   </script>


  </body>
</html>
