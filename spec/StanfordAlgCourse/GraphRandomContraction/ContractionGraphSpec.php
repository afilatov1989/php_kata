<?php

namespace spec\StanfordAlgCourse\GraphRandomContraction;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\StanfordAlgCourse\GraphList\GraphCreationTrait;
use StanfordAlgCourse\GraphList\Vertex;

class ContractionGraphSpec extends ObjectBehavior {

    use GraphCreationTrait;

    function it_should_contract_graph_correctly()
    {
        $vertices = [
            1 => [2, 3, 4],
            2 => [1, 3, 4],
            3 => [1, 2, 4],
            4 => [1, 2, 3],
        ];
        $this->makeGraphFromArray($vertices);
        $this->contractGraph();
        $this->countVertices()->shouldReturn(2);
    }

    function it_should_find_min_cut_correctly()
    {
        $vertices = [
            1 => [2, 3, 4],
            2 => [1, 3, 4],
            3 => [1, 2, 4],
            4 => [1, 2, 3],
        ];
        $this->makeGraphFromArray($vertices);
        $this->findMinCut()->shouldReturn(3);
    }

    function it_should_find_min_cut_of_stanford_graph_correctly()
    {
        $this->makeGraphFromStanfordFile();
        $this->findMinCut(100)->shouldReturn(17);
    }
}
