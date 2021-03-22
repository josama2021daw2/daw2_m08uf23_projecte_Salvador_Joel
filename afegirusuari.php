<?php
    require 'vendor/autoload.php';
    use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;

	ini_set('display_errors', 0);
	if ($_POST['usr'] && $_POST['ou'] && $_POST['uidnumberform'] && $_POST['gidnumberform'] && $_POST['homedirectory'] && $_POST['shell'] 
	    && $_POST['cn'] && $_POST['sn'] && $_POST['givennameform'] && $_POST['postaladress'] && $_POST['mobileform'] && $_POST['telephonenumber']
	    && $_POST['titleform'] && $_POST['descriptionform']){
	    
	    $uid=''.$_POST['usr'];
	    $unorg=''.$_POST['ou'];
	    $num_id=$_POST['uidnumberform'];
	    $grup=$_POST['gidnumberform'];
	    $dir_pers=''.$_POST['homedirectory'];
	    $sh=''.$_POST['shell'];
	    $cn=''.$_POST['cn'];
	    $sn=''.$_POST['sn'];
	    $nom=''.$_POST['givennameform'];
	    $mobil=''.$_POST['mobileform'];
	    $adressa=''.$_POST['postaladress'];
	    $telefon=''.$_POST['telephonenumber'];
	    $titol=''.$_POST['titleform'];
	    $descripcio=''.$_POST['descriptionform'];
    	$objcl=array('inetOrgPerson','organizationalPerson','person','posixAccount','shadowAccount','top');
    	
    	$domini = 'dc=fjeclot,dc=net';
    	$opcions = [
            'host' => 'zend-josama.fjeclot.net',
    		'username' => "cn=admin,$domini",
       		'password' => 'fjeclot',
       		'bindRequiresDn' => true,
    		'accountDomainName' => 'fjeclot.net',
       		'baseDn' => 'dc=fjeclot,dc=net',
        ];	
    	$ldap = new Ldap($opcions);
    	$ldap->bind();
    	$nova_entrada = [];
    	Attribute::setAttribute($nova_entrada, 'objectClass', $objcl);
    	Attribute::setAttribute($nova_entrada, 'uid', $uid);
    	Attribute::setAttribute($nova_entrada, 'uidNumber', $num_id);
    	Attribute::setAttribute($nova_entrada, 'gidNumber', $grup);
    	Attribute::setAttribute($nova_entrada, 'homeDirectory', $dir_pers);
    	Attribute::setAttribute($nova_entrada, 'loginShell', $sh);
    	Attribute::setAttribute($nova_entrada, 'cn', $cn);
    	Attribute::setAttribute($nova_entrada, 'sn', $sn);
    	Attribute::setAttribute($nova_entrada, 'givenName', $nom);
    	Attribute::setAttribute($nova_entrada, 'mobile', $mobil);
    	Attribute::setAttribute($nova_entrada, 'postalAddress', $adressa);
    	Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telefon);
    	Attribute::setAttribute($nova_entrada, 'title', $titol);
    	Attribute::setAttribute($nova_entrada, 'description', $descripcio);
    	$dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
    	if($ldap->add($dn, $nova_entrada)) echo "Usuari creat";	
	}
?>
<html>
    <head>
    <title>
    AFEGINT DADES D'USUARIS DE LA BASE DE DADES LDAP
    </title>
    </head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <body>
    	<form action="http://zend-josama.fjeclot.net/daw2_m08uf23_projecte_Salvador_Joel/afegirusuari.php" method="POST">
            uid: <input type="text" name="usr"><br>
            Unitat organitzativa: <input type="text" name="ou"><br>
            Uidnumber: <input type="number" name="uidnumberform"><br>
            Gidnumber: <input type="number" name="gidnumberform"><br>
        	Directori personal: <input type="text" name="homedirectory"><br>
        	Shell: <input type="text" name="shell"><br>
        	cn: <input type="text" name="cn"><br>
        	sn: <input type="text" name="sn"><br>
        	Given name: <input type="text" name="givennameform"><br>
        	Postal Adress: <input type="text" name="postaladress"><br>
        	Mobile: <input type="text" name="mobileform"><br>
        	Telephone number: <input type="text" name="telephonenumber"><br>
        	Title: <input type="text" name="titleform"><br>
        	Description: <input type="text" name="descriptionform"><br>
            <input type="submit"/>
            <input type="reset"/>
		</form>
		<a href="http://zend-josama.fjeclot.net/daw2_m08uf23_projecte_Salvador_Joel/menu.php">Torna al menu</a>
	</body>
</html>