

function load_cities()
{
	var region = $('#state_id').val();
	if (region != 0){
		$.get('http://api.auto.ria.com/states/'+region+'/cities', 
			function( city_list ){
				var i, result_length = city_list.length, res_str = '';
				for( i = 1; i < result_length; i++){
					res_str += '<option value="'+city_list[i]['value']+'">'+city_list[i]['name'] + '</option>';
				}
				$('#city_id').html( '<option value="0">Выберите</option>' );
				$('#city_id').append( res_str );
			}
		);
	} else {
		$('#city_id').html( '<option value="0">Выберите</option>' );
	}
}

function load_marka()
{
	var body = $("#body_id").val();
	if (body != 0){
		$.get('http://api.auto.ria.com/categories/1/marks', 
			function( list ){
				var i, result_length = list.length, res_str = '';
				for( i = 1; i < result_length; i++){
					res_str += '<option value="'+list[i]['value']+'">'+list[i]['name'] + '</option>';
				}
				$('#marka_id').html( '<option value="0">Выберите</option>' );
				$('#marka_id').append( res_str );
			}
		);
		
	} else {
		$("#marka_id").html( '<option value="0">Выберите</option>' );
	}
}

function load_model()
{
	var marka = $("#marka_id").val();
	if (marka != 0){
		$.get('http://api.auto.ria.com/categories/1/marks/'+marka+'/models', 
			function( list ){
				var i, result_length = list.length, res_str = '';
				for( i = 1; i < result_length; i++){
					res_str += '<option value="'+list[i]['value']+'">'+list[i]['name'] + '</option>';
				}
				$('#model_id').html( '<option value="0">Выберите</option>' );
				$('#model_id').append( res_str );
			}
		);
		
	} else {
		$("#model_id").html( '<option value="0">Выберите</option>' );
	}
}

function send_request()
{
	var request = "", years = 0, year_arr = [], races = 0, race = [];
	if ( $("#body_id").val() != 0)		request += "&body_id="+$("#body_id").val();
	if ( $("#marka_id").val() != 0)		request += "&marka_id="+$("#marka_id").val();
	if ( $("#model_id").val() != 0)		request += "&model_id="+$("#model_id").val();
	if ( $("#yers_gte").val() != "")		{ 	request += "&yers="+$("#yers_gte").val(); year_arr.push( $("#yers_gte").val() ); years++; }
	if ( $("#yers_lte").val() != "")		{	request += "&yers="+$("#yers_lte").val(); year_arr.push( $("#yers_lte").val() ); years++; }
	if ( $("#raceInt_gte").val() != "")		{	request += "&raceInt="+$("#raceInt_gte").val();	race.push( $("#raceInt_gte").val() ); races++; }
	if ( $("#raceInt_lte").val() != "")		{	request += "&raceInt="+$("#raceInt_lte").val();	race.push( $("#raceInt_lte").val() ); races++; }
	if ( $("#state_id").val() != 0)		request += "&state_id="+$("#state_id").val();
	if ( $("#city_id").val() != 0)		request += "&city_id="+$("#city_id").val();
	if ( $("#gear_id").val() != 0)		request += "&gear_id="+$("#gear_id").val();
	if ( $("#fuel_id").val() != 0)		request += "&fuel_id="+$("#fuel_id").val();
	if ( $("#custom").val() != 0)		request += "&custom="+$("#custom").val();
	
	$.get( "http://api.auto.ria.com/average?main_category=1"+request, 
		function( list ){
			
			var out_string = "Средняя цена на " + $("#body_id  :selected").html() + " ";
			
			if ($("#marka_id").val() != 0){
				out_string += $("#marka_id  :selected").html() + " ";
			}
			if ($("#model_id").val() != 0){
				out_string += $("#model_id  :selected").html() + " ";
			}
			if (years == 1) {
				out_string += year_arr[0] + " года выпуска ";
			}
			if (years == 2){
				out_string += year_arr[0] + "-" + year_arr[1] + " годов выпуска ";
			}
			if (races == 1){
				out_string += " с пробегом " + race[0] + " тыс.км ";
			}
			if (races == 2){
				out_string += " с пробегом от " + race[0] + " до " + race[1] + " тыс.км ";
			}
			if (list['arithmeticMean'] != null){
				out_string += "составляет $" + parseInt(list['interQuartileMean']) ;
			} else {
				out_string += "не найдена... Нет данных." ;
			}
			$("#calc_result").html( out_string );
		}
	);
	
}