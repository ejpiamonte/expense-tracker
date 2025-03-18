<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Expense Tracker Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root { font-size: 16px; }
        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            background-color: #F0F2F5;
            margin: 0; padding: 0;
            font-family: 'Arial', sans-serif;
        }
        .dashboard-container {
            background-color: #FFFFFF;
            border-radius: 1.25rem;
            box-shadow: 0 0.25rem 0.9375rem rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 90%;
            max-width: 25rem;
            text-align: center;
        }
        h1 { 
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #333;
        }
        canvas#expenseChart {
            max-width: 100% !important;        /* Full width within the container */
            max-width: 25rem;              /* 400px ≈ 25rem (based on 16px root font size) */
            max-height: 15.625rem !important; /* 250px ≈ 15.625rem */
        }
        table {
            font-size: 0.85rem;
            border-collapse: collapse;
            margin-top: 1rem;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 0.5rem;
            text-align: left;
            word-wrap: break-word;
        }
        .btn {
            font-size: 0.85rem;
            padding: 0.4rem 0.8rem;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 0.3rem;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }
        .btn:hover { background-color: #45a049; }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-danger:hover { background-color: #e53935; }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Expense Tracker Dashboard</h1>

        <canvas id="expenseChart"></canvas>

        <h2>Expense List</h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($expenses as $expense): ?>
            <tr>
                <td>
                    <span style="display: inline-block; width: 12px; height: 12px; background-color: <?= esc($expense['color']) ?>; border-radius: 50%; margin-right: 5px;"></span>
                    <?= esc($expense['title']) ?>
                </td>
                <td>&#8369;<?= esc($expense['amount']) ?></td>
                <td>
                    <a href="<?= base_url('expense/edit/' . $expense['id']) ?>" class="btn">Edit</a>
                    <a href="#" class="btn btn-danger" onclick="confirmDelete('<?= base_url('expense/delete/' . $expense['id']) ?>')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <a href="<?= base_url('expense/create') ?>" class="btn">Add New Expense</a>

        <?php 
        $chartDataArray = json_decode($chartData, true); // Decode JSON string into an array
        $totalExpense = array_sum($chartDataArray);      // Calculate total expenses
        ?>

        <script>
            const totalExpense = <?= $totalExpense ?>;

            // Custom Plugin for Percentage Labels
            const percentageLabelPlugin = {
                id: 'percentageLabelPlugin',
                afterDatasetsDraw(chart, args, options) {
                    const { ctx } = chart;
                    const dataset = chart.data.datasets[0].data;

                    dataset.forEach((value, index) => {
                        const bar = chart.getDatasetMeta(0).data[index];
                        const percentage = ((value / totalExpense) * 100).toFixed(1) + '%';

                        ctx.save();
                        ctx.fillStyle = '#333';
                        ctx.font = 'bold 12px Arial';
                        ctx.textAlign = 'center';

                        // Position text directly above the bar
                        ctx.fillText(percentage, bar.x, bar.y - 5);
                        ctx.restore();
                    });
                }
            };

            Chart.register(percentageLabelPlugin);

            const ctx = document.getElementById('expenseChart').getContext('2d');
            const expenseChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?= $chartLabels ?>,
                    datasets: [{
                        data: <?= $chartData ?>,
                        backgroundColor: <?= $chartColors ?>,
                        borderRadius: 90,
                        barThickness: 40
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: { display: false },
                        y: { display: false }
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: false }
                    }
                }
            });


            function confirmDelete(url) {
                if (confirm("Are you sure you want to delete this expense?")) {
                    window.location.href = url;
                }
            }
        </script>
    </div>
</body>
</html>
