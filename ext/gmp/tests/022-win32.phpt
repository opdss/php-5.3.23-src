--TEST--
gmp_gcdext() basic tests
--SKIPIF--
<?php if (!extension_loaded("gmp")) print "skip"; 
if(substr(PHP_OS, 0, 3) != 'WIN' ) {
    die('skip windows only test');
}
?>
--FILE--
<?php

$n = gmp_init("34293864345");
$n1 = gmp_init("23434293864345");

$a = array(
	array(123,45),
	array(4341,9734),
	array(23487,333),
	array(-234234,-123123),
	array(-100,-2234),
	array(345,"34587345"),
	array(345,"0"),
	array("345556456",345873),
	array("34545345556456","323432445873"),
	array($n, $n1),
	);

foreach ($a as $val) {
	$r = gmp_gcdext($val[0],$val[1]);
	var_dump(gmp_strval($r['g']));
	var_dump(gmp_strval($r['s']));
	var_dump(gmp_strval($r['t']));
}

var_dump(gmp_gcdext($val[0],array()));
var_dump(gmp_gcdext(array(),array()));
var_dump(gmp_gcdext(array(),array(),1));
var_dump(gmp_gcdext(array()));
var_dump(gmp_gcdext());

echo "Done\n";
?>
--EXPECTF--	
string(1) "3"
string(2) "41"
string(4) "-112"
string(1) "1"
string(4) "-805"
string(3) "359"
string(1) "3"
string(2) "32"
string(5) "-2257"
string(4) "3003"
string(3) "-10"
string(2) "19"
string(1) "2"
string(2) "67"
string(2) "-3"
string(2) "15"
string(7) "-601519"
string(1) "6"
string(3) "345"
string(1) "1"
string(1) "0"
string(1) "1"
string(5) "84319"
string(9) "-84241831"
string(1) "1"
string(12) "167180205823"
string(15) "-17856272782919"
string(3) "195"
string(15) "-23387298979862"
string(11) "34225091793"

Warning: gmp_gcdext(): Unable to convert variable to GMP - wrong type in %s on line %d
bool(false)

Warning: gmp_gcdext(): Unable to convert variable to GMP - wrong type in %s on line %d
bool(false)

Warning: gmp_gcdext() expects exactly 2 parameters, 3 given in %s on line %d
NULL

Warning: gmp_gcdext() expects exactly 2 parameters, 1 given in %s on line %d
NULL

Warning: gmp_gcdext() expects exactly 2 parameters, 0 given in %s on line %d
NULL
Done

