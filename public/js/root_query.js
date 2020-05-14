$(function() {
  $("#CheckPassword").keyup(function() {
    var pass = $("#InputPassword").val();
    var checkPass = $("#CheckPassword").val();
    var span = $("#checkError");
    if (pass == checkPass) {
      span.text("OK!");
    } else {
      span.text("一致しません!");
    }
  });

  /*
|--------------------------------------------------------------------------
| 半角のみ許可
|--------------------------------------------------------------------------
*/

  jQuery(document).on("keydown", ".singleOnly", function(e) {
    let k = e.keyCode;
    let str = String.fromCharCode(k);
    // キーコードで許可する
    if (
      !(
        str.match(/[0-9]/) ||
        (37 <= k && k <= 40) ||
        k === 8 ||
        k === 46 ||
        (65 <= k && k <= 105) ||
        k === 109 ||
        k === 189
      )
    ) {
      return false;
    }
  });
  // キーアップ時に全角を空白に
  jQuery(document).on("keyup", ".singleOnly", function(e) {
    this.value = this.value.replace(/[^A-Za-z0-9\s.-]+/i, "");
  });
  // フォーカスが外れたときに全角を空白に
  jQuery(document).on("blur", ".singleOnly", function() {
    this.value = this.value.replace(/[^A-Za-z0-9\s.-]+/i, "");
  });

  // BP情報の表示・非表示
  $("#contract_type").change(function() {
    var c_type = $("#contract_type").val();
    var div = $(".bp_div");
    if (c_type == "BP個人") {
      div.show();
    } else if (c_type == "BP社員") {
      div.show();
    } else {
      div.hide();
    }
  });
});
