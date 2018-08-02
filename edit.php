
<?php
try {
  print "this is our try block\n";
  throw new RuntimeException();
} catch (LogicException $e) {
  print "something logical went wrong\n";
} catch (BadMethodCallException $e) {
  print "something made a bad method call\n";
} finally {
  print "This part is always executed\n";
}
 ?>
