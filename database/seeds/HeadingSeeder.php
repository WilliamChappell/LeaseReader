<?php

use Illuminate\Database\Seeder;
use App\Heading;
class HeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            "Apportionment" => "How the apportionment is defined for the scheme",
            "Certification" => "How the landlord intends to certify the scheme",
            "Service Charge Frequency" => "How often the service charge is due to be paid",
            "Management Fee" => "How much money the management company can take as a fee",
            "Recoverable services" => "Any lists of recoverable services",
            "Caps" => "If there are any caps for the service charge",
            "Car Park" => "How the car parks incomes or costs generated is due to be managed",
            "Deductions" => "Any deductions or contributions listed",
            "Exclusions" => "Any services that are excluded from the service charge",
            "Floor Area" => "The floor area for the scheme or for the property",
            "Marketing" => "Any previsions for marketing or promotions",
            "Service Charge Start Date" => "The date the service charge is applicable from",
            "Sinking Fund" => "If the lease specifies a sinking or reserve fund or for any future expenditure",
            "Service charge costs" => "Defines if the costs should be economical, effecient, proper etc",
            "Receipts and vouchers" => "The period in which the tenant has to inspect all receipts that apply to the service charge",
            "Sweeper" => "Any 'catch all' clause",
            "Tenant’s or merchant’s association" => "If the marketing is done though a tenants or merchants associantion",
            "Weighted floor area table or formulae" => "The part of the lease that defines a WFA table or how to calculate it",
            "Third Party" => "Any clauses for third party arbitration etc"
        ];

        foreach($list as $key => $desc){
            DB::table('headings')->insert([
                'heading_name' => $key,
                'description' => $desc,
                'created_at' => Carbon\Carbon::now(),
                'created_by' => 1
            ]);
        }
    }
}
