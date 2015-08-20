<?php

$p = new UserData();
$p->name = $_POST['name'];
$p->email = $_POST['email'];
$p->password = sha1(md5($_POST['password']));
$p->usertype_id = 1;
$p->add();
print "<script>window.location='index.php?view=login';</script>";


?>