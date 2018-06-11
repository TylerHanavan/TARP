<?php

  function assertTrue($case, $message = 'A case was false!') {
    if(!$case) $passed = false;
    echo '<b>Test Case Failed for assertTrue: ',$message,'</b>';
    exit();
  }

 ?>
