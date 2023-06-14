// Tabs
var tabButtons = document.querySelectorAll(".wrapp-tabs .buttonTabs button");
var tabContent = document.querySelectorAll(".wrapp-tabs .tabContent");


function showContent(contentIndex) {
	tabButtons.forEach(function (node) {
		node.style.borderBottom = "";
		node.style.color = "";
	});
	tabButtons[contentIndex].style.borderBottom = "3px solid #e737a7";

	tabContent.forEach(function (node) {
		node.style.display = "none";
	});

	tabContent[contentIndex].style.display = "block";
}

showContent(0);
