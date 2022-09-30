<?php 

namespace App\Repositories\Eloquent;

use App\Models\Organism;

final class OrganismRepository
{
    public function store(array $data): array
    {
        return Organism::create([$data]);
    }
}