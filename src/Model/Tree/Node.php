<?php

declare(strict_types=1);

namespace DecisionTree\Model\Tree;


/**
 * 无限级节点模型.
 */
class Node
{
    /**
     * 节点ID.
     *
     * @var int
     */
    private int $id;

    /**
     * 节点类型.
     *
     * @var string
     */
    private string $type;

    /**
     * 节点名称.
     *
     * @var string
     */
    private string $name;

    /**
     * 父级节点id.
     *
     * @var int
     */
    private int $parentId;

    /**
     * 节点值-绑定的标签ID.
     *
     * @var string
     */
    private string $labelId;

    /**
     * 子节点数据.
     *
     * @var array<Node>
     */
    private array $childMap;

    /**
     * 决策规则集. 绑定的决策.
     * @var array<NodeDecision>
     */
    private array $nodeDecisionMap;

    /**
     * 去向节点决策集.
     * @var array<NextNode>
     */
    private array $nextNodeMap;

    public function __construct(int $id, string $type, string $name, ?string $labelId = null)
    {
        $this->setId($id);
        $this->setType($type);
        $this->setName($name);
        $labelId = $labelId ?? '';
        $this->setLabelId($labelId);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    public function getLabelId(): string
    {
        return $this->labelId;
    }

    public function setLabelId($labelId)
    {
        $this->labelId = $labelId;
    }

    /**
     * @return array<Node>
     */
    public function getChildMap(): array
    {
        return empty($this->childMap) ? [] : $this->childMap;
    }

    /**
     * @param int $nodeId
     *
     * @return null|Node
     */
    public function getChild(int $nodeId): ?Node
    {
        return ! empty($this->getChildMap()[$nodeId]) ? $this->getChildMap()[$nodeId] : null ;
    }

    public function setChildMap(Node $childMap)
    {
        $this->childMap[$childMap->getId()] = $childMap;
    }

    public function getNodeDecisionMap(): array
    {
        return empty($this->nodeDecisionMap) ? [] : $this->nodeDecisionMap;
    }

    public function setNodeDecisionMap(NodeDecision $treeNodeDecision)
    {
        $this->nodeDecisionMap[$treeNodeDecision->getId()] = $treeNodeDecision;
    }

    /**
     * @return NextNode[]
     */
    public function getNextNodeMap(): array
    {
        return empty($this->nextNodeMap) ? [] : $this->nextNodeMap;
    }

    public function getNextNode(int $key): ?NextNode
    {
        return ! empty($this->getNextNodeMap()[$key]) ? $this->getNextNodeMap()[$key] : null;
    }

    /**
     * @param NextNode $nextNode
     *
     * @return Node
     */
    public function setNextNodeMap(NextNode $nextNode): Node
    {
        $this->nextNodeMap[] = $nextNode;
        return $this;
    }
}
