<?php

namespace StanfordAlgCourse\GraphList;


class Edge {

    /**
     * @var Vertex
     */
    private $first;
    /**
     * @var Vertex
     */
    private $second;

    public function __construct(Vertex $first, Vertex $second)
    {

        $this->first = $first;
        $this->second = $second;
    }

    /**
     * @return array
     */
    public function getVertices()
    {
        return [$this->first, $this->second];
    }

}