<?php
namespace App\Models;

use CodeIgniter\Model;

class Expense extends Model
{
    protected $table = 'expenses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'amount', 'date', 'description', 'color'];
}
