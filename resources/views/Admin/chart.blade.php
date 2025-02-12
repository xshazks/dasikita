<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js di Laravel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>

    <script>
        fetch('/chart-data')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('myChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar', // Ganti dengan chart yang kamu mau (line, pie, dll)
                    data: {
                        labels: data.labels, // Label dari data yang diambil
                        datasets: [{
                            label: 'Jumlah Data',
                            data: data.data, // Data untuk chart
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    }
                });
            })
            .catch(error => console.error('Error:', error));
    </script>
</body>
</html>
