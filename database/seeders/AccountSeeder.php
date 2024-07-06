<?php

namespace Database\Seeders;

use App\Models\Techso\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Account::create(['code' => 'g1', 'name' => 'ASSETS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => 'NULL', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g2', 'name' => 'LIABILITIES', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => 'NULL', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g3', 'name' => 'CURRENT ASSETS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '1', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g4', 'name' => 'NON CURRENT ASSETS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '1', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g5', 'name' => 'NON CURRENT LIABILITIES', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '2', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g6', 'name' => 'CURRENT LIABILITIES', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '2', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g7', 'name' => 'CASH & BANK', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '3', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g8', 'name' => 'INVENTORIES', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '3', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g9', 'name' => 'SUNDRY DEBTORS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '3', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g10', 'name' => 'OTHER CURRENT ASSETS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '3', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g11', 'name' => 'PROPERTY, PLANT AND EQUIPMENTS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '4', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g12', 'name' => 'VEHICLES', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '4', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g13', 'name' => 'CAPITAL ACCOUNTS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '5', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g14', 'name' => 'RESERVES & SURPLUS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '5', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g15', 'name' => 'RELATIVE PARTIES', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '5', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g16', 'name' => 'PROVISION FOR ACC. DEPRECIATION ON FIXED ASSETS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '5', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g17', 'name' => 'SUNDRY CREDITORS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '6', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g18', 'name' => 'OUTSTANDING EXPENSES', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '6', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g19', 'name' => 'FREIGHT & CUSTOMS PAYABLE', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '6', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g20', 'name' => 'INDIRECT TAX PAYABLE', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '6', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g21', 'name' => 'SUSPENSE ACCOUNTS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '6', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g22', 'name' => 'PROVISION FOR SLOW & NON MOVING STOCK', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '6', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g23', 'name' => 'SHORT TERM RESERVES & PROVISIONS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '6', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g24', 'name' => 'CASH IN HAND', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '7', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g25', 'name' => 'CASH AT BANK', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '7', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g26', 'name' => 'STOCK IN TRADE', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '8', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g27', 'name' => 'GOODS IN TRANSIT', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '8', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g28', 'name' => 'STAFF ADVANCES', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '10', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g29', 'name' => 'PREPAID EXPENSES', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '10', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g30', 'name' => 'DEPOSITS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '10', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g31', 'name' => 'OTHER RECEIVABLES & ASSETS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '10', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g32', 'name' => 'SHARE CAPITAL', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '13', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g33', 'name' => 'SHARE HOLDERS DRAWINGS ACCOUNT', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '13', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g34', 'name' => 'VAT PAYABLE ACCOUNTS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '20', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g35', 'name' => 'PROVISION FOR EMPLOYEES BENEFITS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '23', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g36', 'name' => 'PROVISION FOR BAD & DOUBTFUL DEBTORS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '23', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g37', 'name' => 'RESERVES FOR BRAND DEVELOPMENTS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '23', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g38', 'name' => 'PROVISION FOR RMA/GIT LOSS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '23', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g39', 'name' => 'PREPAID RENT', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '29', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g40', 'name' => 'PREPAID INSURANCES', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '29', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 'g41', 'name' => 'RENT DEPOSITS', 'local_name' => '', 'type' => 'GROUP', 'parent_id' => '30', 'is_default' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's42', 'name' => 'POS CASH', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '24', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's43', 'name' => 'MAIN CASH', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '24', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's44', 'name' => 'PETTY CASH', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '24', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's45', 'name' => 'BANK ACCOUNT 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '25', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's46', 'name' => 'BANK ACCOUNT 2', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '25', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's47', 'name' => 'INVENTORY - DIVISION 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '26', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's48', 'name' => 'INVENTORY - DIVISION 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '26', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's49', 'name' => 'INVENTORY - DIVISION 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '26', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's50', 'name' => 'GIT- DIVISION 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '27', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's51', 'name' => 'GIT- DIVISION 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '27', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's52', 'name' => 'CUSTOMER 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '9', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's53', 'name' => 'CUSTOMER 2', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '9', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's54', 'name' => 'CUSTOMER 3', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '9', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's55', 'name' => 'STAFF-STAFF NAME 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '28', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's56', 'name' => 'STAFF-STAFF NAME 2', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '28', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's57', 'name' => 'PREPAID RENT-SHOWROOM', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '39', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's58', 'name' => 'PREPAID RENT-ACCOMMODATION', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '39', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's59', 'name' => 'PREPAID INSURANCE-MONEY', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '40', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's60', 'name' => 'PREPAID INSURANCE-PROPERTY', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '40', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's61', 'name' => 'PREPAID INSURANCE-STAFF', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '40', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's62', 'name' => 'PREPAID INSURANCE-VEHICLES', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '40', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's63', 'name' => 'PREPAID LICENSE EXPENSE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '29', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's64', 'name' => 'PREPAID PRINTING & STATIONERY', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '29', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's65', 'name' => 'PREPAID LEGAL CHARGES', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '29', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's66', 'name' => 'PREPAID ELECTRICITY & WATER CHARGES', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '29', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's67', 'name' => 'SHOP RENT DEPOSIT', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '41', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's68', 'name' => 'LEAVE SETTLEMENT', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '31', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's69', 'name' => 'GENERAL ADVANCES', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '31', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's70', 'name' => 'REVALUATION ACCOUNT', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '31', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's71', 'name' => 'LEASEHOLD IMPROVEMENTS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '11', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's72', 'name' => 'ELECTRICAL FITTINGS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '11', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's73', 'name' => 'FURNITURES & FIXTURES', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '11', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's74', 'name' => 'COMPUTERS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '11', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's75', 'name' => 'EQUIPMENTS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '11', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's76', 'name' => 'VEHICLES 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '12', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's77', 'name' => 'PARTNERS SHARE CAPITAL', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '32', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's78', 'name' => 'DRAWINGS ACCOUNT', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '33', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's79', 'name' => 'LOSS FROM BRANCHES', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '14', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's80', 'name' => 'RELATIVE PARTIES 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '15', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's81', 'name' => 'RELATIVE PARTIES 2', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '15', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's82', 'name' => 'RELATIVE PARTIES 3', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '15', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's83', 'name' => 'PROVISION FOR ACC. DEPRECIATION- LEASEHOLD IMPROVEMENTS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '16', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's84', 'name' => 'PROVISION FOR ACC. DEPRECIATION- ELECTRICAL FITTINGS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '16', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's85', 'name' => 'PROVISION FOR ACC. DEPRECIATION- EQUIPMENTS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '16', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's86', 'name' => 'PROVISION FOR ACC. DEPRECIATION- FURNITURES & FIXTURES', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '16', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's87', 'name' => 'PROVISION FOR ACC. DEPRECIATION- COMPUTERS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '16', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's88', 'name' => 'PROVISION FOR ACC. DEPRECIATION- VEHICLE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '16', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's89', 'name' => 'SUPPLIER 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '17', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's90', 'name' => 'SUPPLIER 2', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '17', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's91', 'name' => 'SUPPLIER 3', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '17', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's92', 'name' => 'OUTSTANDING SALARY', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '18', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's93', 'name' => 'OUTSTANDING CONVEYANCE EXPENSE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '18', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's94', 'name' => 'OUTSTANDING AUDIT FEE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '18', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's95', 'name' => 'OUTSTANDING VISA EXPENSE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '18', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's96', 'name' => 'OUTSTANDING MEDICAL EXPENSE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '18', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's97', 'name' => 'OUTSTANDING INCENTIVES', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '18', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's98', 'name' => 'OUTSTANDING STAFF INCENTIVES - LOCAL STAFF', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '18', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's99', 'name' => 'OUTSTANDING EXPENSES-OTHERS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '18', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's100', 'name' => 'FUND FOR STAFF WELFARE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '18', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's101', 'name' => 'EXCHANGE DIFFERENCE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '18', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's102', 'name' => 'FREIGHT PAYABLE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '19', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's103', 'name' => 'OUTSTANDING WARRANTY EXPENSES', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '19', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's104', 'name' => 'OUTSTANDING ZAKAT FEE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '19', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's105', 'name' => 'VAT INPUT', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '34', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's106', 'name' => 'VAT OUTPUT', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '34', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's107', 'name' => 'VAT INPUT - OTHERS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '34', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's108', 'name' => 'VAT PAYABLE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '34', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's109', 'name' => 'VAT OUTPUT - OTHERS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '34', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's110', 'name' => 'SUSPENSE CASH', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '21', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's111', 'name' => 'PROVISION FOR DEAD & SLOW STOCK-DIVISION 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '22', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's112', 'name' => 'PROVISION FOR DEAD & SLOW STOCK-DIVISION 2', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '22', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's113', 'name' => 'PROVISION FOR DEAD & SLOW STOCK-DIVISION 3', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '22', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's114', 'name' => 'PROV FOR SALARY', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '35', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's115', 'name' => 'PROV FOR PASSAGE', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '35', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's116', 'name' => 'PROV FOR LEAVE SALARY', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '35', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's117', 'name' => 'PROV FOR GRATUITY', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '35', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's118', 'name' => 'PROV FOR LEAVE SALARY (LOCAL STAFF)', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '35', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's119', 'name' => 'PROV FOR GRATUITY (LOCAL STAFF)', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '35', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's120', 'name' => 'PROVISION FOR BAD AND DOUBTFUL DEBTS', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '36', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's121', 'name' => 'RESERVES FOR BRAND DEVELOPMENT', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '37', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's122', 'name' => 'PROV FOR RMA/GIT LOSS-DIVISION 1', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '38', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's123', 'name' => 'PROV FOR RMA/GIT LOSS-DIVISION 2', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '38', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Account::create(['code' => 's124', 'name' => 'PROV FOR RMA/GIT LOSS-DIVISION 3', 'local_name' => '', 'type' => 'SINGLE', 'parent_id' => '38', 'is_default' => 'NULL', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
    }
}
