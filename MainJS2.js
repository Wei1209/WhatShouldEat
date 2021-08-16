const blocks = document.querySelectorAll('#res_pic');
const closeB = document.querySelector(".myButton");

var Res_id = null;

for(block of blocks)
{
  block.addEventListener('click',ShowUP);
}
closeB.addEventListener('click',Close);

function ShowUP() {
  document.body.classList.add('no-scroll');
  show.classList.remove('hidden');
  show.style.top = window.pageYOffset + 100 + 'px';
  var TName = this.className;
  Res_id = TName;
  console.log(TName);
  const seleRes = document.getElementById(TName);
  const seleMenu = document.getElementById(TName+"2");
  seleRes.classList.remove('hidden-res');
  seleMenu.classList.remove('hidden-menu');
  seleMenu.classList.add('selected');
}
console.log(Res_id);
function Close() {
  document.body.classList.remove('no-scroll');
  show.classList.add('hidden');
  const seleRes = document.getElementById(Res_id);
  const seleMenu = document.getElementById(Res_id+"2");
  seleRes.classList.add('hidden-res');
  seleMenu.classList.add('hidden-menu');
  seleMenu.classList.remove('selected');
}
