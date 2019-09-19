.showDiv( idName, value ){
    objDiv = document.getElementById( idName );
    if( value )
        objDiv.style.display = "";
    else
        objDiv.style.display = "none";
  }
  