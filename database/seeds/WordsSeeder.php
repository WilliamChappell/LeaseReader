<?php

use Illuminate\Database\Seeder;
use App\Word;

class WordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $list[] = ['Gross Internal Area',
            'Gross Internal Ground Floor',
            'Weighted Floor Area',
            'Rateable value',
            'Renants proportion',
            'Fixed percentage'];

        $list[] = ['Certificate', 'Certified'];

        $list[] = [
            'On account',
            'quarterly',
            'in arrears',
            'annually',
            'monthly',
            'quarter days'
        ];

        $list[] = [
            'Managing',
            'agent',
            'managing company',
            'management fee',
            'management of services',
            'landlord fee'
        ];

        $list[] = [
            'The services'
        ];

        $list[] = [
            'Capped Amount',
            'RPI',
            'CPI',
            'Retail Price Index',
            'Consumer price index',
            'the index'
        ];

        $list[] = ['Car park', 'charging policy'];

        $list[] = ['Income', 'credited'];

        $list[] = ['Excluded items', 'exclusions'];

        $list[] = ['Square feet', 'Square meters'];

        $list[] = ['Marketing', 'Promotions', 'advertising'];

        $list[] = ['Service charge start', 'service charge commencing', 'service charge commencement'];

        $list[] = ['Sinking fund', 'reserve fund', 'future expenditure'];

        $list[] = ['Reasonable', 'proper', 'economical', 'efficient'];

        $list[] = ['Receipts', 'Vouchers', 'Evidence', 'invoices and receipts'];

        $list[] = ['Such further services', 'any other expenses'];

        $list[] = ['Tenants association', 'merchants association'];

        $list[] = ['Weighted Floor Area Matrix'];

        $list[] = ['Dispute', 'arbitration', 'third party'];

        $i = 1;
        foreach($list as $itemList){
            foreach($itemList as $item){
                DB::table('words')->insert([
                    'heading_id' => $i,
                    'word' => $item,
                    'created_at' => Carbon\Carbon::now(),
                    'created_by' => 1
                ]);
            }
            $i++;
        }
    }
}
