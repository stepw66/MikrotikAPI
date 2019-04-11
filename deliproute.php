<?php
session_start();
use PEAR2\Net\RouterOS;
require_once 'PEAR2/Autoload.php';
$client = new RouterOS\Client($_SESSION["ipaddress"], $_SESSION["username"], $_SESSION["password"]);
$util = new RouterOS\Util(
    $client
);
$util->setMenu('/ip route');
$del = $_GET['id'];
if($util->remove($del) > 0){
    echo "
    <script>
    document.location.href = 'showiproute.php';
    </script>
    ";
} else{
    echo "<script>
    alert('data gagal dihapus');
    document.location.href = 'showiproute.php';
    </script>";
}