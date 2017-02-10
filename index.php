<?php
/*
	index.php
	-------------------------------------------------------------------------------
	Использование AutoRio API (https://github.com/ria-com/auto-ria-rest-api)
	для получения данных о продаваемых машинах
	-------------------------------------------------------------------------------
	Copyright (c) 2017
*/
$title = 'Калькулятор расчета стоимости автомобиля';


?>
<!DOCTYPE html>
<html lang="ru" xml:lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><? echo $title;?></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->  
  </head>

  <body role="document" style="width: 100%;">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <img src="http://www.auto-drom.com.ua/assets/uploads/logo_main.png.pagespeed.ce.oUhirHNbd4.png" alt="Autodrom">
        </div>
      </div>
    </div>
	
	<div class="container">
		<div class="row">
			<div id="calculator" class="col-md-12">	
				<h3>Калькулятор</h3>
				<form action="#" id="mainForm" role="form">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="body_id">Кузов</label>
								<select class="form-control" id="body_id" name="body_id" data-field="bodystyle" data-placeholder="Кузов" >
									<option value="0">Выберите</option>
									<option value="3">Седан</option>			
									<option value="5">Внедорожник / Кроссовер</option>
									<option value="8">Минивэн</option>
									<option value="4">Хэтчбек</option>
									<option value="2">Универсал</option>
									<option value="6">Купе</option>
									<option value="254">Легковой фургон (до 1,5 т)</option>
									<option value="7">Кабриолет</option>
									<option value="9">Пикап</option>
									<option value="307">Лифтбек</option>
									<option value="252">Лимузин</option>
									<option value="28">Другой</option>
								</select>
							</div>
							<div class="form-group">
								<label for="marka_id">Марка</label>
								<select class="form-control" id="marka_id"  name="marka_id" onchange="load_model();" data-field="brand" data-placeholder="Выберите">
									<option value="0">Выберите</option>
									<option value="98">Acura</option>
									<option value="2396">Adler</option>
									<option value="2">Aixam</option>
									<option value="3">Alfa Romeo</option>
									<option value="100">Alpine</option>
									<option value="3988">Altamarea</option>
									<option value="101">Aro</option>
									<option value="3105">Artega</option>
									<option value="4">Asia</option>
									<option value="5">Aston Martin</option>
									<option value="6">Audi</option>
									<option value="7">Austin</option>
									<option value="102">Autobianchi</option>
									<option value="103">Barkas (Баркас)</option>
									<option value="1540">Baw</option>
									<option value="105">Beijing</option>
									<option value="8">Bentley</option>
									<option value="106">Bertone</option>
									<option value="3127">Bio Auto</option>
									<option value="9">BMW</option>
									<option value="211">BOVA</option>
									<option value="329">Brilliance</option>
									<option value="10">Bristol</option>
									<option value="110">Buick</option>
									<option value="386">BYD</option>
									<option value="11">Cadillac</option>
									<option value="407">Chana</option>
									<option value="1580">Changan</option>
									<option value="1567">Changhe</option>
									<option value="190">Chery</option>
									<option value="13">Chevrolet</option>
									<option value="14">Chrysler</option>
									<option value="15">Citroen</option>
									<option value="17">Dacia</option>
									<option value="198">Dadi</option>
									<option value="18">Daewoo</option>
									<option value="115">Daf</option>
									<option value="1441">DAF / VDL</option>
									<option value="3717">Dagger</option>
									<option value="19">Daihatsu</option>
									<option value="20">Daimler</option>
									<option value="118">Dodge</option>
									<option value="308">Dongfeng</option>
									<option value="4495">DS</option>
									<option value="120">Eagle</option>
									<option value="121">FAW</option>
									<option value="22">Ferrari</option>
									<option value="23">Fiat</option>
									<option value="3444">Fisker</option>
									<option value="24">Ford</option>
									<option value="25">FSO</option>
									<option value="197">FUQI</option>
									<option value="4506">Gac</option>
									<option value="185">Geely</option>
									<option value="2790">Geo</option>
									<option value="123">GMC</option>
									<option value="183">Gonow</option>
									<option value="124">Great Wall</option>
									<option value="1575">Groz</option>
									<option value="191">Hafei</option>
									<option value="1784">Hanomag</option>
									<option value="28">Honda</option>
									<option value="379">Howo</option>
									<option value="2595">Huabei</option>
									<option value="388">Huanghai</option>
									<option value="127">Hummer</option>
									<option value="4663">Humvee</option>
									<option value="29">Hyundai</option>
									<option value="128">Infiniti</option>
									<option value="3821">Iran Khodro</option>
									<option value="30">Isuzu</option>
									<option value="175">Iveco</option>
									<option value="317">JAC</option>
									<option value="31">Jaguar</option>
									<option value="1590">JCB</option>
									<option value="32">Jeep</option>
									<option value="335">Jiangnan</option>
									<option value="2231">Jinbei</option>
									<option value="1574">Jonway</option>
									<option value="412">Karosa</option>
									<option value="33">Kia</option>
									<option value="2676">King Long</option>
									<option value="4843">Kirkham</option>
									<option value="4000">Konecranes</option>
									<option value="35">Lamborghini</option>
									<option value="36">Lancia</option>
									<option value="37">Land Rover</option>
									<option value="406">Landwind</option>
									<option value="134">LDV</option>
									<option value="38">Lexus</option>
									<option value="334">Lifan</option>
									<option value="135">Lincoln</option>
									<option value="41">Lotus</option>
									<option value="45">Maserati</option>
									<option value="46">Maybach</option>
									<option value="47">Mazda</option>
									<option value="3101">McLaren</option>
									<option value="1904">MEGA</option>
									<option value="48">Mercedes-Benz</option>
									<option value="144">Mercury</option>
									<option value="49">MG</option>
									<option value="147">MINI</option>
									<option value="52">Mitsubishi</option>
									<option value="53">Morgan</option>
									<option value="55">Nissan</option>
									<option value="2045">Nysa (Ныса)</option>
									<option value="148">Oldsmobile</option>
									<option value="2963">Oltcit</option>
									<option value="56">Opel</option>
									<option value="3193">Packard</option>
									<option value="346">Peterbilt</option>
									<option value="58">Peugeot</option>
									<option value="181">Plymouth</option>
									<option value="149">Pontiac</option>
									<option value="59">Porsche</option>
									<option value="60">Proton</option>
									<option value="1332">Quicksilver</option>
									<option value="4681">Ravon</option>
									<option value="62">Renault</option>
									<option value="4698">Renault Samsung Motors</option>
									<option value="4466">Rezvani</option>
									<option value="63">Rolls-Royce</option>
									<option value="64">Rover</option>
									<option value="65">Saab</option>
									<option value="3437">Saipa</option>
									<option value="192">Samand</option>
									<option value="325">Samsung</option>
									<option value="331">Saturn</option>
									<option value="3268">Scion</option>
									<option value="67">Seat</option>
									<option value="3100">Shelby</option>
									<option value="195">Shuanghuan</option>
									<option value="70">Skoda</option>
									<option value="311">SMA</option>
									<option value="71">Smart</option>
									<option value="194">SouEast</option>
									<option value="73">SsangYong</option>
									<option value="75">Subaru</option>
									<option value="76">Suzuki</option>
									<option value="77">Talbot</option>
									<option value="2497">Tarpan Honker</option>
									<option value="78">TATA</option>
									<option value="204">Tatra</option>
									<option value="2233">Tesla</option>
									<option value="1578">Tianma</option>
									<option value="2050">Tiger</option>
									<option value="2552">Tofas</option>
									<option value="79">Toyota</option>
									<option value="345">Trabant</option>
									<option value="80">Triumph</option>
									<option value="206">Van Hool</option>
									<option value="82">Vauxhall</option>
									<option value="3320">Vepr</option>
									<option value="84">Volkswagen</option>
									<option value="85">Volvo</option>
									<option value="2021">Wanderer</option>
									<option value="2403">Wanfeng</option>
									<option value="339">Wartburg</option>
									<option value="1820">Willys</option>
									<option value="2653">Wuling</option>
									<option value="338">Xin kai</option>
									<option value="87">Yugo</option>
									<option value="2309">Zastava</option>
									<option value="3089">Zuk</option>
									<option value="322">ZX</option>
									<option value="188">Богдан</option>
									<option value="88">ВАЗ</option>
									<option value="90">ВИС</option>
									<option value="91">ГАЗ</option>
									<option value="410">ГолАЗ</option>
									<option value="165">Другое</option>
									<option value="170">ЕРАЗ</option>
									<option value="89">ЗАЗ</option>
									<option value="168">ЗИЛ</option>
									<option value="1544">ЗИМ</option>
									<option value="186">ЗИС</option>
									<option value="92">ИЖ</option>
									<option value="189">ЛуАЗ</option>
									<option value="94">Москвич / АЗЛК</option>
									<option value="153">ООО  Трактор</option>
									<option value="327">РАФ</option>
									<option value="199">Ретро автомобили</option>
									<option value="2863">Самодельный</option>
									<option value="2491">СМЗ</option>
									<option value="93">УАЗ</option>
									
									
									
								</select>
							</div>
							<div class="form-group">
								<label for="model_id">Модель</label>
								<select class="form-control" id="model_id"  name="model_id" data-field="model" data-placeholder="Выберите">
									<option value="0">Выберите</option>
								</select>
							</div>
							<div class="form-group">
								<label for="label m-view">Год</label>
								<div class="row">
									<div class="flex-group-form">
										<div class="col-md-6">
											<input class="form-control"  type="text" id="yers_gte" name="yers_gte" placeholder="от">
										</div>
										<div class="col-md-6">
											<input class="form-control"  type="text" id="yers_lte" name="yers_lte" placeholder="до" value="">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="label m-view">Пробег (тыс км)</label>
								<div class="row">
									<div class="flex-group-form">
										<div class="col-md-6">
											<input class="form-control" type="text" id="raceInt_gte" name="raceInt_gte" placeholder="от">
										</div>
										<div class="col-md-6">
											<input class="form-control" type="text" id="raceInt_lte" name="raceInt_lte" placeholder="до" value="">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6"> 
							<div class="form-group">
								<label for="state">Регион</label>
								<select  class="form-control" id="state_id" name="state_id" onchange="load_cities();" data-placeholder="Регион">
									<option value="0">Выберите</option>
									<option value="1">Винницкая</option>
									<option value="18">Волынская</option>
									<option value="11">Днепропетровская</option>
									<option value="13">Донецкая</option>
									<option value="2">Житомирская</option>
									<option value="22">Закарпатская</option>
									<option value="14">Запорожская</option>
									<option value="15">Ивано-Франковская</option>
									<option value="10">Киевская</option>
									<option value="16">Кировоградская</option>
									<option value="17">Луганская</option>
									<option value="5">Львовская</option>
									<option value="19">Николаевская</option>
									<option value="12">Одесская</option>
									<option value="20">Полтавская</option>
									<option value="21">Республика Крым</option>
									<option value="9">Ровенская</option>
									<option value="8">Сумская</option>
									<option value="3">Тернопольская</option>
									<option value="7">Харьковская</option>
									<option value="23">Херсонская</option>
									<option value="4">Хмельницкая</option>
									<option value="24">Черкасская</option>
									<option value="6">Черниговская</option>
									<option value="25">Черновицкая</option>
								</select>
							</div>
							<div class="form-group">
								<label  for="city_id">Город:</label>
								<select class="form-control" id="city_id" name="city_id" data-field="city[0]" data-placeholder="Город">
									<option value="0">Выберите</option>				

								</select>
							</div>
							<div class="form-group">
								<label for="gear_id">КПП</label>
								<select class="form-control" id="gear_id" name="gear_id" data-field="gearbox[0]" data-placeholder="КПП">
									<option value="0">Выберите</option>
									<option value="1">Ручная / Механика</option>
									<option value="2">Автомат</option>
									<option value="3">Типтроник</option>
									<option value="4">Адаптивная</option>
									<option value="5">Вариатор</option>  
								</select>
							</div>
							<div class="form-group">
								<label for="fuel_id">Топливо</label>
								<select class="form-control" id="fuel_id" name="fuel_id" data-field="type[0]" data-placeholder="Топливо">
									<option value="0">Выберите</option>
									<!--minify-->
									<option value="1">Бензин</option>
									<option value="2">Дизель</option>
									<option value="3">Газ</option>
									<option value="4">Газ/бензин</option>
									<option value="5">Гибрид</option>
									<option value="6">Электро</option>
									<option value="7">Другое</option>
									<option value="8">Газ метан</option>
									<option value="9">Газ пропан-бутан</option>
								</select>
							</div>
							<div class="form-group">
								<label for="custom">Растаможка</label>
								<select class="form-control" id="custom" name="custom" data-field="custom" data-placeholder="Регион">
									<option value="0">Растаможенные</option>
									<option value="1">Нерастаможенные</option>
								</select>
							</div>
							<a class="btn btn-default" onclick="send_request();" >Рассчитать цену</a>
						</div>
					</div>
				</form>
				<br>
			</div>
			<div id="calc_result" class="col-md-12 h1 text-center">
			</div>
		</div>
	</div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="functions.js"></script>
	<script>

	
	</script>
  </body>
</html>
