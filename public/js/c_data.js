$(function () {
  //ドキュメント読込時のdisplay
  var status = $("#statues").val();
  if (status == "---" || status == "その他") {
    $("#salesTitle").text("売上予定");
    $("#ps").css("display", "block");
  } else if (status == "申込") {
    $("#salesTitle").text("予定売上");
    $("#pbfSche").css("display", "block");
    $("#padSche").css("display", "block");
  } else {
    $("#salesTitle").text("確定売上");
    $("#pbf").css("display", "block");
    $("#pad").css("display", "block");
    $("#pos").css("display", "block");
    $("#dis").css("display", "block");
  }
  // 進捗情報更新画面　売上情報のdisplay切り替え
  $("#statues").change(function () {
    var status = $("#statues").val();
    if (status == "---" || status == "その他") {
      $("#salesTitle").text("売上予測");
      $("#ps").css("display", "block");
      $("#pbfSche").css("display", "none");
      $("#padSche").css("display", "none");
      $("#pbf").css("display", "none");
      $("#pad").css("display", "none");
      $("#pos").css("display", "none");
      $("#dis").css("display", "none");
    } else if (status == "申込") {
      $("#salesTitle").text("予定売上");
      $("#ps").css("display", "none");
      $("#pbfSche").css("display", "block");
      $("#padSche").css("display", "block");
      $("#pbf").css("display", "none");
      $("#pad").css("display", "none");
      $("#pos").css("display", "none");
      $("#dis").css("display", "none");
    } else {
      $("#salesTitle").text("確定売上");
      $("#ps").css("display", "none");
      $("#pbfSche").css("display", "none");
      $("#padSche").css("display", "none");
      $("#pbf").css("display", "block");
      $("#pad").css("display", "block");
      $("#pos").css("display", "block");
      $("#dis").css("display", "block");
    }
    $("#compass_status").val(status);
  });

  // 契約者と同じチェックボックス
  $("#sameCheck").click(function () {
    if ($(this).prop("checked") == true) {
      $("#d_name").val($("#c_name").val());
      $("#d_zipcode").val($("#zipcode").val());
      $("#d_address").val($("#address").val());
      $("#dm_name").val($("#mansion_name").val());
    } else {
      $("#d_name").val("");
      $("#d_zipcode").val("");
      $("#d_address").val("");
      $("#dm_name").val("");
    }
  });
});
