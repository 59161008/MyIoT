<!DOCTYPE html>
<html>
<body>
<script src="https://cdn.netpie.io/microgear.js"></script>
<script>
  const APPID = "781de20e-5e45-41d5-b882-2ea30e83d70e";
  const KEY = "q6Yj1JpCamox3o77NqtX3VkLC4YA4UL1";
  const SECRET = "ioWNC)6uFK9_.bWjsAMVmyMqZRJoT-$d";

  const ALIAS = "HTML_web";         //  ชื่อตัวเอง
  const thing1 = "NodeMCU1";          //  ชื่อเพื่อนที่จะคุย

  var microgear = Microgear.create({
    key: KEY,
    secret: SECRET,
    alias : ALIAS
  });

  microgear.on('message',function(topic,msg) {
    document.getElementById("raw_data").innerHTML = "Data from Node MCU = " + msg;
    document.getElementById("get_topic").innerHTML = "Topic = " + topic;
    var split_msg = msg.split("/"); //String data = "/" +String(Humidity) + "/" + String(Temp);
    console.log(msg);  // for debug
    if(typeof(split_msg[0])!='undefined' && split_msg[0]==""){
      document.getElementById("Humidity_temp").innerHTML = "Humidity = " + split_msg[1] + " % ,Temp = " + split_msg[2] + " c";
    }
  });

  microgear.on('connected', function() {
    microgear.setAlias(ALIAS);
    document.getElementById("connected_NETPIE").innerHTML = "Connected to NETPIE"
  });

  microgear.on('present', function(event) {
    console.log(event);
  });

  microgear.on('absent', function(event) {
    console.log(event);
  });

  microgear.resettoken(function(err) {
    microgear.connect(APPID);
  });
</script>

<h1 id="connected_NETPIE"></h1>
<p id="raw_data"></p>
<p id="get_topic"></p>
<strong id="Humidity_temp"></strong>

</body>
</html>
