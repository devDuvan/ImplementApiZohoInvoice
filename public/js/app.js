var $shortData=document.getElementById('ShortData');
var $largeData=document.getElementById('LargeData');
var $itemsSecundary=document.getElementsByClassName('data-secundary');

var showAllData = function () {
$shortData.classList.remove('hidden');
$largeData.classList.add('hidden');
	for (var i = 0; i < $itemsSecundary.length; i++) {
		$itemsSecundary[i].classList.remove('hidden');
	}
}

var showPrincipalData = function () {
$shortData.classList.add('hidden');
$largeData.classList.remove('hidden');
	for (var i = 0; i < $itemsSecundary.length; i++) {
		$itemsSecundary[i].classList.add('hidden');
	}
}

$shortData.addEventListener('click',showPrincipalData);
$largeData.addEventListener('click',showAllData);