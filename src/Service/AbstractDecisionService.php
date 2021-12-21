<?php

declare(strict_types=1);

namespace DecisionTree\Service;

use DecisionTree\Interfaces\DecisionTreeInterface;
use DecisionTree\Interfaces\ImplementInterface;
use DecisionTree\Model\Tree\Node;

abstract class AbstractDecisionService implements DecisionTreeInterface
{

    protected ImplementInterface $implement;

    /**
     * AbstractBiGuard constructor.
     */
    public function __construct(
        ImplementInterface $implement
    ) {
        $this->implement = $implement;
    }

      /**
     * 执行节点.
     *
     * @param Node $node
     * @param array $data
     * @param array $resultNode
     *
     * @return bool
     */
    public function runNode($node, $data, &$resultNode): bool
    {
        while ($node !== null) {
            if (! empty($node->getNodeDecisionMap())
                && ! $this->getImplement()->process($node->getNodeDecisionMap(), $data)
            ) {
                break;
            }
            if (! empty($node->getLabelId())) {
                $resultNode[$node->getLabelId()] = $node->getLabelId();
            }
            $lodNodeId = $node->getId();
            $node = $this->findNextNode($node, $data);
            if ($node) {
                var_dump("用户id：{$data['id']}，当前节点id：{$lodNodeId}，下一节点id：{$node->getId()}，决策名：{$node->getName()}，决策值：{$node->getLabelId()}");
            }
        }
        return true;
    }

    public function findNextNode(?Node $node = null, $data = []): ?Node
    {
        $i        = 0;
        $treeNode = null;
        $nextNode = $node ? $node->getNextNode($i) : null;
        while ($treeNode == null && $nextNode != null) {
            ++$i;
            if (! empty($nextNode->getNodeDecisionMap())
                && ! $this->getImplement()->process($nextNode->getNodeDecisionMap(), $data)
            ) {
                $nextNode = $node->getNextNode($i);
                continue;
            }
            $treeNode = $node->getChild($nextNode->getNextNodeId());
            $nextNode = $node->getNextNode($i);
        }
        return $treeNode;
    }

    /**
     * @return ImplementInterface
     */
    public function getImplement(): ImplementInterface
    {
        return $this->implement;
    }
}
