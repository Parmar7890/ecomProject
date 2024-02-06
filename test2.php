<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Date and Time Sorting</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div id="dates">
  <!-- <div>2024-02-05 08:00:00</div>
  <div>2024-02-03 10:30:00</div>
  <div>2024-02-06 15:45:00</div>
  <div>2024-02-01 12:15:00</div> -->
  <div>01/01/2020 12:2:20 PM</div>
  <div>05/05/2019 4:20:50 PM</div>
  <div>09/09/2023 6:60:30 AM</div>
  <div>10/20/2024 7:10:40 AM</div> 
</div>

<script>
  $(document).ready(function() {
    // Sort in ascending order
    $('#ascBtn').click(function() {
      var dates = $('#dates div').get();
      dates.sort(function(a, b) {
        return new Date($(a).text()) - new Date($(b).text());
      });
      $('#dates').empty().append(dates);
    });

    // Sort in descending order
    $('#descBtn').click(function() {
      var dates = $('#dates div').get();
      dates.sort(function(a, b) {
        return new Date($(b).text()) - new Date($(a).text());
      });
      $('#dates').empty().append(dates);
    });
  });
</script>

<button id="ascBtn">Sort Ascending</button>
<button id="descBtn">Sort Descending</button>

</body>
</html>
