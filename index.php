<?php
$user_input = isset($_GET["user_input"]) ? $_GET["user_input"] : 7;
$user_input_correct = false;
$type_correct = false;

if ($user_input >= 3 && $user_input % 2 != 0) {
  $user_input_correct = true;
}

if (is_numeric($user_input) == true) {
  $type_correct = true;
}

function DrawLine(int $number)
{
  $pattern = "";

  for ($i = 0; $i < $number; $i++) {
    $pattern .= "*";
  }

  return $pattern;
}

function DrawStripedLine(int $number)
{
  $pattern = "";

  for ($i = 0; $i < $number; $i++) {
    if ($i % 2 == 0) {
      $pattern .= "*";
    } else {
      $pattern .= "_";
    }
  }

  return $pattern;
}

function DrawSquare(int $number)
{
  $pattern = "";

  for ($i = 0; $i < $number; $i++) {
    for ($j = 0; $j < $number; $j++) {
      $pattern .= "*";
    }
    $pattern .= "<br>";
  }

  return $pattern;
}

function DrawParallelogram(int $number)
{
  $pattern = "";

  for ($i = 0; $i < $number; $i++) {
    for ($j = $number; $j > $i + 1; $j--) {
      $pattern .= "_";
    }
    for ($j = $number; $j > 0; $j--) {
      $pattern .= "*";
    }
    for ($j = 0; $j <= $i - 1; $j++) {
      $pattern .= "_";
    }
    $pattern .= "<br>";
  }

  return $pattern;
}

function DrawTriangle(int $number)
{
  $pattern = "";

  for ($i = 0; $i < $number; $i++) {
    for ($j = $number; $j > $i; $j--) {
      $pattern .= "*";
    }
    for ($j = 0; $j <= $i - 1; $j++) {
      $pattern .= "_";
    }
    $pattern .= "<br>";
  }

  return $pattern;
}

function DrawReverseTriangle(int $number)
{
  $pattern = "";

  for ($i = 0; $i < $number; $i++) {
    for ($j = 0; $j <= $i; $j++) {
      $pattern .= "*";
    }
    for ($j = $number; $j > $i; $j--) {
      $pattern .= "_";
    }
    $pattern .= "<br>";
  }

  return $pattern;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zy Shapes</title>
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous"
  >
  <style>
    .box {
      border: 1px solid rgba(112.520718,44.062154,249.437846, 0.3);
    }
    
    form .box {
      margin: 5px 0;
    }
  </style>
</head>
<body>
  <form class="container box my-sm-5 p-2">

    <!-- Display if all checks pass -->
    <?php if ($user_input_correct && $type_correct): ?>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="box container">
            <h5>Line:</h5>
            <?php echo DrawLine($user_input); ?>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="box container">
            <h5>Striped Line:</h5>
            <?php echo DrawStripedLine($user_input); ?>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="box container">
            <h5>Square:</h5>
            <?php echo DrawSquare($user_input); ?>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="box container">
            <h5>Parallelogram:</h5>
            <?php echo DrawParallelogram($user_input) ?>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="box container">
            <h5>Triangle:</h5>
            <?php echo DrawTriangle($user_input) ?>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="box container">
            <h5>Reverse Triangle:</h5>
            <?php echo DrawReverseTriangle($user_input) ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- Error messages -->
    <?php if ($type_correct == false): ?>
      <div class="d-flex justify-content-center py-3 px-2">
        <h5>Invalid input</h5>
      </div>
    <?php endif; ?>
    <?php if ($user_input_correct == false): ?>
      <div class="d-flex justify-content-center py-3 px-2">
        <h5>Number must be odd and it must be higher than or equal to 3</h5>
      </div>
    <?php endif; ?>

    <!-- Input -->
    <div class="row d-flex justify-content-center my-2">
      <div class="input-group">
        <span class="input-group-text">Num Input:</span>
        <input type="number" class="form-control" name="user_input" value='<?php echo $user_input?>' min="3" />
        <button class="btn btn-outline-secondary" type="submit">Draw Shapes</button>
      </div>
    </div>
    
  </form>
</body>
</html>