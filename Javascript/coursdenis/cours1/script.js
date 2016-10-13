var boutton = document.getElementById('unBouton');
boutton.style.backgroundColor = "#FF4F4F";
boutton.style.height = "150px";
boutton.style.width  = "200px";
boutton.innerText = 'Blablabla';

boutton.addEventListener("click", change);

function change(event){
  console.log(event);
  boutton.style.color = '#C7DFF1';
  boutton.style.fontSize = '20px';
  globale.appendChild(paragraphe);
};

var paragraphe = document.createElement('p');
paragraphe.style.backgroundColor = "#7DA57D";
paragraphe.style.height = '30px';

var globale = document.getElementsByTagName('body')[0];
var tableauEmoji = [
  {url: "singe.png"},
  {url: "dog.png"},
  {url: "vache.png"},
  {url: "tigre.png"},
]

function denis(){
  var dogImage = document.createElement('div');
  var emojiHasard = tableauEmoji[Math.floor(Math.random()*tableauEmoji.length)].url;
  console.log(emojiHasard);
  dogImage.style.height = "50px";
  dogImage.style.width = '65px';
  dogImage.style.float = 'left';
  dogImage.style.backgroundImage = 'url('+emojiHasard+')';
  globale.appendChild(dogImage);
  setTimeout(denis,250);
}

var recupereTimothee = document.getElementsByClassName('timothee');

for(i=0; i<recupereTimothee.length ;i++){
  recupereTimothee[i].addEventListener('click', parcourirTimothee);
}

function parcourirTimothee(event){
  console.log(event);
  var recupereEventTarget = event.target;
  console.log(recupereEventTarget)
  recupereEventTarget.innerText = 'Hello';
}
