window.addEventListener("DOMContentLoaded", () => {

let hr = document.getElementsByClassName('hr'),
		content = document.querySelectorAll('.product-content'),
		titles = document.querySelectorAll('.product-title'),
		active = false;



for(let i = 0; i < titles.length; i++) {
	titles[i].addEventListener('click', () => {
		if(active === false) {
			hr[i].style.display = 'block';
			content[i].style.display = 'flex';
			active = true;
		} else if(active === true) {
			hr[i].style.display = 'none';
			content[i].style.display = 'none';
			active = false;
		}
	});
}

});