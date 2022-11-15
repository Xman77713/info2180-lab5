window.onload = function (){
	let countryButton = document.getElementById("lookup-country");
	let citiesButton = document.getElementById("lookup-cities");
	
	countryButton.addEventListener("click", function(e) {
		e.preventDefault();
		let country = document.getElementById("country").value;
		let url = "http://localhost/info2180-lab5/world.php?country=" + country;
		const httpRequest = new XMLHttpRequest();
		httpRequest.onreadystatechange = function() {
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
					let response = httpRequest.responseText;
					document.getElementById("result").innerHTML = response;
				}
				else {
					alert('There was a problem with the request.');
				}
			}			
		}
		httpRequest.open('GET', url);
		httpRequest.send();
		
	})
	
	citiesButton.addEventListener("click", function(e) {
		e.preventDefault();
		let country = document.getElementById("country").value;
		let url = "http://localhost/info2180-lab5/world.php?country=" + country + "&lookup=cities";
		const httpRequest = new XMLHttpRequest();
		httpRequest.onreadystatechange = function() {
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
				if (httpRequest.status === 200) {
					let response = httpRequest.responseText;
					document.getElementById("result").innerHTML = response;
				}
				else {
					alert('There was a problem with the request.');
				}
			}			
		}
		httpRequest.open('GET', url);
		httpRequest.send();
		
	})
}