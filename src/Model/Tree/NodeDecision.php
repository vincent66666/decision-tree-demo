<?php

declare(strict_types=1);

namespace DecisionTree\Model\Tree;

/**
 * 决策模型.
 */
class NodeDecision
{
    /**
     * 决策id.
     * @var int
     */
    private int $id;

    /**
     * 决策名称.
     */
    private string $name;

    /**
     * 决策key.
     */
    private string $key;

    /**
     * 决策类型.
     */
    private string $type;

    /**
     * 决策值
     */
    private $value;

    public function __construct(int $id, string $name, string $key, string $type, $value)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setKey($key);
        $this->setType($type);
        $this->setValue($value);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
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

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key)
    {
        $this->key = $key;
    }
}
