// this code is done withe the help of Faizul Osman -- https://youtu.be/4h0XwqCD7Gs 
var table = document.getElementById('table'), rIndex; 


for ( var i =0; i<table.rows.length; i++){
    table.rows[i].onclick = function(){
    rIndex = this.rowIndex;
    console.log(rIndex);
    document.getElementById('block').value = this.cells[0].innerHTML;
    document.getElementById('Road').value = this.cells[1].innerHTML;
    document.getElementById('Building').value = this.cells[2].innerHTML;
    document.getElementById('Flat').value = this.cells[3].innerHTML;
    document.getElementById('Mobile').value = this.cells[4].innerHTML;
    document.getElementById('Email').value = this.cells[5].innerHTML;
    document.getElementById('Emergency').value = this.cells[6].innerHTML;


  };
}



function editRow(){
  table.rows[rIndex].cells[0].innerHTML = document.getElementById('block').value;
  table.rows[rIndex].cells[1].innerHTML = document.getElementById('Road').value;
  table.rows[rIndex].cells[2].innerHTML = document.getElementById('Building').value;
  table.rows[rIndex].cells[3].innerHTML = document.getElementById('Flat').value;
  table.rows[rIndex].cells[4].innerHTML = document.getElementById('Mobile').value;
  table.rows[rIndex].cells[5].innerHTML = document.getElementById('Email').value;
  table.rows[rIndex].cells[6].innerHTML = document.getElementById('Emergency').value;


  document.querySelector('.hide').setAttribute('style','display:block;');

}

function TableDisplay(){
  document.querySelector('.update-container').setAttribute('style','display:block;')
}


function TableHide(){
  document.querySelector('.update-container').setAttribute('style','display:none;');
  document.querySelector('.hide').setAttribute('style','display:none;');
}


