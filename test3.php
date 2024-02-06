<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div>01/02/2019 10:12:20 AM</div>
  <div>01/02/2019 10:12:10 PM</div>
  <div>01/02/2017 12:14:30 AM</div>
  <div>01/02/2016 01:15:40 AM</div> 
  <button id="sortBtn">Sort Ascending</button>

  <script>
    // Select the div elements containing date and time
    const dateDivs = document.querySelectorAll('div');
   
    // Convert the div content to Date objects
    const dates = Array.from(dateDivs, div => {
        const parts = div.textContent.split(/[\/: ]/); 
        // console.log(parts);
        const formattedDate = `${parts[0]}/${parts[1]}/${parts[2]} ${parts[3]}:${parts[4]}:${parts[5]} ${parts[6]}`;
        // console.log(formattedDate);
        return new Date(formattedDate);
    
    });

    let ascendingOrder = true;

    // Function to update the divs with sorted dates
    function updateDivs(sortedDates) {
      sortedDates.forEach((date, index) => {
        const hours = date.getHours() % 12 || 12; // Get hours in 12-hour format
        const ampm = date.getHours() >= 12 ? 'PM' : 'AM'; // Determine AM or PM
        const formattedDate = `${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getDate().toString().padStart(2, '0')}/${date.getFullYear()} ${hours.toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}:${date.getSeconds().toString().padStart(2, '0')} ${ampm}`;
        dateDivs[index].textContent = formattedDate;
      });
    }

    // Event listener for sorting button
    document.getElementById('sortBtn').addEventListener('click', function() {
      const sortedDates = dates.slice().sort((a, b) => {
        if (ascendingOrder) {
          return a - b;
        } else {
          return b - a;
        }
      });
      updateDivs(sortedDates);
      ascendingOrder = !ascendingOrder;
      // Change button text based on sorting order
      this.textContent = ascendingOrder ? 'Sort Ascending' : 'Sort Descending';
    });
</script>
</body>
</html>
