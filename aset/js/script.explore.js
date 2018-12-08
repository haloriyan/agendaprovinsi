let grid = document.querySelector('.grid');

let iso = new Isotope(grid, {
	itemSelector: '.grid-item',
	percentPosition: true,
	masonry: {
		columnWidth: '.grid-sizer'
	}
})

function load() {
	ambil('./events/getAllEvent', (res) => {
		$("#load").tulis(res)
	})
}
load()