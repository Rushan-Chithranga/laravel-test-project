<div>
    <canvas id="adminChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // document.addEventListener('livewire:load', function() {
    const adminCtx = document.getElementById('adminChart').getContext('2d');
    const adminData = @json($data);

    new Chart(adminCtx, {
        type: 'bar',
        data: {
            labels: adminData.labels,
            datasets: [{
                label: 'Admin Dataset',
                data: adminData.values,
                backgroundColor: [
                    'rgba(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'

                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',

                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    // });
</script>
