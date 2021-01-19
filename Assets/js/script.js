var appId = '<373a1e70fd8a428e309f164c0274b176>';
var weatherApiUrl = 'http://api.openweathermap.org/data/2.5/weather?q=Chicago&appid=' + appId;

$(document).ready(function() {
    console.log( "ready!" );

    $('#city-name').text('this is city name');
    $('#current-temp').text('this is current temp');

    console.log('1) this is first');

    var storeData = 'Nothing';

    $('.show-me-weather').click(function(){
        $.getJSON(weatherApiUrl, function( cityTempData ) {
            // cityTempData is the json object
            console.log('2) output the api data here', cityTempData);
            $('#city-name').text(cityTempData.name);
            console.log('show me main object', cityTempData.main);
            $('#current-temp').text(cityTempData.main.temp);
        });
    });

    console.log('3) this should load last');
});