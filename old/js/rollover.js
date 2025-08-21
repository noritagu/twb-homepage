function rollover() {

	if(document.getElementsByTagName) {

		var images = document.getElementsByTagName("img");



		for(var i=0; i < images.length; i++) {

			if(images[i].getAttribute("src").match("_off."))

			{

				images[i].onmouseover = function() {

					this.setAttribute("src", this.getAttribute("src").replace("_off.", "_on."));

				}

				images[i].onmouseout = function() {

					this.setAttribute("src", this.getAttribute("src").replace("_on.", "_off."));

				}

			}

		}

	}

}



if(window.addEventListener) {

	window.addEventListener("load", rollover, false);

}

else if(window.attachEvent) {

	window.attachEvent("onload", rollover);

}