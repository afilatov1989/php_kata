<?php

namespace spec\StanfordAlgCourse\GraphList;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use StanfordAlgCourse\GraphList\Vertex;

class GraphSpec extends ObjectBehavior {

    use GraphCreationTrait;

    function it_should_return_create_correct_simple_graph()
    {
        $vertices_to_check = [
            1 => [2,3],
            2 => [1,3],
            3 => [1,2],
        ];
        $this->makeGraphFromArray($vertices_to_check);
        foreach ($vertices_to_check as $ver => $ar_adj)
        {
            $this->getAdjacentVerticesIDsByVertexID($ver)->shouldReturn($ar_adj);
        }
    }

    function it_should_return_create_correct_stanford_graph()
    {
        $vertices_to_check = $this->makeGraphFromStanfordFile();
        foreach ($vertices_to_check as $ver => $ar_adj)
        {
            $this->getAdjacentVerticesIDsByVertexID($ver)->shouldReturn($ar_adj);
        }
    }

}

trait GraphCreationTrait {

    private function makeGraphFromArray(array $input)
    {
        foreach ($input as $vertex_id => $vertexEdges)
        {
            $this->addVertex(new Vertex($vertex_id));
            foreach ($vertexEdges as $adj_vertex_id)
            {
                if ($adj_vertex_id > 0 && $adj_vertex_id < $vertex_id) $this->addEdge($vertex_id, $adj_vertex_id);
            }
        }
    }

    /**
     *
     * @return array
     */
    private function makeGraphFromStanfordFile()
    {
        $vertices_to_add = [];
        foreach (file('spec/StanfordAlgCourse/GraphRandomContraction/kargerMinCut.txt')
                 as $vertexEdges)
        {
            $vertexEdges = explode("\t", $vertexEdges);
            // Make integers from all ids and erase zeros
            foreach ($vertexEdges as $num => $edge)
            {
                $vertexEdges[$num] = intval($edge);
                if (! $vertexEdges[$num]) unset($vertexEdges[$num]);
            }
            $vertex_id = array_shift($vertexEdges);
            sort($vertexEdges);
            $vertices_to_add[$vertex_id] = $vertexEdges;
        }

        $this->makeGraphFromArray($vertices_to_add);

        return $vertices_to_add;
    }
}