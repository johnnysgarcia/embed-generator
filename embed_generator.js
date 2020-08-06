class Panel {
  constructor(title, subtitle, imageurl, fhlink){
    this.title = title;
    this.subtitle = subtitle;
    this.imageurl = imageurl;
    this.fhlink = fhlink;
    this.code = '<a class="image-button -half" style="background-image: url(' + imageurl + ');" target="_blank" href="' + fhlink + '"><span class="tour-info">'
    + title + '<br><span>' + subtitle + '</span></span><span class="fh-button-true-flat-red fh-size--small book-btn">Book Now</span></a>';
  }

}
