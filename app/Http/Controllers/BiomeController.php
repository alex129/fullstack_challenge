<?php

namespace App\Http\Controllers;

use App\Models\Organism;
use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

/**
 * Example of controller for the Challenge
 */
class BiomeController extends Controller
{


    /**
     * Returns a list of samples
     */
    public function listSamples(){

        return Sample::query()
            ->withCount('abundances')
            ->get();
    }

    /**
     * Creates a new organism
     */
    public function newOrganism(Request $request){

        // Log is configured to print to stderr
        Log::info($request->all());

        //
        // TODO: Complete this method to create a new Organism instance
        //

        return response()->json(['error' => 'Not completed'], 400);
    }

    /**
     * Returns a paginated list of organisms 
     */
    public function listOrganisms(){
        return Organism::paginate(10);
    }

    /**
     * Returns the top list of organisms
     */
    public function listOrganismsTop10(){

        //
        // TODO: Return the top 10 organisms
        //
        // Could be done with plain sql or better using laravel models

        return DB::select("
            select * from organisms
        ");
        
    }

}
