var TILE_SIZE = 100;
var BLANK_TOP = (3 * TILE_SIZE) + "px"; 
var BLANK_LEFT = (3 * TILE_SIZE) + "px"; 
var startTime = new Date();
var backgroundString = "none";

window.onload = function () {
	setTiles();
	$("shuffleButton").observe("click", shuffle);
	$("backgroundButton").observe("click", setBackground);
	$("reset").observe("click", setTiles);
}

function setTiles() {
	var x = 0;
	var y = 0;
	for (var i = 0; i < $$("#puzzleArea > div").length; i++) {
		if (i % 4 == 0 && i != 0) {
			x = 0;
			y += TILE_SIZE;
		}
		$$("#puzzleArea > div")[i].style.left = x + "px";
		$$("#puzzleArea > div")[i].style.top = y + "px";
		$$("#puzzleArea > div")[i].value = i + 1;
		$$("#puzzleArea > div")[i].id = i + 1;
		setBackground()
		$$("#puzzleArea > div")[i].style.backgroundPosition = -x + "px " + -y + "px ";
		$$("#puzzleArea > div")[i].observe("mouseover", highlight);
		$$("#puzzleArea > div")[i].observe("click", clicked);
		x += TILE_SIZE;
	}

}

function highlight(event) {
	var top = parseInt(this.getStyle("top"));
	var left = parseInt(this.getStyle("left"));
	if (checkNeighbor(top, left)) {
		this.addClassName("red");
	}
}

function checkNeighbor(top, left) {
	if ((parseInt(BLANK_TOP) + TILE_SIZE == top && parseInt(BLANK_LEFT) == left) ||
		(parseInt(BLANK_TOP) - TILE_SIZE == top && parseInt(BLANK_LEFT) == left) ||
		(parseInt(BLANK_TOP) == top && parseInt(BLANK_LEFT) + TILE_SIZE == left) ||
		(parseInt(BLANK_TOP) == top && parseInt(BLANK_LEFT) - TILE_SIZE == left)) {
		return true;
	} else {
		return false;
	}
}

function clicked(event) {
	var temp = 0;
	var top = parseInt(this.getStyle("top"));
	var left = parseInt(this.getStyle("left"));
	if (top + TILE_SIZE == parseInt(BLANK_TOP) && left == parseInt(BLANK_LEFT)) {
		temp = BLANK_TOP;
		BLANK_TOP = this.getStyle("top");
		this.style.top = temp;
	} else if (top - TILE_SIZE == parseInt(BLANK_TOP) && left == parseInt(BLANK_LEFT)) {
		temp = BLANK_TOP;
		BLANK_TOP = this.getStyle("top");
		this.style.top = temp;
	} else if (top == parseInt(BLANK_TOP) && left + TILE_SIZE == parseInt(BLANK_LEFT)) {
		temp = BLANK_LEFT;
		BLANK_LEFT = this.getStyle("left");
		this.style.left = temp;
	} else if (top == parseInt(BLANK_TOP) && left - TILE_SIZE == parseInt(BLANK_LEFT)) {
		temp = BLANK_LEFT;
		BLANK_LEFT = this.getStyle("left");
		this.style.left = temp;
	}
}

function shuffle() {
	startTime = new Date();
	var time = setInterval(function () {
			timer(startTime)
		}, 1000); //Start the timer

	for (var a = 0; a < 100; a++) {

		//Find the tiles that can be moved (next to empty space)
		var canMove = [];
		for (var i = 0; i < $$("#puzzleArea > div").length; i++) {
			var top = parseInt($$("#puzzleArea > div")[i].getStyle("top"));
			var left = parseInt($$("#puzzleArea > div")[i].getStyle("left"));
			if (checkNeighbor(top, left)) {
				canMove.push(getTile(top, left));
			}
		}

		//Randomly pick one...
		var randomNumber = parseInt(Math.random() * canMove.length);
		var movingTile = canMove[randomNumber];
		var movingTileTop = $("" + movingTile).getStyle("top");
		var movingTileLeft = $("" + movingTile).getStyle("left");
		var temp;

		//...and move it
		if (parseInt(BLANK_TOP) != parseInt(movingTileTop)) {
			temp = BLANK_TOP;
			BLANK_TOP = movingTileTop;
			movingTileTop = temp;
			$("" + movingTile).style.top = movingTileTop;
		} else if (parseInt(BLANK_LEFT) != parseInt(movingTileLeft)) {
			temp = BLANK_LEFT;
			BLANK_LEFT = movingTileLeft;
			movingTileLeft = temp;
			$("" + movingTile).style.left = movingTileLeft;
		}
	}
}

function getTile(top, left) {
	for (var i = 0; i < $$("#puzzleArea > div").length; i++) {
		if (parseInt($$("#puzzleArea > div")[i].getStyle("top")) == top && parseInt($$("#puzzleArea > div")[i].getStyle("left")) == left) {
			return $$("#puzzleArea > div")[i].value;
		}
	}
}

function timer(startTime) {
	var d = new Date();
	var diff = d - startTime;
	var seconds = Math.floor(diff / 1000);
	document.getElementById("timer").innerHTML = "Timer: " + seconds;
}

function setBackground() {
	backgroundString = document.getElementById("zelda").value;
	
	if (document.getElementById("mario").checked) {
		backgroundString = document.getElementById("mario").value;
	}
	
	if (document.getElementById("zelda").checked) {
		backgroundString = document.getElementById("zelda").value;
	}
	
	if (document.getElementById("donkeyKong").checked) {
		backgroundString = document.getElementById("donkeyKong").value;
	}
	
	if (document.getElementById("kirby").checked) {
		backgroundString = document.getElementById("kirby").value;
	}

	for (var i = 0; i < $$("#puzzleArea > div").length; i++) {
		$$("#puzzleArea > div")[i].style.backgroundImage = "url(" + backgroundString + ")";
	}

}