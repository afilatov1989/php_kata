<?php

namespace StanfordAlgCourse\GraphRandomContraction;

use StanfordAlgCourse\GraphList\Edge;
use StanfordAlgCourse\GraphList\Graph;

class ContractionGraph extends Graph {

    public function findMinCut($num_of_launches = false)
    {
        if (! $num_of_launches) $num_of_launches = $this->countVertices() ^ 2;

        $min_cut = false;
        for ($i = 0; $i < $num_of_launches; $i ++)
        {
            $graph = clone $this;
            $graph->contractGraph();
            if ($min_cut === false || $graph->countEdges() < $min_cut) $min_cut = $graph->countEdges();
        }

        return $min_cut;
    }

    public function contractGraph()
    {
        while ($this->countVertices() > 2)
        {
            $this->contractRandomEdge();
        }

        return $this->edges;
    }

    private function contractRandomEdge()
    {
        $edge = $this->edges[array_rand($this->edges)];
        $adj_vertices = $edge->getVertices();
        foreach ($this->edges as $n => $e)
        {
            $adj = $e->getVertices();
            if ($adj[0] == $adj_vertices[1])
            {
                unset($this->edges[$n]);
                if ($adj[1] != $adj_vertices[0]) $this->edges[$n] = new Edge($adj[1], $adj_vertices[0]);
            }
            if ($adj[1] == $adj_vertices[1])
            {
                unset($this->edges[$n]);
                if ($adj[0] != $adj_vertices[0]) $this->edges[$n] = new Edge($adj[0], $adj_vertices[0]);
            }
        }
        unset($this->vertices[$adj_vertices[1]->getID()]);
    }
}
