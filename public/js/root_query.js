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
});
