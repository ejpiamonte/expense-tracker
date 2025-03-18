<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Expense</title>
    <style>
        body { display: flex; height: 100vh; justify-content: center; align-items: center; background-color: #F0F2F5; font-family: Arial, sans-serif; }
        .form-container { background-color: #FFFFFF; border-radius: 1.25rem; box-shadow: 0 0.25rem 0.9375rem rgba(0, 0, 0, 0.1); padding: 2rem; width: 100%; max-width: 20rem; }
        form { display: flex; flex-direction: column; gap: 1rem; }
        label { font-weight: bold; }
        input, textarea { width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 0.3rem; }
        button { background-color: #4CAF50; color: #fff; border: none; padding: 0.5rem; border-radius: 0.3rem; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add Expense</h1>

        <form method="post" action="<?= base_url('expense/store') ?>">
            <label>Title:</label>
            <input type="text" name="title" required>

            <label>Amount:</label>
            <input type="number" step="0.01" name="amount" required>

            <label>Date:</label>
            <input type="date" name="date" required>

            <label>Description:</label>
            <textarea name="description"></textarea>

            <label>Color:</label>
            <input type="color" name="color" value="<?= esc($expense['color'] ?? '#C8FACD') ?>">
            
            <button type="submit">Add Expense</button>
        </form>

    </div>
</body>
</html>






