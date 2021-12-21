<?php

declare(strict_types=1);

namespace DecisionTree\Interfaces;

use DecisionTree\Model\Tree\Node;
use DecisionTree\Model\Tree\Result;

/**
 * 决策树服务接口.
 */
interface DecisionTreeInterface
{
    public function process($node, $data): Result;

    public function runNode($node, $data, &$resultNode): bool;

    public function findNextNode(Node $node, $data): ?Node;
}
