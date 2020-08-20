<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Custom Embed Generator</title>
    <link rel="stylesheet" href="template.css" type="text/css">
    <link rel="stylesheet" href="embed_generator.css" type="text/css">

    <link rel="stylesheet" href="https://fh-kit.com/buttons/v2/?red=cc0000&blue=256BB9&green=3AB134" type="text/css" media="screen" />
<script src="embed_generator.js"></script>
  </head>
  <body>
    <div id="header">
        <center><h1>FareHarbor Custom Embed Generator</h1></center>
    </div>

    <div id="pagearea">

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
          <!--working on radio -->
        <div class="radio">
            <div>
              <label>Panel Width:</label><br>
              <label>1/3</label><input type="radio" name="width0" value="third" required></input>
              <label>1/2</label><input type="radio" name="width0" value="half" checked required></input>
              <label>2/3</label><input type="radio" name="width0" value="twothirds" required></input>
              <label>Full</label><input type="radio" name="width0" value="full" required></input>
            </div>
            <br>
          <div>
              <label>Panel Height:</label><br>
              <label>Tall</label><input type="radio" name="height0" value="tall" required></input>
              <label>Medium</label><input type="radio" name="height0" value="medium" checked required></input>
              <label>Short</label><input type="radio" name="height0" value="short"  required></input>
          </div>
          <div id="buttonText">
            <label>Button Text:</label><br>
            <input type="text" id="buttonText0" value="Book Now" required></input>
          </div>
        </div>

        </div>
      </form>


      <form id="embedForm1">
        <div id="newItem1">
          <label>Tour title:</label><br>
          <input type="text" name="title" id="tourTitle1" value="Scuba Diving" placeholder="" required></input><br>
          <label>Tour subtitle:</label><br>
          <input type="text" name="title" id="tourSubtitle1" value="The best Scuba in town" required></input><br>
          <label>Image URL:</label><br>
          <input type="text" name="title" id="tourImage1" value="https://www.squalodivers.com/wp-content/uploads/2017/04/Adventure-diver.jpg" required></input><br>
          <label>Booking URL:</label><br>
          <input type="text" name="title" id="tourBooking1" value="fareharbor.com" required></input><br>
          <div class="radio">
            <div>
              <label>Panel Width:</label><br>
              <label>1/3</label><input type="radio" name="width1" value="third" required></input>
              <label>1/2</label><input type="radio" name="width1" value="half" checked required></input>
              <label>2/3</label><input type="radio" name="width1" value="twothirds" required></input>
              <label>Full</label><input type="radio" name="width1" value="full" required></input>
            </div>
          <br>
            <div>
              <label>Panel Height:</label><br>
              <label>Tall</label><input type="radio" name="height1" value="tall" required></input>
              <label>Medium</label><input type="radio" name="height1" value="medium" checked required></input>
              <label>Short</label><input type="radio" name="height1" value="short"  required></input>
            </div>
            <div>
              <label>Button Text:</label><br>
              <input type="text" id="buttonText1" value="Book Now" required></input>
            </div>
          </div>
        </div>
      </form>
    </div>
    <br>
    <a class="fh-button-outline-blue fh-shape--round" id="addPanel">Add Panel</a>
    <a class="fh-button-outline-blue fh-shape--round" id="removePanel">Remove Panel</a>
    <br><br>
    <a class="fh-button-outline-green fh-shape--round" id="generate">Generate Code</a>


    <h2>Embed Preview:</h2>

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

   var radioNameWidth;
   var radioNameHeight;
   var reqquery;
   var tempWidth;
   var tempHeight;
   var tempButtonText;
   function generate(){
     embedcode= "";
     embed= [];

     //for each set of input fields, creates a panel object. parameters are retrieved by id concatenated with count variable.
     //pushes each panel object to embed array
     for (var i = 0; i < count; i++){
       tempTourTitle = document.getElementById("tourTitle" + i).value;
       tempTourSubtitle = document.getElementById("tourSubtitle" + i).value;
       tempTourImage = document.getElementById("tourImage" + i).value;
       tempTourBooking = document.getElementById("tourBooking" + i).value;
       tempButtonText = document.getElementById("buttonText" + i).value;
       radioNameWidth = 'width' + (i);
       radioNameHeight = 'height' + (i);
       reqquery = 'input[name="' + radioNameWidth + '"]:checked'
       tempWidth = document.querySelector(reqquery).value;
       reqquery = 'input[name="' + radioNameHeight + '"]:checked'
       tempHeight = document.querySelector(reqquery).value;

       embed.push(new Panel(tempTourTitle, tempTourSubtitle, tempTourImage, tempTourBooking, tempWidth, tempHeight, tempButtonText));
     }
     console.log()
     updateEmbed();
   }

//concatenates a string with html for input fields, adding the count variable to the id
   function addPanel(){
     var formCode = `<form id="embedForm` + count + `">
       <div id="newItem` + count + `">
         <label>Tour title:</label><br>
         <input type="text" name="title" id="tourTitle` + count + `"  required></input><br>
         <label>Tour subtitle:</label><br>
         <input type="text" name="title" id="tourSubtitle` + count + `"  required></input><br>
         <label>Image URL:</label><br>
         <input type="text" name="title" id="tourImage` + count + `" required></input><br>
         <label>Booking URL:</label><br>
         <input type="text" name="title" id="tourBooking` + count + `" required></input><br>
         <div class="radio">
            <div>
              <label>Panel Width:</label><br>
              <label>1/3</label><input type="radio" name="width` + count + `" value="third" required></input>
              <label>1/2</label><input type="radio" name="width` + count + `" value="half" checked required></input>
              <label>2/3</label><input type="radio" name="width` + count + `" value="twothirds" required></input>
              <label>Full</label><input type="radio" name="width` + count + `" value="full" required></input><br>
            </div>
            <div>
               <label>Panel Height:</label><br>
               <label>Tall</label><input type="radio" name="height` + count + `" value="tall" required></input>
               <label>Medium</label><input type="radio" name="height` + count + `" value="medium" checked required></input>
               <label>Short</label><input type="radio" name="height` + count + `" value="short"  required></input>
           </div>
           <div>
             <label>Button Text:</label><br>
             <input type="text" id="buttonText` + count + `" value="Book Now" required></input>
           </div>
         </div>
       </div>
     </form>`;
     var fields = document.getElementById('inputfields');
     fields.insertAdjacentHTML('beforeend', formCode);
     count++;

   }

   function removePanel(){
     console.log("remove panel")
     if (count == 1){
       alert('Embed must have at least one panel')
     } else {
     var tempNum = count - 1
     var formID = 'embedForm' + tempNum;
     var lastForm = document.getElementById(formID);
     lastForm.remove();
     count--;
   }
   }

     //takes all panels in embed array, prints them and displays their code
     function updateEmbed(){
       jQuery(document).ready(function($){
      embedcode += '<link rel="stylesheet" href="https://fh-kit.com/buttons/v2/?red=cc0000&orange=ff6000&green=3AB134" type="text/css" media="screen" /> \n'
       embedcode += '<div id="fh-image-button-container"> \n'
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
   <footer>

   </footer>

  </body>
</html>
