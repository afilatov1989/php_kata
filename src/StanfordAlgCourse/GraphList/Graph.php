<?php

namespace StanfordAlgCourse\GraphList;

class Graph {

    /**
     * Vertices of a graph
     * @var array
     */
    protected $vertices;
    /**
     * Edges of a graph
     * @var array
     */
    protected $edges;

    public function __construct(array $vertices = [], array $edges = [])
    {
        $this->vertices = $vertices;
        $this->edges = $edges;
    }

    /**
     * Adds vertex to a graph. If vertex with the same id already exists,
     * throws and exception
     * @param Vertex $vertex
     * @throws \Exception
     */
    public function addVertex(Vertex $vertex)
    {
        $id = $vertex->getId();
        if (array_key_exists($id, $this->vertices)) throw new \Exception('Vertex with ID="' . $id . '" already exists');
        $this->vertices[$id] = $vertex;
    }

    /**
     * Add an edge connecting two vertices with given ids
     * @param $id1
     * @param $id2
     * @return Edge
     * @throws \Exception
     */
    public function addEdge($id1, $id2)
    {
        return $this->edges[] = new Edge($this->getVertexByID($id1), $this->getVertexByID($id2));
    }

    /**
     * Gets all adjacent vertices ids by vertex id
     * @param $id
     * @return array
     */
    public function getAdjacentVerticesIDsByVertexID($id)
    {
        $vertices = $this->getAdjacentVerticesByVertexID($id);
        $ids = [];
        foreach ($vertices as $vertex)
        {
            $ids[] = $vertex->getID();
        }
        sort($ids);

        return $ids;
    }

    /**
     * Gets all adjacent vertices ids by vertex id
     * @param $id
     * @return array
     */
    public function getAdjacentVerticesByVertexID($id)
    {
        $vertex = $this->getVertexByID($id);

        return $this->getAdjacentVertices($vertex);
    }

    /**
     * @return int
     */
    public function countEdges()
    {
        return count($this->edges);
    }

    /**
     * @return int
     */
    public function countVertices()
    {
        return count($this->vertices);
    }

    /**
     * Returns human-readable info about vertices and edges of a graph
     * @return string
     */
    public function getGraphInfo()
    {
        $vertices = [];
        $edges = [];
        foreach ($this->vertices as $id => $vertex)
        {
            $vertices[] = $id;
        }
        foreach ($this->edges as $edge)
        {
            $adj = $edge->getVertices();
            $edges[] = '[' . $adj[0]->getID() . ',' . $adj[1]->getID() . ']';
        }

        return 'Vertices: ' . implode(',', $vertices) . PHP_EOL . 'Edges: ' . implode(',', $edges) . PHP_EOL;
    }

    /**
     * @param $vertex
     * @return array
     */
    private function getAdjacentVertices(Vertex $vertex)
    {
        $res = [];
        foreach ($this->edges as $edge)
        {
            $vertices = $edge->getVertices();
            if ($vertex == $vertices[0]) $res[] = $vertices[1];
            if ($vertex == $vertices[1]) $res[] = $vertices[0];
        }

        return $res;
    }

    /**
     * @param $id
     * @return Vertex
     * @throws \Exception
     */
    private function getVertexByID($id)
    {
        if (! array_key_exists($id, $this->vertices)) throw new \Exception('Vertex with ID="' . $id . '" not found');

        return $this->vertices[$id];
    }

}
