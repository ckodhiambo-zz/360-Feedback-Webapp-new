<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CBS

        Department::firstorcreate([
            'company_id'=>1,
            'name' => 'Administration'
        ]);
        Department::firstorcreate([
            'company_id'=>1,
            'name' => 'Finance'
        ]);
        Department::firstorcreate([
            'company_id'=>1,
            'name' => 'Human Resource'
        ]);
        Department::firstorcreate([
            'company_id'=>1,
            'name' => 'Legal'
        ]);
        Department::firstorcreate([
            'company_id'=>1,
            'name' => 'Risk'
        ]);
        Department::firstorcreate([
            'company_id'=>1,
            'name' => 'Strategy'
        ]);
        Department::firstorcreate([
            'company_id'=>1,
            'name' => 'Tax'
        ]);

        //CICLE
        Department::firstorcreate([
            'company_id'=>3,
            'name' => 'Centum Investment'
        ]);
        Department::firstorcreate([
            'company_id'=>3,
            'name' => 'Centum Investment'
        ]);



        //Nabo Capital
        Department::firstorcreate([
            'company_id'=>6,
            'name' => 'Investment'
        ]);
        Department::firstorcreate([
            'company_id'=>6,
            'name' => 'Operations'
        ]);
        Department::firstorcreate([
            'company_id'=>6,
            'name' => 'Marketing'
        ]);
        Department::firstorcreate([
            'company_id'=>6,
            'name' => 'Private Wealth'
        ]);

        //Centum RE
        Department::firstorcreate([
            'company_id'=>4,
            'name' => 'Commercial'
        ]);
        Department::firstorcreate([
            'company_id'=>4,
            'name' => 'Development Management'
        ]);
        Department::firstorcreate([
            'company_id'=>4,
            'name' => 'Executive Office'
        ]);
        Department::firstorcreate([
            'company_id'=>4,
            'name' => 'Finance'
        ]);
        Department::firstorcreate([
            'company_id'=>4,
            'name' => 'Project Management'
        ]);
        Department::firstorcreate([
            'company_id'=>4,
            'name' => 'Real Estate'
        ]);
        Department::firstorcreate([
            'company_id'=>4,
            'name' => 'Sales and Marketing'
        ]);
        Department::firstorcreate([
            'company_id'=>4,
            'name' => 'Technical/Project Design'
        ]);
        Department::firstorcreate([
            'company_id'=>4,
            'name' => 'Urban Management'
        ]);
        Department::firstorcreate([
            'company_id'=>4,
            'name' => 'Utilities/Project Management'
        ]);

        //Tier Data Limited
        Department::firstorcreate([
            'company_id'=>8,
            'name' => 'Administration'
        ]);
        Department::firstorcreate([
            'company_id'=>8,
            'name' => 'Business Development'
        ]);
        Department::firstorcreate([
            'company_id'=>8,
            'name' => 'Infrastructure'
        ]);
        Department::firstorcreate([
            'company_id'=>8,
            'name' => 'Innovations'
        ]);
        Department::firstorcreate([
            'company_id'=>8,
            'name' => 'Service Delivery'
        ]);



        //N/A
//        Department::firstorcreate([
//            'company_id'=>[2, 5, 7, 9, 10, 11, 12],
//            'name' => 'N/A'
//        ]);
//        Department::firstorcreate([
//            'name' => 'N/A'
//        ])->companies()->attach([2, 5, 7, 9, 10, 11, 12]);
    }
}
