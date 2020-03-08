'use strict'

// 入金チェックに関するjs
var count = document.getElementById('count').value;
var year = document.getElementById('year').value;
if(document.getElementById('month').value < 10){
  var month = 0 + document.getElementById('month').value;
}else{
  var month = document.getElementById('month').value;
}
if(document.getElementById('day').value < 10){
  var day = 0 + document.getElementById('day').value;
}else{
  var day = document.getElementById('day').value;
}
var now = year + "-" + month + "-" + day;
var flag = false;

for (var i = 0; i < count; i++) {
  var pc_c = document.getElementById('pc_c_' + i);
  var cc_c = document.getElementById('cc_c_' + i);
  var td_c = document.getElementById('td_c_' + i);
  pc_c.addEventListener('click', function () {
    //id番号の取得
    var number = this.id.slice(5);
    //担当チェック取得
    var pCheck = document.getElementById('person_check_' + number);
    if (this.checked) {
      pCheck.value = now;
    } else {
      pCheck.value = '';
    }
  }, false);

  td_c.addEventListener('click', function () {
    //id番号の取得
    var number = this.id.slice(5);
    //送金予定日取得
    var tdCheck = document.getElementById('remittance_date_' + number);
    if (this.checked) {
      tdCheck.value = now;
    } else {
      tdCheck.value = '';
    }
  }, false);

  cc_c.addEventListener('click', function () {
    //id番号の取得
    var number = this.id.slice(5);
    //事務チェック取得
    var cCheck = document.getElementById('clerk_check_' + number);
    if (this.checked) {
      cCheck.value = now;
    } else {
      cCheck.value = '';
    }
  }, false);

}


// 物件登録（オーナー新規作成に関するjs）
function owners_select(obj) {
  var div = document.getElementById('owner_info');
  var idx = obj.selectedIndex;
  var value = obj.options[idx].value; // 値
  if (value == '新規作成') {
    div.style.display = "block";
  } else {
    div.style.display = "none";
  }
}
