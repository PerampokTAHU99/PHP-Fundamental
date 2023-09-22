//take all necessary elements
var keyword = document.getElementById('keyword');
var find = document.getElementById('find');
var container = document.getElementById('container');

//add event when keyword being writting
keyword.addEventListener('keyup', function(){
   
   //make ajax object
   var xhr = new XMLHttpRequest();

   //check ajax is ready
   xhr.onreadystatechange = function(){
      if (xhr.readyState == 4 && xhr.status == 200) {
         container.innerHTML = xhr.responseText;
      }
   }

   //ajax execute
   xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value,true);
   xhr.send();
});
