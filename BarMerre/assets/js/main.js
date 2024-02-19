//Account Start
const container = document.getElementById('container');
const regBtn = document.getElementById('regist');
const loginBtn = document.getElementById('login');

regBtn.addEventListener('click', ()=>{
  container.classList.add('active');
});

loginBtn.addEventListener('click', ()=>{
  container.classList.remove('active');
});
//Account End