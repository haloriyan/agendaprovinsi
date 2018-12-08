<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>App</title>
</head>
<body>

<div id="root">
	<div id="asd" @click='test'>asd</div>
</div>

<script>
	class embo {
		constructor(o) {
			this.methods = o.methods
			let elem = 'div'
			let sel = this.selDom(o.el + ' ' +elem)
			for(var i = 0; i < sel.length; i++) {
				let dom = sel[i]
				// get @click
				let click = dom.getAttribute('@click')
				this.klik(elem, click)
			}
		}
		selDom(dom) {
			return document.querySelectorAll(dom)
		}
		klik(dom, callback) {
			// dom.addEventListener('click', callback)
			console.log(dom)
		}
	}

	let app = new embo({
		el: '#root',
		methods: {
			ya() {
				alert('ad')
			}
		}
	})
</script>

</body>
</html>