<?php

namespace App\Core\SpareParts\Repositories\Interfaces;

use App\Core\SpareParts\SparePart;

interface SparePartRepositoryInterface {
    /**
     * Create new spare part using given data
     *
     * @param array $body
     * @return SparePart
     */

    public function store(array $body): SparePart;
    /**
     * Find one spare part by given id
     *
     * @param integer $id
     * @return SparePart
     */
    public function findById(int $id): SparePart;

    /**
     * Update given spare part with given data
     *
     * @param SparePart $sparePart
     * @param array $body
     * @return SparePart
     */
    public function update(SparePart $sparePart, array $body): SparePart;

    /**
     * Delete given spare part
     *
     * @param SparePart $sparePart
     * @param array $body
     * @return void
     */
    public function delete(SparePart $sparePart): bool;
}
