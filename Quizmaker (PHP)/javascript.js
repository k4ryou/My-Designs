var flag=false;

function init(id) {
  var opacity = document.getElementById(id);
  opacity = addEventListener("click", fade(opacity, id));
}

function fade(opacity, id) {
  if (opacity.style.opacity == 0.3) {
    opacity.style.opacity = 1;
  } else {
    opacity.style.opacity = 0.3;

  }  div = id.split("r");
  for (var i = 1; i <= 4; i++) {
    id2 = div[0] + "r" + i;
    if (id != id2) {
      var restore = document.getElementById(id2);
      restore.style.opacity = 1;
    }
  }
}

function calcular(idquest) {
  var contar=0;
  var total = 0;
  for (var i = 1; i <= 8; i++) {
    for (var j = 1; j <= 4; j++) {
      var res = document.getElementById("p" + i + "r" + j);
      if (res.style.opacity == 0.3) {
        total=total+j;
        contar++;
      }
    }
  }
  var tipo=0;
  if(total>=8 && total<=11){
    tipo=1;
  }
  if(total>=12 && total<=15){
    tipo=2;
  }
  if(total>=16 && total<=19){
    tipo=3;
  }
  if(total>=20 && total<=23){
    tipo=4;
  }
  if(total>=24 && total<=27){
    tipo=5;
  }
  if(total>=28 && total<=32){
    tipo=6;
  }
  if(contar<8){
  if(flag==false){
    $('#aviso').show();
    var scroll=document.getElementById("aviso");
      scroll.scrollIntoView(true);
    flag=true;
  }
} else{
  if (idquest.length == 0) {
    alert("erro");
      return;
  } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              var aux=this.responseText;
              var array=aux.split('*');
              document.getElementById("resultado").innerHTML =array[0];
              document.getElementById("descricao").innerHTML=array[1];
              scroll.scrollIntoView(true);
          }
      };
      xmlhttp.open("GET", "includes/resultado.inc.php?id=" + idquest + "&tipo="+tipo, true);
      xmlhttp.send();
  }
  $('#divfinal').show();
  var scroll=document.getElementById("divfinal");
    if(flag==true){
  $('#aviso').hide();
  }
  }
}
