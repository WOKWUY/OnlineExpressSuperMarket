<!-- /* --------------------------------- ORDER -------------------------------- */ -->
<canvas id="orders"></canvas>
<script>
  const order = document.getElementById('orders');
  new Chart(order, {
    type: 'line',
    data: {
      labels: <?= json_encode($data['date']) ?>,
      datasets: [{
        label: 'Order',
        fill: false,
        data: <?= json_encode($data['orderTotal']) ?>,
        borderWidth: 1,
        borderColor: 'rgba(75, 192, 192, 1)', // Màu sắc của đường
        pointBackgroundColor: 'rgba(75, 192, 192, 1)', // Màu nền của điểm
        pointBorderColor: 'rgba(75, 192, 192, 1)', // Màu đường viền điểm
        pointRadius: 5, // Kích thước của điểm
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<!-- /* --------------------------------- ORDER -------------------------------- */ -->
<br>
<!-- /* --------------------------------- REVENUE -------------------------------- */ -->
<canvas id="revenue"></canvas>
<script>
  const revenue = document.getElementById('revenue');
  new Chart(revenue, {
    type: 'line',
    data: {
      labels: <?= json_encode($data['date']) ?>,
      datasets: [{
        label: 'Revenue',
        fill: false,
        data: <?= json_encode($data['total']) ?>,
        borderWidth: 1,
        borderColor: 'green', // Màu sắc của đường
        pointBackgroundColor: 'green', // Màu nền của điểm
        pointBorderColor: 'green', // Màu đường viền điểm
        pointRadius: 5, // Kích thước của điểm
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<!-- /* --------------------------------- REVENUE -------------------------------- */ -->
