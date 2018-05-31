
<?php
echo"
<!DOCTYPE html>
<html style=\"padding:0; margin:0;\">
<body style=\"margin-top:0;\">
<p id=\"demo\" style=\"font-size:1em; font:Helvetica; margin:0;\"></p>

<script>
var succ = false;
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myFunction(this);

    }
};
setInterval(function() {
  xhttp.open(\"GET\", \"" . shell_exec('echo -n $PLEX_SERVER') . "/status/sessions\", true);
  xhttp.send();
},5000);

function myFunction(xml) {
      var xmlDoc = xml.responseXML;
      var x = xmlDoc.getElementsByTagName('Track');
      for (i = 0; i < x.length ; i++){
      var z = x[i].childNodes[5];
      console.log(z);
      if (z.getAttributeNode(\"machineIdentifier\").nodeValue == \"" . shell_exec('echo -n $MACHINE_IDENTIFIER') ."\"){
          var artist = x[i].getAttributeNode(\"grandparentTitle\");
          var album = x[i].getAttributeNode(\"parentTitle\");
          var song = x[i].getAttributeNode(\"title\")
          document.getElementById(\"demo\").innerHTML = \"\";
          document.getElementById(\"demo\").innerHTML += song.nodeValue;
          document.getElementById(\"demo\").innerHTML += \" - \";
          document.getElementById(\"demo\").innerHTML += artist.nodeValue;
        }
     }
}

</script>

</body>
</html>
";
?>
