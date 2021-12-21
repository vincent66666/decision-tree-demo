<?php

declare(strict_types=1);

namespace DecisionTree\Interfaces;

use DecisionTree\Model\Tree\NodeDecision;

interface LogicDecisionInterface
{
    /**
     * 获取决策值
     *
     * @param array $data 用户数据
     *
     * @return string
     */
    public function getDecisionValue(array $data): string;

    /**
     * 过滤出节点决策.
     *
     * @param string $decisionValue
     * @param NodeDecision $treeNodeDecision
     *
     * @return bool
     */
    public function filterDecisionNode(string $decisionValue, NodeDecision $treeNodeDecision): bool;
}
