var nodes = null;
var edges = null;
var network = null;
var reset = getEl("button.resetTree");
bindVisualizeListener()
function bindVisualizeListener(){
	var meggelize = getEl(".tree button.visualize");
	meggelize.addEventListener('click', function(){
		draw();
	});
}
reset.addEventListener('click', function(){
	destroy();
	var reset = getEl('.resetTree');
	reset.style.display = "none";
	var tree = getEl(".tree")
	tree.innerHTML = '<div class="pop_container"><input type="text" placeholder="Enter your proof of publication hash here"/><button class="visualize">Visualize</button></div>';
	bindVisualizeListener();
});
function getEl(selector){
	return document.querySelector(selector)
}
function addNode(id,label,color) {
	if (!color){
		var color = 'green';
	}
	nodes.push({
		id: id,
		label: label,
		color: color
	});
}
function addEdge(id,from,to) {
	edges.push({
		id: id,
		from: from,
		to: to
	});
}
function destroy() {
	if (network !== null) {
		network.destroy();
		network = null;
	}
}
function draw() {
	destroy();
	var nodeCount = 25;
	if (!data) {
		var data = getScaleFreeNetwork(nodeCount);
	}
	var container = getEl('.tree');
	network = new vis.Network(container, data, {
		layout: {
			hierarchical: {
				direction: 'UD'
			}
		}
	});
	network.on('select', function (params) {
		getEl('.nodes').innerHTML = 'Selection: ' + params.nodes;
	});
	var reset = getEl('.resetTree');
	reset.style.display = "block";
}
