<?php

declare(strict_types=1);

namespace DecisionTree\Model\Tree;

class NextNode
{
    /**
     * 来源节点ID.
     * @var int
     */
    private int $fromNodeId;

    /**
     * 去向节点ID.
     * @var int
     */
    private int $nextNodeId;

    /**
     * 决策规则列表. 绑定的决策.
     * @var array<NodeDecision>
     */
    private array $nodeDecisionMap;

    public function __construct(int $fromNodeId, int $nextNodeId)
    {
        $this->setFromNodeId($fromNodeId);
        $this->setNextNodeId($nextNodeId);
    }

    /**
     * @return int
     */
    public function getFromNodeId(): int
    {
        return $this->fromNodeId;
    }

    /**
     * @param int $fromNodeId
     *
     * @return NextNode
     */
    public function setFromNodeId(int $fromNodeId): NextNode
    {
        $this->fromNodeId = $fromNodeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getNextNodeId(): int
    {
        return $this->nextNodeId;
    }

    /**
     * @param int $nextNodeId
     *
     * @return NextNode
     */
    public function setNextNodeId(int $nextNodeId): NextNode
    {
        $this->nextNodeId = $nextNodeId;
        return $this;
    }

    /**
     * @return NodeDecision[]
     */
    public function getNodeDecisionMap(): array
    {
        return $this->nodeDecisionMap;
    }

    /**
     * @param NodeDecision $nodeDecision
     *
     * @return NextNode
     */
    public function setNodeDecisionMap(NodeDecision $nodeDecision): NextNode
    {
        $this->nodeDecisionMap[$nodeDecision->getId()] = $nodeDecision;
        return $this;
    }
}
