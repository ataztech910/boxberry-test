var cabinetApp = angular.module('boxberryApp',[]);
var server = "/boxberry-test/index.php/";
var userId = getCookie('userId');
var method = new Array ();
method[0] =  'ListCities';
method[1] =  'DeliveryCosts';

cabinetApp.controller('mainForm',['$scope','$http',function($scope, $http){
	
	$scope.userId = userId;
	$scope.checkId = "";
	$scope.weight = 1.2;
	$scope.cost = 0;
	$scope.result=0;
		
	$scope.getCityList = function(){
		$http({
		    url: server+method[0]+"/"+$scope.userId, 
		    method: "GET"
		})
		.then(function(response) {
			 $scope.data= {
			 	 'currcityTo':null,
				 'cityList':response.data
			 };
		});	
	};
	 
	$scope.doit = function(){
		
		if($scope.data['currcityTo']>0){
			$('.loader').show();	
			$('#citylist').removeClass('has-error');
			$http({
		    url: server+method[1]+"/"+$scope.userId+"?weight="+$scope.weight+"&target="+$scope.data['currcityTo']+"&ordersum="+$scope.cost+"&deliverysum=0&paysum=0", 
		    method: "GET"
			})
			.then(function(response) {
				 $('.loader').hide();
				 $scope.result = response.data;
			});
		}else{
			$('#citylist').addClass('has-error');
		}
	};
	 
	$scope.enter = function(id){
		if(id=="11570.pbpqebfc"){
			$scope.userId = id;
			setCookie('userId',id);
			$scope.getCityList();
		}
		else{
			$('#apid').addClass('has-error');
		}
	};
	
	if(userId!="") $scope.getCityList();

	
}]);
//--------------------------------------------------
function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
//--------------------------------------------------
function setCookie(name, value, options) {
  options = options || {};

  var expires = options.expires;

  if (typeof expires == "number" && expires) {
    var d = new Date();
    d.setTime(d.getTime() + expires * 1000);
    expires = options.expires = d;
  }
  if (expires && expires.toUTCString) {
    options.expires = expires.toUTCString();
  }

  value = encodeURIComponent(value);

  var updatedCookie = name + "=" + value;

  for (var propName in options) {
    updatedCookie += "; " + propName;
    var propValue = options[propName];
    if (propValue !== true) {
      updatedCookie += "=" + propValue;
    }
  }

  document.cookie = updatedCookie;
}


