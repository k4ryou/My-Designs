$(document).ready(function () {
  var theLetters = "abcdefghijklmnopqrstuvwxyz#%&^+=-";
  var ctnt = "João Cabral";
  var speed = 50;
  var increment = 8;

  var clen = ctnt.length;
  var si = 0;
  var stri = 0;
  var block = "";
  var fixed = "";

  (function rustle(i) {
    setTimeout(function () {
      if (--i) {
        rustle(i);
      }
      nextFrame(i);
      si = si + 1;
    }, speed);
  })(clen * increment + 1);
  function nextFrame(pos) {
    for (var i = 0; i < clen - stri; i++) {
      var num = Math.floor(theLetters.length * Math.random());

      var letter = theLetters.charAt(num);
      block = block + letter;
    }
    if (si == increment - 1) {
      stri++;
    }
    if (si == increment) {
      fixed = fixed + ctnt.charAt(stri - 1);
      si = 0;
    }
    $("#output").html(fixed + block);
    block = "";
  }
});
