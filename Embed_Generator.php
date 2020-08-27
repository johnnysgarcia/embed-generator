<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Custom Embed Generator</title>
    <link rel="stylesheet" href="template.css" type="text/css">
    <link rel="stylesheet" href="embed_generator.css" type="text/css">

    <link rel="stylesheet" id="fhStyleSheet" href="https://fh-kit.com/buttons/v2/?blue=256BB9&green=3AB134" type="text/css" media="screen" />
<script src="embed_generator.js"></script>
  </head>
  <body>
    <div id="header">
        <center><h1>FareHarbor Custom Embed Generator</h1></center>
    </div>

    <div id="pagearea">

    <label>Button Color: </label><input value="#cc0000" id="buttonColor" type="color">
    <div id="inputfields">

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
   <footer>

   </footer>

  </body>
</html>
