<?php
namespace Bronk\RestBundle\Interfaces;

use Symfony\Component\HttpFoundation\{
    JsonResponse,
    Request,
    Response
};

interface RestInterface
{
    /**
     * Get one item [GET]
     * @FOSRest\Get("/items/{id}")
     */
    public function getOne(int $id): JsonResponse;

    /**
     * Returns all items [GET]
     * @FOSRest\Get("/items")
     */
    public function getAll(): JsonResponse;

    /**
     * Create item [POST]
     * @FOSRest\Post("/items")
     */
    public function create(Request $request): Response;

    /**
     * Delete item [DELETE]
     * @FOSRest\Delete("/items/{id}")
     */
    public function delete(int $id): Response;

    /**
     * Update item [PUT]
     * @FOSRest\Put("/items")
     */
    public function update(Request $request): Response;
}
