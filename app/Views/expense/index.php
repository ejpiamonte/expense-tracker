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
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .dashboard-container { 
            background-color: #FFFFFF;
            border-radius: 1.25rem; 
            box-shadow: 0 0.25rem 0.9375rem rgba(0, 0, 0, 0.1); 
            padding: 2rem;
            width: 90%;
            max-width: 24rem;
            text-align: center;
        }
        h1, h2 { 
            font-size: 1.4rem; 
            margin-bottom: 1rem; 
            color: #333; 
        }
        canvas { 
            width: 100% !important; 
            height: 16rem !important; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 1rem; 
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 0.5rem; 
            text-align: left; 
        }
        .btn { 
            padding: 0.4rem 0.8rem; 
            background-color: #4CAF50; 
            color: #fff; 
            border: none; 
            border-radius: 0.3rem; 
            cursor: pointer; 
            text-decoration: none;
        }
        .btn-danger { background-color: #f44336; }
        .btn-container { margin-top: 1rem; }
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
                <td>$<?= esc($expense['amount']) ?></td>
                <td>
                    <a href="<?= base_url('expense/edit/' . $expense['id']) ?>" class="btn">Edit</a>
                    <a href="<?= base_url('expense/delete/' . $expense['id']) ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="btn-container">
            <a href="<?= base_url('expense/create') ?>" class="btn">Add New Expense</a>
        </div>

        <script>
            const ctx = document.getElementById('expenseChart').getContext('2d');
            const expenseChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Shopping', 'Gifts', 'Food'],
                    datasets: [{
                        label: 'Expenses',
                        data: [498.50, 344.45, 230.50],
                        backgroundColor: ['#C8FACD', '#D0F2FF', '#FFE7D9'],
                        borderRadius: 10
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });
        </script>
    </div>
</body>
</html>
