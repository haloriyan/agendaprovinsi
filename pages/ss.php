<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SS</title>
</head>
<body>

<?php
echo $_COOKIE['testCookie'];
?>

<div id="app"></div>

<script>
	class embo {
		constructor(obj) {
			let sel = document.querySelectorAll(obj.el)
			this.metode = obj.metode
			const name = Object.getOwnPropertyNames(this.metode)

			// console.log(this.metode.test)
			name.forEach((n) => {
				// eval(n+'()')
				const objName = n
				console.log(this.metode.objName)
			})
		}
	}

	let app = new embo({
		el: '#app',
		metode: {
			test() {
				alert('halo dunia')
			},
			ya() {
				alert('test')
			}
		}
	})
</script>

</body>
</html>