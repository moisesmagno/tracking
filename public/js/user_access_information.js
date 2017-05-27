
// //BROWSER  
	var browser = function() {
   
    	// Return cached result if avalible, else get result then cache it.
    	if (browser.prototype._cachedResult)
        return browser.prototype._cachedResult;

	    // Opera 8.0+
	    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

	    // Firefox 1.0+
	    var isFirefox = typeof InstallTrigger !== 'undefined';

	    // Safari 3.0+ "[object HTMLElementConstructor]" 
	    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || safari.pushNotification);

	    // Internet Explorer 6-11
	    var isIE = /*@cc_on!@*/false || !!document.documentMode;

	    // Edge 20+
	    var isEdge = !isIE && !!window.StyleMedia;

	    // Chrome 1+
	    var isChrome = !!window.chrome && !!window.chrome.webstore;

	    // Blink engine detection
	    var isBlink = (isChrome || isOpera) && !!window.CSS;

	    return browser.prototype._cachedResult =
	        isOpera ? 'Opera' :
	        isFirefox ? 'Firefox' :
	        isSafari ? 'Safari' :
	        isChrome ? 'Chrome' :
	        isIE ? 'IE' :
	        isEdge ? 'Edge' :
	        "Outro";
	};

//URL 
var url = document.URL;


//IP, City, Country Name, Controy Code, Region Code, Region Name, 
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
	  var locationData = JSON.parse(this.responseText);
	  generalUserData(locationData);
	}
};
xhttp.open("GET", "http://freegeoip.net/json/", true);
xhttp.send();

// Captures user data and performs the sending of information
function generalUserData(locationData){

	var data = new FormData();
	data.append('id_user', u);
	data.append('id_pixel_conversion', px);
	data.append('agent', browser());
	data.append('url', url);
	data.append('city', locationData.city);
	data.append('country_code', locationData.country_code);
	data.append('country_name', locationData.country_name);
	data.append('remote_addr', locationData.ip);
	data.append('region_code', locationData.region_code);
	data.append('region_name', locationData.region_name);
	data.append('time_zone', locationData.time_zone);
	data.append('latitude', locationData.latitude);
	data.append('longitude', locationData.longitude);

	var xhr = new XMLHttpRequest();
    // crossDomain: true
	xhr.open("POST", "http://tracking.dev/api/user/access-information", true);
    xhr.withCredentials = true;
	xhr.onload = function () {
		console.log(this.responseText);
	};
	xhr.send(data);
};
