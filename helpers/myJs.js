const btn = document.querySelector('#btn-cart');
const btnClose = document.querySelector('#btn-close-cart');
const cartContent = document.querySelector('#cart');

btn.onclick = function(){
    cartContent.classList.toggle('active');
}

btnClose.onclick = function(){
    cartContent.classList.remove('active');
}
