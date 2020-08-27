
//panel class holds info for each tour listing on embed
class Panel {
  constructor(title, subtitle, imageurl, fhlink, width, height, buttonText){
    if (title == ''){
      title = "Tour Title Missing";
    }
    this.title = title;
    if (imageurl == ''){
      imageurl = 'https://media-exp1.licdn.com/dms/image/C4E1BAQG1Om_75ThnIw/company-background_10000/0?e=2159024400&v=beta&t=Ze8mL6s3Vleay-0dX6-ix4lqzQ36WkQB5TwAGiaJdDs'
    }
    this.imageurl = imageurl;
    this.subtitle = subtitle;
    this.fhlink = fhlink;
    this.buttonText = buttonText;
    this.code = '<a class="image-button -' + width + ' -' + height +'" style="background-image: url(' + imageurl + ');" target="_blank" href="' + fhlink + '"><span class="tour-info">'
    + title + '<br><span>' + subtitle + '</span></span><span class="fh-button-true-flat-color fh-size--small book-btn">'+ buttonText +'</span></a>';
  }

}

//input field class, holds info for form that collects tour info
class InputField {
  constructor(count){
    this.count = count;
    this.code = `<form id="embedForm` + count + `">
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
  }

}


var embed = [];
var embedcode = ""
var count = 0;
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
var tempButtonColor;
var fields = [];
var fieldsCode = ""


//creates two forms to start with and pushes them onto fields array
function createFields(){
  jQuery(document).ready(function($){
console.log("fields created");
fields.push(new InputField(count));
count++;
fields.push(new InputField(count));
count++;
displayFields();
  });
}

//appends forms onto page
function displayFields(){
 fieldsCode = "";
 for (var i = 0; i < count; i++){
   fieldsCode += fields[i].code;
   console.log(i);
 }
  $('#inputfields').html(fieldsCode)
}

//appends code for new form onto existing forms code
function addField(){
  fields.push(new InputField(count));
  fieldsCode += fields[count].code;
  var fieldsHTML = document.getElementById('inputfields');
  fieldsHTML.insertAdjacentHTML('beforeend', fields[count].code);
  count++;
  //displayFields();
}

//removes last form from forms code
function removeField(){
  if (count == 1){
    alert('Embed must have at least one panel')
  } else {
  fields.pop();
  var tempNum = count - 1
  var formID = 'embedForm' + tempNum;
  var lastForm = document.getElementById(formID);
  lastForm.remove();
  count--;
  //displayFields();
}
}

//iterates through all forms and creates a panel for each, pushes them onto embed array then renders 
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


  //takes all panels in embed array, prints them and displays their code
  function updateEmbed(){
    jQuery(document).ready(function($){
   tempButtonColor = document.getElementById('buttonColor').value;
   tempButtonColor = tempButtonColor.slice(1);
   embedcode += '<link rel="stylesheet" href="https://fh-kit.com/buttons/v2/?color=' + tempButtonColor + '" type="text/css" media="screen" /> \n'
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
  window.onload = createFields;

  jQuery(document).ready(function($){
$('#generate').bind('click', generate);
$('#addPanel').bind('click', addField);
$('#removePanel').bind('click', removeField);

//$('#createButton').bind('click', pushToArray)
  });
