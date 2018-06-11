<?php

  /* Begin Unit Testing Here */


  /* End Unit Testing Here */
  /* DO NOT ADD UNIT TESTS BEYOND THIS COMMENT */

  echo 'All test cases passed. Congratulations.';

  function assertTrue($case, $message = 'A case was false!') {
    if(!$case) {
      echo '<b>Test Case Failed for assertTrue: ',$message,'</b>';
      exit();
    }
  }

  function assertFalse($case, $message = 'A case was true!') {
    if($case) {
      echo '<b>Test Case Failed for assertFalse: ',$message,'</b>';
      exit();
    }
  }

 ?>
