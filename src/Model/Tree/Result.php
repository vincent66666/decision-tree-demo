<?php

declare(strict_types=1);

namespace DecisionTree\Model\Tree;

class Result
{
    /**
     * 用户id.
     */
    private int $userId;

    /**
     * 决策树id.
     */
    private int $treeId;

    /**
     * 结果节点值
     */
    private array $result;

    public function __construct(int $userId, int $treeId, array $result)
    {
        $this->userId = $userId;
        $this->treeId = $treeId;
        $this->result = array_values($result);
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getTreeId(): int
    {
        return $this->treeId;
    }

    public function getResult(): array
    {
        return $this->result;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setTreeId($treeId)
    {
        $this->treeId = $treeId;
    }

    public function setResult(array $result)
    {
        $this->result = $result;
    }
}
