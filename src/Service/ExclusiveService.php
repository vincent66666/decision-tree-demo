<?php

declare(strict_types=1);

namespace DecisionTree\Service;


use DecisionTree\Model\Tree\Result;
use DecisionTree\Service\Implement\DefaultService;

class ExclusiveService extends AbstractDecisionService
{

    /**
     * AbstractBiGuard constructor.
     */
    public function __construct() {
        $implement = new DefaultService([
            'gender' => \DecisionTree\Model\Logic\GenderLogic::class,
            'age'    => \DecisionTree\Model\Logic\AgeLogic::class,
        ]);
        parent::__construct($implement);
    }

    public function process($node, $data): Result
    {
        $resultNode = [];
        $this->runNode($node, $data, $resultNode);
        return new Result($data['id'], $node->getId(), $resultNode);
    }
}
