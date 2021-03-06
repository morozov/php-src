--TEST--
Test function pcntl_rfork() with no wait flag.
--SKIPIF--
<?php
	if (!extension_loaded('pcntl')) die('skip pcntl extension not available');
	elseif (!extension_loaded('posix')) die('skip posix extension not available');
  if (!function_exists('pcntl_rfork')) die('skip pcntl_rfork unavailable');
?>
--FILE--
<?php
echo "*** Test by with child not reporting to the parent ***\n";

$pid = pcntl_rfork(RFNOWAIT|RFTSIGZMB,SIGUSR1);
if ($pid > 0) {
	var_dump($pid);
} else {
	var_dump($pid);
  sleep(2); // as the child does not wait so we see its "pid"
}
?>
--EXPECTF--
*** Test by with child not reporting to the parent ***
int(%d)
int(0)
