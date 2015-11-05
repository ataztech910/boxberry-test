<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Delivery calculator</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/boxberry-test/frontend/css/bootstrap.css" />
<!-- Optional theme -->
<link rel="stylesheet" href="/boxberry-test/frontend/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="/boxberry-test/frontend/css/docs.min.css" />
<!-- Latest compiled and minified JavaScript -->
</head>
<body ng-app="boxberryApp">
<div class="container">
<h1>Форма расчета стоимости доставки</h1>
<div class="row">
<div class="col-md-9" ng-controller="mainForm">

<form  class="form-horizontal" ng-hide="userId">

	<div class="form-group" id="apid" >
	    <div class="col-xs-4">
	     <label for="weight">API ID</label>
		 <input class="form-control" type="text" ng-model="checkId" placeholder="введите API ID"  value="" /> 
		</div>
	  </div>

	  <button type="button" ng-click="enter(checkId)" class="btn btn-default">авторизовать</button>
</form>

<form  class="form-horizontal" ng-show="userId">

	  <div class="form-group" id="citylist">
	    <div class="col-xs-4">
	     <label for="cityfrom">Город</label>
	    <select name="currcityTo" ng-model="data.currcityTo" class="form-control">
	    	<option value="null">Выберите город-получатель</option> 
		    <option ng-repeat="cc in data.cityList"  value="{{cc.Code}}">{{cc.Name}}</option>
	    </select>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-xs-4">
	     <label for="weight">Вес</label>
		 <div class="input-group">
	     	<input class="form-control" ng-model="weight" type="number" min="1.2" value="{{weight}}" /> 
		 	<span class="input-group-addon">гр.</span>
	     </div>
	    </div>
	  </div>
	  
	  <div class="form-group">
	    <div class="col-xs-4">
	     <label for="weight">Стоимость товара</label>
	     <div class="input-group">
	     	<input class="form-control" ng-model="cost" type="number" min="0" value="{{cost}}" /> 
	     	<span class="input-group-addon">руб.</span>
	     </div>
	    </div>
	  </div>
	  
	   
	  <button type="button" ng-click="doit()" class="btn btn-default">Расчет</button>
	</form>
	<br><br>
<div class="loader"><img src="/boxberry-test/frontend/img/ajax-loader.gif"></div>
<div class="resultDiv" ng-show="result">
	
	<b>Итого в рублях: {{result.price}}</b><br>
	<b>Базовая стоимость: {{result.price_base}}</b><br>
	<b>Стоимость постоянных услуг: {{result.price_service}}</b>
	
</div>
</div>

</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/boxberry-test/frontend/js/bootstrap.min.js"></script>
<script src="/boxberry-test/frontend/js/angular.min.js"></script>
<script src="/boxberry-test/frontend/js/app.js"></script>
</body>
</html>