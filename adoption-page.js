const menuBtn = document.getElementById('menu-button');
const sidebar = document.getElementById('sidebar');

function sidebartoggle(){
  const expanded = menuBtn.getAttribute('aria-expanded') === 'true';
  menuBtn.setAttribute('aria-expanded', !expanded);
  sidebar.classList.toggle('active');
  sidebar.setAttribute('aria-hidden', expanded);
};
