            function restart(){
                for(i=0; i < outBlocks.length; i++){
                    outBlocks[i].innerHTML = '';
                }
                numbers = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
                numbers.shuffle();
                for(i=0; i < numbers.length; i++){
                    outBlocks[i].innerHTML = numbers[i];
                }
                newBoard(numbers.length);
            }
            function newBoard(num){
                for(i=0; i < outBlocks.length; i++){
                    outBlocks[i].onclick = outBlocks[i].className = outBlocks[i].title = '';
                }
                adjacentCells = new Array();
                blankSpace = outBlocks[num];
                blankSpace.rNum = new Number(getRowIndex(blankSpace));
                blankSpace.cNum = new Number(getCellIndex(blankSpace));
                blankSpace.cellIndx = (blankSpace.rNum*4)+blankSpace.cNum;
                adjacentCells = movingBlocks(blankSpace);  
                moveOnClick();  
            }
            function movingBlocks(obj){
                var newadjacentCells = new Array();
                if(obj.cNum-1 >= 0){ 
                    newadjacentCells.push(borderTable.rows[obj.rNum].cells[obj.cNum-1]);
                }
                if(obj.cNum+1 <= 3){ 
                    newadjacentCells.push(borderTable.rows[obj.rNum].cells[obj.cNum+1]); 
                }
                if(obj.rNum-1 >= 0){
                    newadjacentCells.push(borderTable.rows[obj.rNum-1].cells[obj.cNum]);
                }
                if(obj.rNum+1 <= 3){
                    newadjacentCells.push(borderTable.rows[obj.rNum+1].cells[obj.cNum]);
                }
                for(i=0; i < newadjacentCells.length; i++){
                    newadjacentCells[i].className='adjacentCells';
                    newadjacentCells[i].title = 'Swaping the particular num';
                }
                return newadjacentCells;
            }
            function getRowIndex(obj){
                var elder = obj.parentNode;
                while(elder.nodeName.toLowerCase() != 'tr'){
                    elder = elder.parentNode;
                }
                return elder.rowIndex;
            }
            function getCellIndex(obj){
                var rowIndex = getRowIndex(obj);
                for(i=0; i < oRows[rowIndex].cells.length; i++){
                    if(obj == oRows[rowIndex].cells[i]){return i;}
                }
            }
            function moveOnClick(){
                for(i=0; i < adjacentCells.length; i++){
                    adjacentCells[i].onclick=function(){
                        var cellIndex = (getRowIndex(this)*4)+getCellIndex(this);
                        var blankIndx = blankSpace.cellIndx;
                        //swap clicked cell contents with blank cell contents
                        var temp = outBlocks[cellIndex].innerHTML;
                        outBlocks[cellIndex].innerHTML = '';
                        outBlocks[blankIndx].innerHTML = temp;
                        if(isWinner()) {
                            alert('You win...!!!');
                        } else {
                            newBoard(cellIndex);  //cellIndex is the cell index of the new blank square
                        }
                    }
                }
            }
            function isWinner(){
                var isWin = true;
                for(i=0; i < numbers.length; i++){
                    if(new Number(outBlocks[i].innerHTML) != numbers[i]){
                        isWin = false;
                        i = numbers.length;
                    }
                }
                return isWin;
            }
            Array.prototype.shuffle = function() {
                var s = [];
                while (this.length) s.push(this.splice(Math.random() * this.length, 1));
                while (s.length) this.push(s.pop());
                return this;
            }
            window.onload=function() {
                borderTable = document.getElementById('tblBoard');
                oRows = document.getElementById('tblBoard').getElementsByTagName('tr');
                outBlocks = document.getElementById('tblBoard').getElementsByTagName('td');
                document.getElementById('btnRestart').onclick = restart;
                restart();
            }