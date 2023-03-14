window.onload = () => {
    paginates();
}
function paginates() {
    clickPage = document.querySelectorAll('.paginate-item');
    for (let i = 0; i < clickPage.length; i++) {
        clickPage[0].classList.add('active');
        clickPage[i].addEventListener('click',() => {
            for (let j = 0; j < clickPage.length; j++) {
                clickPage[j].classList.remove('active');
            }
            clickPage[i].classList.add('active');
        })
    }
}


