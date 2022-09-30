<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganismRequest;
use App\Models\Organism;
use App\Models\Sample;
use App\Repositories\Eloquent\OrganismRepository;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

/**
 * Example of controller for the Challenge
 */
class BiomeController extends Controller
{
    protected $organismRepo;

    public function __construct(OrganismRepository $organismRepo)
    {
        $this->organismRepo = $organismRepo;
    }

    /**
     * Returns a list of samples
     */
    public function listSamples()
    {

        return Sample::query()
            ->withCount('abundances')
            ->with('crop')
            ->get();
    }

    /**
     * Creates a new organism
     */
    public function newOrganism(StoreOrganismRequest $request)
    {
        try {
            return response()->json($this->organismRepo->store($request->all()));
        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 400);
        }
    }

    /**
     * Returns a paginated list of organisms 
     */
    public function listOrganisms()
    {
        return Organism::paginate(10);
    }

    /**
     * Returns the top list of organisms
     */
    public function listOrganismsTop10()
    {

        //
        // TODO: Return the top 10 organisms
        //
        // Could be done with plain sql or better using laravel models

        return Organism::withCount('abundances')
            ->orderBy('abundances_count', 'desc')
            ->take(10)
            ->get()
            ->each->append('common_crops');
    }
}
