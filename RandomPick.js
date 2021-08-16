const box = document.querySelector('img');
box.addEventListener('click',stop);

function stop(event)
{
  const target = document.getElementById('ani');
  const target2 = document.getElementById('res_pic');
  target.classList.remove('shake-slow');
  setTimeout(function open()
  {
    target.classList.add('hidden-box');
    target2.classList.add('zoomer');
    target2.classList.remove('hidden-result');
    console.log("YYY");
  },2000);
}
