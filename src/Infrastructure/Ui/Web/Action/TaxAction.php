<?php


namespace Taxation\Infrastructure\Ui\Web\Action;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Taxation\Application\Command\TaxationCommand;
use Taxation\Application\TaxApplicationService;

class TaxAction
{
    private TaxApplicationService $taxService;

    public function __construct(TaxApplicationService $taxService)
    {
        $this->taxService = $taxService;
    }

    /**
     * @param $product
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke($product, Request $request): JsonResponse
    {
        $command = new TaxationCommand($request->get('product'));
        $cost = $this->taxService->execute($command);
        return new JsonResponse(['cost' => $cost]);
    }
}