
const drawer = document.querySelector('.menu-drawer');
const menuButton = document.querySelector('.menu-button');
const closeButton = document.querySelector('.close-menu');
const form = document.querySelector('.contact-form');
const statusEl = document.querySelector('.form-status');

function setMenu(open){
  drawer.classList.toggle('open', open);
  drawer.setAttribute('aria-hidden', String(!open));
  menuButton.setAttribute('aria-expanded', String(open));
  document.body.classList.toggle('menu-open', open);
}
menuButton?.addEventListener('click', () => setMenu(true));
closeButton?.addEventListener('click', () => setMenu(false));
drawer?.querySelectorAll('a').forEach(a => a.addEventListener('click', () => setMenu(false)));
document.addEventListener('keydown', e => {
  if(e.key === 'Escape') setMenu(false);
});

form?.addEventListener('submit', async (e) => {
  e.preventDefault();
  statusEl.textContent = 'ENVIANDO...';
  const data = new FormData(form);

  try{
    const response = await fetch(form.action, { method:'POST', body:data });
    const result = await response.json();
    if(!response.ok || !result.ok) throw new Error(result.message || 'Error');
    statusEl.textContent = 'MENSAJE ENVIADO. GRACIAS.';
    form.reset();
  }catch(error){
    statusEl.textContent = 'NO PUDIMOS ENVIARLO. INTENTÁ DE NUEVO.';
  }
});
