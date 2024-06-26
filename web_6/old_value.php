<?php
include('../password.php');
$db = new PDO('mysql:host=localhost;dbname=u67326', $user, $pass,
[PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$uid = $_SESSION['uid'];
$sth = $db->prepare("SELECT * FROM form where id = $uid");
$sth->execute();
$user = $sth->fetchAll();
$values['fio'] = strip_tags($user[0]['fio']);
$values['tel'] = strip_tags($user[0]['tel']);
$values['email'] = strip_tags($user[0]['email']);
$pos1 = strpos(strip_tags($user[0]['date']),'.');
$values['day']=strip_tags(intval(substr($user[0]['date'], 0, $pos1)));

$pos2 = strrpos(strip_tags($user[0]['date']),'.');
$values['month']=strip_tags(intval(substr($user[0]['date'], $pos1 + 1, $pos2 - $pos1 - 1)));
$values['year']=strip_tags(intval(substr($user[0]['date'], $pos2 + 1, 4)));
$values['radio1'] = strip_tags($user[0]['gender']);

$sth = $db->prepare("SELECT idlang FROM form_lang where iduser = $uid");
$sth->execute();
$lang = $sth->fetchAll();
$values['lang'] = array();
foreach($lang as $l) {
  array_push($values['lang'], $l['idlang']);
}
$values['bio'] = strip_tags($user[0]['bio']);
$values['check-1'] = strip_tags($user[0]['checkbox']);
