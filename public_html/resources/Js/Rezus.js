function changeText0(){
 var rezultat = 1;
 rezultat *= parseFloat(document.getElementById('a').value);
 var Tember = parseFloat(document.getElementById('b').value);
 rezultat *=Tember;

 if (Number.isInteger(Tember)==false || rezultat<0) 
 rezultat = "Только целые числа больше ноля!"; else rezultat+=" руб."


 document.getElementById('rezultat').innerHTML = rezultat;
}