<div style="height: 100vh;">
    <h1 class="text-2xl font-bold mb-4">Graph Visualization</h1>
    <div id="graph" class="border p-4" style="height: calc(100vh - 56px);"></div>

    @php
        $cdrs = App\Models\CallLogTbl::all();

        // Collect unique nodes and edges
        $uniqueNodes = [];
        $uniqueEdges = [];
        
        foreach ($cdrs as $cdr) {
            $uniqueNodes[$cdr->CalledNumber] = ['id' => $cdr->CalledNumber, 'label' => $cdr->CalledNumber, 'url' => route('cdr.show', ['id' => $cdr->CalledNumber])];
            $uniqueNodes[$cdr->callingnumber] = ['id' => $cdr->callingnumber, 'label' => $cdr->callingnumber, 'url' => route('cdr.show', ['id' => $cdr->callingnumber])];
            $uniqueEdges[] = ['from' => $cdr->callingnumber, 'to' => $cdr->CalledNumber, 'label' => $cdr->CalledNumber];
        }
        
        // Ensure edges are unique
        $uniqueEdges = array_unique($uniqueEdges, SORT_REGULAR);
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/vis-network@9.1.2/dist/vis-network.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let nodes = new vis.DataSet(@json(array_values($uniqueNodes)));

            let edges = new vis.DataSet(@json($uniqueEdges));

            let container = document.getElementById('graph');
            let data = { nodes: nodes, edges: edges };
            let options = {
                layout: {
                    improvedLayout: false
                },
                interaction: {
                    navigationButtons: true,
                    keyboard: true
                },
                nodes: {
                    shape: 'dot',
                    size: 16,
                    font: {
                        size: 16,
                        color: '#ffffff'
                    },
                    borderWidth: 2
                },
                edges: {
                    width: 2,
                    font: {
                        align: 'middle',
                        color: 'black'
                    },
                    color: 'gray',
                    arrows: {
                        to: {
                            enabled: true,
                            scaleFactor: 1
                        }
                    }
                }
            };
            let network = new vis.Network(container, data, options);

            network.on("selectNode", function (params) {
                var nodeId = params.nodes[0];
                var node = nodes.get(nodeId);
                window.open(node.url, '_blank');
            });
        });
    </script>
</div>
