import GlobalService from "./globalService";

export default class Hero {

	constructor( element ) {
		this.element = element;
		this.progress = 0;
		this.paused = false;
		this.offset = 0;
		this.update();
		this.init();
	}

	init() {

		GlobalService.registerOnScroll(() => {
			this.update();
		});
	}

	update() {
		const { scrollY } = GlobalService.getProps();

		this.box = this.element.getBoundingClientRect();
		this.view = {
			x: this.box.x,
			y: this.box.y + scrollY,
			width: this.box.width,
			height: this.box.height,
		};
	}
}
