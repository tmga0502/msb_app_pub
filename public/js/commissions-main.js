"use strict";

console.log(jsArray);

for(var i = 0; i < jsArray.length; i++){
    // function selectboxChange[i]() {
    var nominal = document.getElementsByName('nominal[' + i + ']');
    // var selindex = document.form1.nominal.selectedIndex;
    console.log(nominal.selectedIndex);
    // }
    // console.log(csv[i]['id']);
}

function selectboxChange(obj) {
	var idx = obj.selectedIndex;
	var value = obj.options[idx].value;
	var lastchild = obj.parentNode.parentNode.lastElementChild;
	var remark = lastchild.children[0];
	if(value === '契約金等'){
		remark.value = "契約金：0円 \n仲介手数料：0円 \n広告料：0円";
	}else{
		remark.value = "";
	}
}