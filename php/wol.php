<?php
flush();
/**
 * 起動用Function
 */
function WakeOnLan($addr, $mac) {
  $addr_byte = explode(':', $mac);
  $hw_addr = '';
  for ($a=0; $a < 6; $a++) $hw_addr .= chr(hexdec($addr_byte[$a]));
    $msg = chr(255).chr(255).chr(255).chr(255).chr(255).chr(255);
    for ($a = 1; $a <= 16; $a++) $msg .= $hw_addr;
      $s = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
      if ($s == false){
        echo "Error creating socket!\n";
        echo "Error code is '".socket_last_error($s)."' - " . socket_strerror(socket_last_error($s));
      } else {
        $opt_ret = socket_set_option($s, 1, 6, TRUE);
        if($opt_ret < 0){
          echo "setsockopt() failed, error: " . strerror($opt_ret) . "\n";
        }
        $e = socket_sendto($s, $msg, strlen($msg), 0, $addr, 2050);
        echo $e;
        socket_close($s);
        echo "Magic Packet sent (".$e.") to ".$addr.", MAC=".$mac;
     }
}
WakeOnLan('192.168.1.255', $_POST['mac']); 
