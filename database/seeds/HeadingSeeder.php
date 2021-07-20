<?php

use Illuminate\Database\Seeder;
use App\Heading;
class HeadingSeeder extends Seeder
{
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
            "Sweeper" => "Any 'catch all' clause",
            "Weighted floor area table or formulae" => "The part of the lease that defines a WFA table or how to calculate it"
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


