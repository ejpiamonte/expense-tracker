<?php
namespace App\Controllers;

use App\Models\Expense;
use CodeIgniter\Controller;

class ExpenseController extends Controller
{
    public function index()
    {
        $model = new Expense();
        $data['expenses'] = $model->findAll();

        // Dynamically extract expense data for the chart
        $data['chartData'] = json_encode(array_column($data['expenses'], 'amount'));
        $data['chartLabels'] = json_encode(array_column($data['expenses'], 'title'));

        return view('dashboard', $data); // Load the dashboard view
    }

    public function create()
    {
        return view('expense/create');
    }

        public function store()
    {
        $model = new Expense();
        $model->insert([
            'title'       => $this->request->getPost('title'),
            'amount'      => $this->request->getPost('amount'),
            'date'        => $this->request->getPost('date'),
            'description' => $this->request->getPost('description'),
            'color'       => $this->request->getPost('color') ?: '#C8FACD', // Default color if not set
        ]);

        return redirect()->to('/');
    }


    public function delete($id)
    {
        $model = new Expense();
        $model->delete($id);

        return redirect()->to('/');
    }

        public function edit($id)
    {
        $model = new Expense();
        $data['expense'] = $model->find($id);

        if (!$data['expense']) {
            return redirect()->to('/')->with('error', 'Expense not found');
        }

        return view('expense/edit', $data);
    }

    public function update($id)
    {
        $model = new Expense();
        
        $data = [
            'title'       => $this->request->getPost('title'),
            'amount'      => $this->request->getPost('amount'),
            'date'        => $this->request->getPost('date'),
            'description' => $this->request->getPost('description'),
            'color'       => $this->request->getPost('color') ?: '#C8FACD', // Default color if not set
        ];

        $model->update($id, $data); // Missing model update logic fixed

        return redirect()->to('/');
    }

    public function updateColor()
{
    $color = $this->request->getPost('color');

    // Store the color in the session to persist across refreshes
    session()->set('chartColor', $color);

    return redirect()->to('/')->with('success', 'Dashboard color updated successfully!');
}

public function dashboard()
{
    $model = new Expense(); // Fix this by adding the model instantiation
    $expenses = $model->findAll();

    $chartLabels = [];
    $chartData = [];
    $chartColors = [];

    foreach ($expenses as $expense) {
        $chartLabels[] = $expense['title'];
        $chartData[] = $expense['amount'];
        $chartColors[] = $expense['color'] ?? '#C8FACD'; // Default color if none is set
    }

    $data = [
        'expenses' => $expenses,
        'chartLabels' => json_encode($chartLabels),
        'chartData' => json_encode($chartData),
        'chartColors' => json_encode($chartColors)
    ];

    return view('dashboard', $data);
}




}
?>