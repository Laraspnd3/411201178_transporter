<div>
    <canvas id="donutChart" width="400" height="400"></canvas>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        var labels = @json($labels);
        var values = @json($values);

        var ctx = document.getElementById('donutChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        // Tambahkan warna sesuai kebutuhan
                    ],
                }]
            },
            options: {
                responsive: true,
            },
        });
    });
</script>
@endpush
