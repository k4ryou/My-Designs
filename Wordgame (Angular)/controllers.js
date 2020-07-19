var app = angular.module("myApp", []);

app.controller("myCtrl", function ($scope) {
  $('#respostajogo').prop('disabled', true);
  var letragerada;
  var seconds = 61;
  var timer;

  $scope.gerarletra = function () {
    $('.button').prop('disabled', true);
    $(document).ready(function () {
      var theLetters = "abcdefghijlmnopqrstuvz"; //You can customize what letters it will cycle through
      var result = "";
      var theLetterslength = theLetters.length;

      result = theLetters.charAt(Math.floor(Math.random() * theLetterslength));
      letragerada = result;

      var ctnt = result; // Your text goes here
      var speed = 20; // ms per frame
      var increment = 50; // frames per step. Must be >2


      var clen = ctnt.length;
      var si = 0;
      var stri = 0;
      var block = "";
      var fixed = "";
      //Call self x times, whole function wrapped in setTimeout
      (function rustle(i) {
        setTimeout(function () {
          if (--i) { rustle(i); }
          nextFrame(i);
          si = si + 1;
        }, speed);
      })(clen * increment + 1);
      function nextFrame(pos) {
        for (var i = 0; i < clen - stri; i++) {
          //Random number
          var num = Math.floor(theLetters.length * Math.random());
          //Get random letter
          var letter = theLetters.charAt(num);
          block = block + letter;
        }
        if (si == (increment - 1)) {
          stri++;
        }
        if (si == increment) {
          // Add a letter; 
          // every speed*10 ms
          fixed = fixed + ctnt.charAt(stri - 1);
          si = 0;
        }
        $("#output").html(fixed + block);
        block = "";

      }
    });
    $('#respostajogo').prop('disabled', false);
    iniciartempo();


  }

 
  function iniciartempo() {
    
    function contartempo() {
      if (seconds <= 60) { // I want it to say 1:00, not 60
        document.getElementById("timer").innerHTML = "Tempo restante: " + seconds;
      }
      if (seconds > 0) { // so it doesn't go to -1
        seconds--;
      } else {
        $('.button').prop('disabled', false);
        $('#respostajogo').prop('disabled', true);
        clearInterval(timer);
        seconds=61;
        timer=false;
        console.log(seconds);
      }
    }
    if (!timer) {
      timer = window.setInterval(function () {
        contartempo();
      }, 1000); // every second
    }

  }


  var respostas = []
  $scope.descricao = "Nome";
  respostas[0] = "";
  respostas[1] = "";
  respostas[2] = "";
  respostas[3] = "";
  respostas[4] = "";
  respostas[5] = "";

  $scope.inserirresposta = function (event) {
    var enter = event.keyCode;


    // Cancel the default action, if needed
    if (enter == 13) {
        var uppercase=letragerada.toUpperCase();
       

      switch ($scope.descricao) {
        case "Nome":
          
          if ($scope.resposta.startsWith(letragerada) || $scope.resposta.startsWith(uppercase))  {
            respostas[0] = $scope.resposta;
            $scope.descricao = "Animal";
            $scope.erro = "";
          } else {
            $scope.erro = "A palavra tem que começar pela letra gerada!";
          }
          break;
        case "Animal":
          if ($scope.resposta.startsWith(letragerada)|| $scope.resposta.startsWith(uppercase)) {

            respostas[1] = $scope.resposta;
            $scope.descricao = "Cidade";
            $scope.erro = "";
          } else {
            $scope.erro = "A palavra tem que começar pela letra gerada!";
          }
          break;
        case "Cidade":
          if ($scope.resposta.startsWith(letragerada)|| $scope.resposta.startsWith(uppercase)) {

            respostas[2] = $scope.resposta;
            $scope.descricao = "Planta/Fruto";
            $scope.erro = "";
          } else {
            $scope.erro = "A palavra tem que começar pela letra gerada!";
          }
          break;
        case "Planta/Fruto":
          if ($scope.resposta.startsWith(letragerada)|| $scope.resposta.startsWith(uppercase)) {

            respostas[3] = $scope.resposta;
            $scope.descricao = "Profissão";
            $scope.erro = "";
          } else {
            $scope.erro = "A palavra tem que começar pela letra gerada!";
          }
          break;
        case "Profissão":
          if ($scope.resposta.startsWith(letragerada)|| $scope.resposta.startsWith(uppercase)) {

            respostas[4] = $scope.resposta;
            $scope.descricao = "Marca";
            $scope.erro = "";
          } else {
            $scope.erro = "A palavra tem que começar pela letra gerada!";
          }
          break;
        case "Marca":
         
          if ($scope.resposta.startsWith(letragerada)|| $scope.resposta.startsWith(uppercase)) {

            respostas[5] = $scope.resposta;
            $scope.descricao = "Nome";
            $scope.erro = "";
          } else {
            $scope.erro = "A palavra tem que começar pela letra gerada!";
          }
          break;
      }

      $scope.resposta = null;
      $scope.nome = respostas[0];
      $scope.animal = respostas[1];
      $scope.cidade = respostas[2];
      $scope.plantafruto = respostas[3];
      $scope.profissao = respostas[4];
      $scope.marca = respostas[5];
    }


  }

  $scope.mudartopico = function (id) {
    $scope.descricao = id;
    switch ($scope.descricao) {
      case "Nome":
        document.getElementById("respostajogo").value = respostas[0];

        break;
      case "Animal":
        document.getElementById("respostajogo").value = respostas[1];
        break;
      case "Cidade":
        document.getElementById("respostajogo").value = respostas[2];
        break;
      case "Planta/Fruto":
        document.getElementById("respostajogo").value = respostas[3];
        break;
      case "Profissão":
        document.getElementById("respostajogo").value = respostas[4];
        break;
      case "Marca":
        document.getElementById("respostajogo").value = respostas[5];
        break;
    }
    $("#respostajogo").focus();

  }



});

