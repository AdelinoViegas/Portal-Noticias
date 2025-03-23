window.onresize = () => {
	if (screen.width <= 1090) {
		let ul = document.getElementsByClassName('menu_link')[0];
		let header = document.querySelector('.header');
		ul.style.display = "block";
		header.appendChild(ul);
	}
}