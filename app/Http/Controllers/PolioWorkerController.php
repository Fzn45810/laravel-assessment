<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincial;
use App\Models\Division;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\UnionCouncil;
use App\Models\IndividualHousehold;
use App\Models\HouseholdMembers;

class PolioWorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $get_province = Provincial::get();
        return view('polioworker', compact('get_province'));
    }

    public function get_value(Request $request)
    {
        $type_id = $request->type_id;
        $field_type = $request->field_type;
        switch ($field_type) {
          case 'division':
            $divisions = Division::where('provincial_id', $type_id)->get();
            return response()->json($divisions);
            break;
          case 'district':
            $district = District::where('division_id', $type_id)->get();
            return response()->json($district);
            break;
          case 'tehsil':
            $tehsil = Tehsil::where('district_id', $type_id)->get();
            return response()->json($tehsil);
            break;
          case 'unioncouncil':
            $unioncouncil = UnionCouncil::where('tehsil_id', $type_id)->get();
            return response()->json($unioncouncil);
            break;
          case 'individualhousehold':
            $individualhousehold = IndividualHousehold::where('union_council_id', $type_id)->get();
            return response()->json($individualhousehold);
            break; 
          case 'householdmem':
            $householdmem = HouseholdMembers::where('individual_household_id', $type_id)->get();
            return response()->json($householdmem);
            break;   
          default:
            return '/polioworker';
          break;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
