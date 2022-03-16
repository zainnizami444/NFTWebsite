<!DOCTYPE html>
<?php
  $date1 = new DateTime("2022-03-15");  //current date or any date
  $date2 = new DateTime("2022-12-31");   //Future date
  $diff = $date2->diff($date1)->format("%a");  //find difference
  $days = intval($diff);   //rounding days
  echo $days;
  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<div id="getting-started"></div>
    <script src="Bootstrap/js/jquery.js"></script>
    <script src="Bootstrap/js/jquery.countdown.js"></script>
    <script >
        
  $("#getting-started")
  .countdown("<?php echo $row['End_date']?>", function(event) {
    $(this).text(
      event.strftime('%D days %H:%M:%S')
    );
  });

    </script>
    
</body>
</html>