--TEST--
basic array_ufill_keys test
--FILE--
<?php
	var_dump(array_ufill_keys('test', function($k) { return 1; }));
	var_dump(array_ufill_keys([], 'test'));
	var_dump(array_ufill_keys([], new stdClass()));
	var_dump(array_ufill_keys([], function($k) { return 1; }));
	var_dump(array_ufill_keys(['foo', 'bar'], function($k) { return NULL; }));
	var_dump(array_ufill_keys(['5', 'foo', 10, 1.23], function($k) { return $k; }));
	var_dump(array_ufill_keys(['test', TRUE, 10, 100], function($k) { return "key{$k}"; }));
?>
--EXPECTF--
Warning: array_ufill_keys() expects parameter 1 to be array, string given in %s on line %d
NULL

Warning: array_ufill_keys() expects parameter 2 to be a valid callback, function 'test' not found or invalid function name in %s on line %d
NULL

Warning: array_ufill_keys() expects parameter 2 to be a valid callback, no array or string given in %s on line %d
NULL
array(0) {
}
array(2) {
  ["foo"]=>
  NULL
  ["bar"]=>
  NULL
}
array(4) {
  [5]=>
  string(1) "5"
  ["foo"]=>
  string(3) "foo"
  [10]=>
  int(10)
  ["1.23"]=>
  float(1.23)
}
array(4) {
  ["test"]=>
  string(7) "keytest"
  [1]=>
  string(4) "key1"
  [10]=>
  string(5) "key10"
  [100]=>
  string(6) "key100"
}
