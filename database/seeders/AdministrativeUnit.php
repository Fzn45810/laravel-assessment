<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Division;
use App\Models\Provincial;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\UnionCouncil;
use App\Models\IndividualHousehold;
use App\Models\HouseholdMembers;

class AdministrativeUnit extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $province = Provincial::create([
            'name' => 'Punjab'
        ]);

        $division = new Division();
        $division->name = "Sargodha";
        $division->provincial()->associate($province);
        $division->save();

        $district = new District();
        $district->name = "Minwali";
        $district->division()->associate($division);
        $district->save();

        $tehsil = new Tehsil();
        $tehsil->name = "Isa Khel";
        $tehsil->district()->associate($district);
        $tehsil->save();

        $unioncouncil = new UnionCouncil();
        $unioncouncil->name = "UC 1";
        $unioncouncil->tehsil()->associate($tehsil);
        $unioncouncil->save();

        $individualhousehold = new IndividualHousehold();
        $individualhousehold->name = "IH 1";
        $individualhousehold->union_council()->associate($unioncouncil);
        $individualhousehold->save();

        $householdmembers = new HouseholdMembers();
        $householdmembers->name = "Faizan Khan";
        $householdmembers->individual_household()->associate($individualhousehold);
        $householdmembers->save();

    }
}
