<?php

namespace Database\Seeders;

use App\Models\Relationship;
use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Relationship::firstorcreate([
            'default_name' => 'Direct report',
            'opposite_name' => 'Supervisor'
        ]);
        Relationship::firstorcreate([
            'default_name' => 'Peer',
            'opposite_name' => 'Peer'
        ]);
        Relationship::firstorcreate([
            'default_name' => 'Supervisor',
            'opposite_name' => 'Direct report'
        ]);
    }
}
