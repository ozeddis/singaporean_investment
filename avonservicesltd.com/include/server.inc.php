<?php
session_start();
$server = "localhost";
$user = "";
$pwd = "";
$db = "";
$connection = mysqli_connect($server, $user, $pwd, $db);

if($connection == true){

}else{
    mysqli_connect_error();
    die("Can not connect to server");
    exit();
}

?>

<script type="text/javascript">
(function () {
var options = {
whatsapp: "+447469617483", // WhatsApp number
call_to_action: "Send us a message", // Call to action
position: "left", // Position may be 'right' or 'left'
};
var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
})();
</script>
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '89800cdb4aa19c73d024f38b35e7e159afc9f279';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
