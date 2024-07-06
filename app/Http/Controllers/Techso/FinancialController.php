<?php

namespace App\Http\Controllers\Techso;

use App\Http\Controllers\Controller;
use App\Models\Techso\Account;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    private $head_name = 'Products';
    private $route_name = 'products';
    public function ledgerIndex()
    {
        $accounts = Account::all();

        return view('back_end.techso.financial.ledgers.index')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'accounts' => $accounts,
            ]
        );
    }
    public function ledgerCreate()
    {
        $accounts = Account::all();

        return view('back_end.techso.financial.ledgers.create')->with(
            [
                'head_name' => $this->head_name,
                'route_name' => $this->route_name,
                'accounts' => $accounts,
            ]
        );
    }
}
