<?php

namespace App\Core\SpareParts\Repositories\Interfaces;

use App\Core\Categories\Category;
use App\Core\SpareParts\SparePart;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SparePartRepositoryInterface
{
    /**
     * List all spare parts with pagination and filter them according to given params
     *
     * @param array $params
     * @param integer $page
     * @param integer $limit
     * @param string $sortBy
     * @param string $sortOrder
     * @return LengthAwarePaginator
     */
    public function list(
        array $params,
        int $page = 1,
        int $limit = 10,
        string $sortBy = 'designation',
        string $sortOrder = "asc"
    ): LengthAwarePaginator;

    /**
     * Create new spare part using given data
     *
     * @param array $body
     * @return SparePart
     */

    public function store(array $body, Category $category): SparePart;
    /**
     * Find one spare part by given id
     *
     * @param integer $id
     * @return SparePart
     */
    public function findById(string $id): SparePart;

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
