"use strict";

$(function() {
  //「契約金等」選択時のモーダル
  $(".sbChange").change(function() {
    var val = $(this).val();
    // 入金額取得
    // 親要素
    var parent = $(this).parent();
    // 一個前の要素
    var prev = parent.prev();
    // その子要素
    var children = prev.children();
    // その値
    var price = children.val();
    //備考取得
    var remark = parent
      .next()
      .next()
      .next()
      .children();
    if (val == "契約金等") {
      $("#p1").text("入金額　　：" + price + "円");
      $("#div4").dialog({
        modal: true,
        title: "内訳入力",
        buttons: {
          確認: function() {
            // インプットの取得
            var in1 = Number($("#input1").val());
            var in2 = Number($("#input2").val());
            var in3 = Number($("#input3").val());
            $("#p4").text($("#input1").val());
            $(this).dialog("close");
            $("#input4").val("");
            remark.val(
              "契約金：" +
                in1 +
                "円,\n" +
                "仲介手数料：" +
                in2 +
                "円,\n" +
                "広告料(その他)：" +
                in3 +
                "円\n"
            );
            remark.attr("readonly", true);
          },
          キャンセル: function() {
            $(this).dialog("close");
            $("#input4").val("");
          }
        }
      });
    } else {
      remark.attr("readonly", false);
      remark.val("");
    }
  });

  // モーダルの差額計算
  $("#div4").keyup(function() {
    var price = Number(
      $("#p1")
        .text()
        .replace(/入金額　　：/g, "")
        .replace(/円/g, "")
        .replace(/,/g, "")
    );
    var in1 = Number($("#input1").val());
    var in2 = Number($("#input2").val());
    var in3 = Number($("#input3").val());
    var difference = price - (in1 + in2 + in3);
    // 差額表示
    $("#input4").val(difference);
    // チェックメッセージ
    if (difference == 0) {
      $("#p2").text("OK");
    } else {
      $("#p2").text("NG");
    }
    console.log(in1);
  });
});
