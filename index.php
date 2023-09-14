<?php
  function DrawLine(int $number) {
      return str_repeat('*', $number);
  }

  function DrawStripedLine(int $number) {
      $output = '';
      for ($i = 0; $i < $number; $i++) {
          $output .= ($i % 2 == 0) ? '*' : '_';
      }
      return $output;
  }

  function DrawSquare($size) {
      $line = str_repeat('*', $size) . PHP_EOL;
      return str_repeat($line, $size);
  }

  function DrawParallelogram(int $number) {
      $output = '';
      for ($i = 0; $i < $number; $i++) {
          $output .= str_repeat('_', $number - $i - 1);
          $output .= str_repeat('*', $number);
          $output .= str_repeat('_', $i);
          $output .= PHP_EOL;
      }
      return $output;
  }

  function DrawTriangle(int $number) {
      $output = '';
      for ($i = 0; $i < $number; $i++) {
          $output .= str_repeat('*', $number - $i);
          $output .= str_repeat('_', $i);
          $output .= PHP_EOL;
      }
      return $output;
  }

  function DrawRTriangle(int $number) {
      $output = '';
      for ($i = 0; $i < $number; $i++) {
          $output .= str_repeat('*', $i + 1);
          $output .= str_repeat('_', $number - $i - 1);
          $output .= PHP_EOL;
      }
      return $output;
  }

  $line = $stripedLine = $square = $parallelogram = $triangle = $rtriangle = '';

  if (isset($_GET['number'])) {
      $number = intval($_GET['number']);
      $line = DrawLine($number);
      $stripedLine = DrawStripedLine($number);
      $square = DrawSquare($number);
      $parallelogram = DrawParallelogram($number);
      $triangle = DrawTriangle($number);
      $rtriangle = DrawRTriangle($number);
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Theolo Cinco</title>
</head>
<body>
    <div>
        <h1>PHP: Web Development Lab</h1>
        
        <form method="get">
            <input 
              type="number" 
              name="number" 
              placeholder="Enter a number" 
              required
              min="3"
              value="<?php echo $number ?>">
            <input type="submit" value="Submit">
        </form>
    </div>

    <?php if($_GET['number'] % 2 == 0): ?>
      <p>Error: Number has to be odd!</p>
    <?php endif; ?>

    <?php if(isset($_GET['number']) && $_GET['number'] % 2 != 0): ?>
      <div>
        <div>
            <p>Line:</p>
            <?php echo nl2br($line); ?>
        </div>
        <div>
            <p>Striped Line:</p>
            <?php echo nl2br($stripedLine); ?>
        </div>
        <div>
            <p>Square:</p>
            <?php echo nl2br($square); ?>
        </div>
        <div>
            <p>Parallelogram:</p>
            <?php echo nl2br($parallelogram); ?>
        </div>
        <div>
            <p>Triangle:</p>
            <?php echo nl2br($triangle); ?>
        </div>
        <div>
            <p>Reverse Triangle:</p>
            <?php echo nl2br($rtriangle); ?>
        </div>
      </div>
    <?php endif; ?>
</body>
</html>