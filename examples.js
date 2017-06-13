//// in this file a example of a request to the kermisFM api /// 



var apitoken = "*********"; // token deze haal je op met bijv php of je beschikt over een permantente token. 
var eindpunt ="gids/"; //  eindpunt (welke api wil je gebruiken) 
var actie = "gids"; // welke actie moet moet er worden ingevuld ? 

var commando_post =  {
token: apitoken,
anderpostveld: "andere waarde"
}; 

$.post("https://api.kermisfm.nl/"+eindpunt+"/?actie="+actie, commando_post, function (result) {



var obj = JSON.parse(result); /// je result is in json even omzetten naar javascript object
console.log(obj); //in het console van je browser laten zien! 
});
