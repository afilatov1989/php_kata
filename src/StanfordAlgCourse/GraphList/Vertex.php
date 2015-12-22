<?php

namespace StanfordAlgCourse\GraphList;


class Vertex {

    /**
     * @var int
     */
    private $id;

    public function __construct($id, array $edges = [])
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}