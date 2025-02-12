const data = [
    { kecamatan: "Bandung Kulon", realisasi2023: 96.7, realisasi2024: 96.7 },
    { kecamatan: "Babakan Ciparay", realisasi2023: 76.1, realisasi2024: 76.1 },
    { kecamatan: "Bojongloa Kaler", realisasi2023: 58.3, realisasi2024: 58.3 },
    { kecamatan: "Bojongloa Kidul", realisasi2023: 96.2, realisasi2024: 96.2 },
    { kecamatan: "Astananyar", realisasi2023: 74.3, realisasi2024: 74.3 },
    { kecamatan: "Regol", realisasi2023: 60.1, realisasi2024: 60.1 },
    { kecamatan: "Lengkong", realisasi2023: 91.2, realisasi2024: 91.2 },
    { kecamatan: "Bandung Kidul", realisasi2023: 83.4, realisasi2024: 83.4 },
    { kecamatan: "Buahbatu", realisasi2023: 63.1, realisasi2024: 63.1 },
    { kecamatan: "Rancasari", realisasi2023: 100.0, realisasi2024: 100.0 },
    { kecamatan: "Gedebage", realisasi2023: 89.5, realisasi2024: 89.5 },
    { kecamatan: "Cibiru", realisasi2023: 85.9, realisasi2024: 85.9 },
    { kecamatan: "Panyileukan", realisasi2023: 86.3, realisasi2024: 86.3 },
    { kecamatan: "Ujung Berung", realisasi2023: 92.6, realisasi2024: 92.6 },
    { kecamatan: "Cinambo", realisasi2023: 100.0, realisasi2024: 100.0 },
    { kecamatan: "Arcamanik", realisasi2023: 100.0, realisasi2024: 100.0 },
    { kecamatan: "Antapani", realisasi2023: 100.0, realisasi2024: 100.0 },
    { kecamatan: "Mandalajati", realisasi2023: 87.3, realisasi2024: 87.3 },
    { kecamatan: "Kiaracondong", realisasi2023: 80.1, realisasi2024: 80.1 },
    { kecamatan: "Batununggal", realisasi2023: 89.5, realisasi2024: 89.5 },
    { kecamatan: "Sumur Bandung", realisasi2023: 36.7, realisasi2024: 36.7 },
    { kecamatan: "Andir", realisasi2023: 77.9, realisasi2024: 77.9 },
    { kecamatan: "Cicendo", realisasi2023: 100.0, realisasi2024: 100.0 },
    { kecamatan: "Bandung Wetan", realisasi2023: 94.9, realisasi2024: 94.9 },
    { kecamatan: "Cibeunying Kidul", realisasi2023: 85.5, realisasi2024: 85.5 },
    { kecamatan: "Cibeunying Kaler", realisasi2023: 87.1, realisasi2024: 87.1 },
    { kecamatan: "Coblong", realisasi2023: 88.2, realisasi2024: 88.2 },
    { kecamatan: "Sukajadi", realisasi2023: 100.0, realisasi2024: 100.0 },
    { kecamatan: "Sukasari", realisasi2023: 77.7, realisasi2024: 77.7 },
    { kecamatan: "Cidadap", realisasi2023: 66.2, realisasi2024: 66.2 },
];

// Mengambil label dan nilai dari data
const labels = data.map(item => item.kecamatan);
const realisasi2023 = data.map(item => item.realisasi2023);
const realisasi2024 = data.map(item => item.realisasi2024);

// Membuat Line Chart
const lineCtx = document.getElementById('lineChart').getContext('2d');
const lineChart = new Chart(lineCtx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Realisasi 2023',
                data: realisasi2023,
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                fill: false
            },
            {
                label: 'Realisasi 2024',
                data: realisasi2024,
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: false
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Persentase (%)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Kecamatan'
                }
            }
        }
    }
});
