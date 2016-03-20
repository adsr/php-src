--TEST--
basic array_ufill test
--FILE--
<?php
	var_dump(array_ufill(-1, -1, -1));
	var_dump(array_ufill(-1, -1, function($k) { return 1; }));
	var_dump(array_ufill(-1, 0, function($k) { return 1; }));
	var_dump(array_ufill(0, 0, function($k) { return 1; }));
	var_dump(array_ufill(0, 1, function($k) { return $k; }));
	var_dump(array_ufill(0, 3, function($k) { return $k; }));
	var_dump(array_ufill(3, 3, function($k) { return $k; }));
	var_dump(array_ufill(0, 3, function($k) { return $k*2; }));
	var_dump(array_ufill(-3, 3, function($k) { return "{$k}"; })); // Weird, but consistent with array_fill
?>
--EXPECTF--
Warning: array_ufill() expects parameter 3 to be a valid callback, no array or string given in %s on line %d
NULL

Warning: array_ufill(): Number of elements can't be negative in %s on line %d
bool(false)
array(0) {
}
array(0) {
}
array(1) {
  [0]=>
  int(0)
}
array(3) {
  [0]=>
  int(0)
  [1]=>
  int(1)
  [2]=>
  int(2)
}
array(3) {
  [3]=>
  int(3)
  [4]=>
  int(4)
  [5]=>
  int(5)
}
array(3) {
  [0]=>
  int(0)
  [1]=>
  int(2)
  [2]=>
  int(4)
}
array(3) {
  [-3]=>
  string(2) "-3"
  [0]=>
  string(2) "-2"
  [1]=>
  string(2) "-1"
}
