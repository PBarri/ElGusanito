/*
 Triple Combo Script Credit
 By Philip M: http://www.codingforums.com/member.php?u=186
 Visit http://javascriptkit.com for this and over 400+ other scripts
 */

var categories = [];
categories["startList"] = ["Fútbol 11", "Fútbol 7", "Baloncesto", "Pádel", "Tenis"];
categories["Fútbol 11"] = ["Pista 1"];
categories["Fútbol 7"] = ["Pista 2", "Pista 3"];
categories["Baloncesto"] = ["Pista 4", "Pista 5"];
categories["Pádel"] = ["Pista 6", "Pista 7"];
categories["Tenis"] = ["Pista 8", "Pista 9"];
categories["Pista 1"] = ["10:00", "12:00", "14:00", "16:00", "18:00", "20:00", "22:00"];
categories["Pista 2"] = ["10:30", "12:30", "14:30", "16:30", "18:30", "20:30", "22:30"];
categories["Pista 3"] = ["10:30", "12:30", "14:30", "16:30", "18:30", "20:30", "22:30"];
categories["Pista 4"] = ["11:00", "13:00", "15:00", "17:00", "19:00", "21:00", "23:00"];
categories["Pista 5"] = ["11:00", "13:00", "15:00", "17:00", "19:00", "21:00", "23:00"];
categories["Pista 6"] = ["10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"];
categories["Pista 7"] = ["10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"];
categories["Pista 8"] = ["10:00", "12:00", "14:00", "16:00", "18:00", "20:00", "22:00"];
categories["Pista 9"] = ["10:00", "12:00", "14:00", "16:00", "18:00", "20:00", "22:00"];

var nLists = 3;
// number of select lists in the set

function fillSelect(currCat, currList) {
	var step = Number(currList.name.replace(/\D/g, ""));
	for( i = step; i < nLists + 1; i++) {
		document.forms['tripleplay']['List' + i].length = 1;
		document.forms['tripleplay']['List' + i].selectedIndex = 0;
	}
	var nCat = categories[currCat];
	for(each in nCat) {
		var nOption = document.createElement('option');
		var nData = document.createTextNode(nCat[each]);
		nOption.setAttribute('value', nCat[each]);
		nOption.appendChild(nData);
		currList.appendChild(nOption);
	}
}

function init() {
	fillSelect('startList', document.forms['tripleplay']['List1'])
}navigator.appName == "Microsoft Internet Explorer" ? attachEvent('onload', init, false) : addEventListener('load', init, false);
