class Slider {
	constructor() {
		this.slide = document.getElementById('slider');
		this.slideContent = document.getElementById('slide__content');
		this.item = this.slideContent.getElementsByTagName('li');
		this.navItem = document.querySelectorAll('.slide__nav li');
		this.arNext = document.querySelector('.slide__arrow-arNext');
		this.arPrev = document.querySelector('.slide__arrow-arPrev');
		this.navSlider = document.querySelector('.slide__nav');
		this.heightItem = this.slideContent.querySelector('.slide__content-item').clientHeight;
		this.autoPlay = true;
		this.duaEffect = 900;
		this.duaration = 5000;
		this.current = 0;
		this.prev = 0;
		this.timer;
		if (!this.slide) return;
		this.init();
	}

	init() {
		let self = this;
		window.addEventListener('load', function () { self.Start() }, false);
	}

	Start() {
		let s = this;
		this.Nav();
		this.Arrow();
		this.item[this.current].classList.add("current");
		this.slideContent.style.height = this.heightItem + 'px';
		this.autoPlay ? this.timer = setTimeout(function () { s.getCurrent() }, this.duaration) : '';
	}

	Next() {
		this.prev = this.current;
		clearTimeout(this.timer);
		this.current++;
		this.current >= this.item.length ? this.current = 0 : '';
		this.nextSlider();
	}

	Prev() {
		this.prev = this.current;
		clearTimeout(this.timer);
		this.current--;
		this.current < 0 ? this.current = this.item.length - 1 : '';
		this.nextSlider();
	}

	getCurrent() {
		this.prev = this.current;
		this.current++;
		this.current >= this.item.length ? this.current = 0 : '';
		this.nextSlider();
	}

	nextSlider() {
		let a = this;
		//remove all class
		for (let i = 0; i < this.item.length; i++) {
			this.item[i].classList.remove("prev");
			this.item[i].classList.remove("current");
			this.navItem[i].classList.remove("prev");
		}

		//add class for slide item and nav item
		this.item[this.current].classList.add("current");
		this.item[this.prev].classList.add("prev");
		this.navItem[this.current].classList.add('active');
		this.navItem[this.prev].classList.remove('active');

		// start effect to slide
		this.item[this.current].style.opacity = '0';
		Velocity(this.item[this.current], { opacity: 1 }, { duration: this.duaEffect, delay: 0, queue: false, easing: 'linear' });

		// autoplay slide
		this.autoPlay ? this.timer = setTimeout(function () { a.getCurrent() }, this.duaration) : '';
	}

	Nav() {
		let n = this;
		// create nav item
		for (let j = 0; j < this.item.length; j++) {
			this.navItem = document.createElement('li');
			this.navItem.textContent = j;
			this.navSlider.appendChild(this.navItem);
		}

		// handle nav item
		this.navItem = this.navSlider.getElementsByTagName('li');
		n.navItem[this.current].classList.add('active');
		for (let i = 0; i < this.navItem.length; i++) {
			this.navItem[i].addEventListener("click", function (e) {
				const posnav = Array.prototype.indexOf.call(n.navItem, e.currentTarget);
				if (!n.navItem[posnav].classList.contains("active")) {
					this.classList.add('active');
					n.prev = n.current;
					n.current = posnav;
					clearTimeout(n.timer);
					n.nextSlider();
				}
			});
		}
	}

	Arrow() {
		let r = this;
		this.arNext.addEventListener('click', function () { r.Next() }, false);
		this.arPrev.addEventListener('click', function () { r.Prev(); }, false);
	}
}

window.addEventListener('DOMContentLoaded', function () {
	new Slider();
});