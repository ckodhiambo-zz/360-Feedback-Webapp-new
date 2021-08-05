<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        Company::firstorcreate([
            'name' => 'Centum Business Solutions'
        ]);
        Company::firstorcreate([
            'name' => 'Centum Capital'
        ]);
        Company::firstorcreate([
            'name' => 'Centum Investment Company PLC'
        ]);
        Company::firstorcreate([
            'name' => 'Centum Real Estate'
        ]);
        Company::firstorcreate([
            'name' => 'GreenBlade Growers Limited'
        ]);
        Company::firstorcreate([
            'name' => 'Nabo Capital Limited'
        ]);
        Company::firstorcreate([
            'name' => 'Pearl Marina Estates Limited'
        ]);
        Company::firstorcreate([
            'name' => 'Tier Data Limited'
        ]);
        Company::firstorcreate([
            'name' => 'Tribus'
        ]);

        Company::firstorcreate([
            'name' => 'Two Rivers Lifestyle Center'
        ]);
        Company::firstorcreate([
            'name' => 'Vipingo Development Limited'
        ]);
        Company::firstorcreate([
            'name' => 'Zohari Leasing Company'
        ]);
    }
}
