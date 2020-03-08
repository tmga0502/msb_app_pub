$(function() {
  $("#selectPiriod").change(function() {
    var val = Number($(this).val());
    var fh = val + 2009;
    var ah = val + 2010;
    $(".R_year_fh").text(fh + "年");
    $(".R_year_ah").text(ah + "年");
    $("#S_piriod").text("第" + val + "期");
  });

  // $(document).keyup(function() {
  //   // 必達1・ストレッチ10月
  //   var R_rent_my_10 = Number($("#R_rent_my_10").val());
  //   var R_rent_int_10 = Number($("#R_rent_int_10").val());
  //   var R_bs_my_10 = Number($("#R_bs_my_10").val());
  //   var R_bs_int_10 = Number($("#R_bs_int_10").val());
  //   var S_rent_my_10 = Number($("#S_rent_my_10").val());
  //   var S_rent_int_10 = Number($("#S_rent_int_10").val());
  //   var S_bs_my_10 = Number($("#S_bs_my_10").val());
  //   var S_bs_int_10 = Number($("#S_bs_int_10").val());
  //   // 必達・ストレッチ11月
  //   var R_rent_my_11 = Number($("#R_rent_my_11").val());
  //   var R_rent_int_11 = Number($("#R_rent_int_11").val());
  //   var R_bs_my_11 = Number($("#R_bs_my_11").val());
  //   var R_bs_int_11 = Number($("#R_bs_int_11").val());
  //   var S_rent_my_11 = Number($("#S_rent_my_11").val());
  //   var S_rent_int_11 = Number($("#S_rent_int_11").val());
  //   var S_bs_my_11 = Number($("#S_bs_my_11").val());
  //   var S_bs_int_11 = Number($("#S_bs_int_11").val());
  //   // 必達・ストレッチ12月
  //   var R_rent_my_12 = Number($("#R_rent_my_12").val());
  //   var R_rent_int_12 = Number($("#R_rent_int_12").val());
  //   var R_bs_my_12 = Number($("#R_bs_my_12").val());
  //   var R_bs_int_12 = Number($("#R_bs_int_12").val());
  //   var S_rent_my_12 = Number($("#S_rent_my_12").val());
  //   var S_rent_int_12 = Number($("#S_rent_int_12").val());
  //   var S_bs_my_12 = Number($("#S_bs_my_12").val());
  //   var S_bs_int_12 = Number($("#S_bs_int_12").val());
  //   // 必達・ストレッチ1月
  //   var R_rent_my_1 = Number($("#R_rent_my_1").val());
  //   var R_rent_int_1 = Number($("#R_rent_int_1").val());
  //   var R_bs_my_1 = Number($("#R_bs_my_1").val());
  //   var R_bs_int_1 = Number($("#R_bs_int_1").val());
  //   var S_rent_my_1 = Number($("#S_rent_my_1").val());
  //   var S_rent_int_1 = Number($("#S_rent_int_1").val());
  //   var S_bs_my_1 = Number($("#S_bs_my_1").val());
  //   var S_bs_int_1 = Number($("#S_bs_int_1").val());
  //   // 必達・ストレッチ2月
  //   var R_rent_my_2 = Number($("#R_rent_my_2").val());
  //   var R_rent_int_2 = Number($("#R_rent_int_2").val());
  //   var R_bs_my_2 = Number($("#R_bs_my_2").val());
  //   var R_bs_int_2 = Number($("#R_bs_int_2").val());
  //   var S_rent_my_2 = Number($("#S_rent_my_2").val());
  //   var S_rent_int_2 = Number($("#S_rent_int_2").val());
  //   var S_bs_my_2 = Number($("#S_bs_my_2").val());
  //   var S_bs_int_2 = Number($("#S_bs_int_2").val());
  //   // 必達・ストレッチ3月
  //   var R_rent_my_3 = Number($("#R_rent_my_3").val());
  //   var R_rent_int_3 = Number($("#R_rent_int_3").val());
  //   var R_bs_my_3 = Number($("#R_bs_my_3").val());
  //   var R_bs_int_3 = Number($("#R_bs_int_3").val());
  //   var S_rent_my_3 = Number($("#S_rent_my_3").val());
  //   var S_rent_int_3 = Number($("#S_rent_int_3").val());
  //   var S_bs_my_3 = Number($("#S_bs_my_3").val());
  //   var S_bs_int_3 = Number($("#S_bs_int_3").val());
  //   // 必達・ストレッチ4月
  //   var R_rent_my_4 = Number($("#R_rent_my_4").val());
  //   var R_rent_int_4 = Number($("#R_rent_int_4").val());
  //   var R_bs_my_4 = Number($("#R_bs_my_4").val());
  //   var R_bs_int_4 = Number($("#R_bs_int_4").val());
  //   var S_rent_my_4 = Number($("#S_rent_my_4").val());
  //   var S_rent_int_4 = Number($("#S_rent_int_4").val());
  //   var S_bs_my_4 = Number($("#S_bs_my_4").val());
  //   var S_bs_int_4 = Number($("#S_bs_int_4").val());
  //   // 必達・ストレッチ5月
  //   var R_rent_my_5 = Number($("#R_rent_my_5").val());
  //   var R_rent_int_5 = Number($("#R_rent_int_5").val());
  //   var R_bs_my_5 = Number($("#R_bs_my_5").val());
  //   var R_bs_int_5 = Number($("#R_bs_int_5").val());
  //   var S_rent_my_5 = Number($("#S_rent_my_5").val());
  //   var S_rent_int_5 = Number($("#S_rent_int_5").val());
  //   var S_bs_my_5 = Number($("#S_bs_my_5").val());
  //   var S_bs_int_5 = Number($("#S_bs_int_5").val());
  //   // 必達・ストレッチ6月
  //   var R_rent_my_6 = Number($("#R_rent_my_6").val());
  //   var R_rent_int_6 = Number($("#R_rent_int_6").val());
  //   var R_bs_my_6 = Number($("#R_bs_my_6").val());
  //   var R_bs_int_6 = Number($("#R_bs_int_6").val());
  //   var S_rent_my_6 = Number($("#S_rent_my_6").val());
  //   var S_rent_int_6 = Number($("#S_rent_int_6").val());
  //   var S_bs_my_6 = Number($("#S_bs_my_6").val());
  //   var S_bs_int_6 = Number($("#S_bs_int_6").val());
  //   // 必達・ストレッチ7月
  //   var R_rent_my_7 = Number($("#R_rent_my_7").val());
  //   var R_rent_int_7 = Number($("#R_rent_int_7").val());
  //   var R_bs_my_7 = Number($("#R_bs_my_7").val());
  //   var R_bs_int_7 = Number($("#R_bs_int_7").val());
  //   var S_rent_my_7 = Number($("#S_rent_my_7").val());
  //   var S_rent_int_7 = Number($("#S_rent_int_7").val());
  //   var S_bs_my_7 = Number($("#S_bs_my_7").val());
  //   var S_bs_int_7 = Number($("#S_bs_int_7").val());
  //   // 必達・ストレッチ8月
  //   var R_rent_my_8 = Number($("#R_rent_my_8").val());
  //   var R_rent_int_8 = Number($("#R_rent_int_8").val());
  //   var R_bs_my_8 = Number($("#R_bs_my_8").val());
  //   var R_bs_int_8 = Number($("#R_bs_int_8").val());
  //   var S_rent_my_8 = Number($("#S_rent_my_8").val());
  //   var S_rent_int_8 = Number($("#S_rent_int_8").val());
  //   var S_bs_my_8 = Number($("#S_bs_my_8").val());
  //   var S_bs_int_8 = Number($("#S_bs_int_8").val());
  //   // 必達・ストレッチ9月
  //   var R_rent_my_9 = Number($("#R_rent_my_9").val());
  //   var R_rent_int_9 = Number($("#R_rent_int_9").val());
  //   var R_bs_my_9 = Number($("#R_bs_my_9").val());
  //   var R_bs_int_9 = Number($("#R_bs_int_9").val());
  //   var S_rent_my_9 = Number($("#S_rent_my_9").val());
  //   var S_rent_int_9 = Number($("#S_rent_int_9").val());
  //   var S_bs_my_9 = Number($("#S_bs_my_9").val());
  //   var S_bs_int_9 = Number($("#S_bs_int_9").val());

  //   var R_rent_sum_10 = R_rent_my_10 + R_rent_int_10 + R_bs_my_10 + R_bs_int_10;
  //   var R_rent_sum_11 = R_rent_my_11 + R_rent_int_11 + R_bs_my_11 + R_bs_int_11;
  //   var R_rent_sum_12 = R_rent_my_12 + R_rent_int_12 + R_bs_my_12 + R_bs_int_12;
  //   var R_rent_sum_1 = R_rent_my_1 + R_rent_int_1 + R_bs_my_1 + R_bs_int_1;
  //   var R_rent_sum_2 = R_rent_my_2 + R_rent_int_2 + R_bs_my_2 + R_bs_int_2;
  //   var R_rent_sum_3 = R_rent_my_3 + R_rent_int_3 + R_bs_my_3 + R_bs_int_3;
  //   var R_rent_sum_4 = R_rent_my_4 + R_rent_int_4 + R_bs_my_4 + R_bs_int_4;
  //   var R_rent_sum_5 = R_rent_my_5 + R_rent_int_5 + R_bs_my_5 + R_bs_int_5;
  //   var R_rent_sum_6 = R_rent_my_6 + R_rent_int_6 + R_bs_my_6 + R_bs_int_6;
  //   var R_rent_sum_7 = R_rent_my_7 + R_rent_int_7 + R_bs_my_7 + R_bs_int_7;
  //   var R_rent_sum_8 = R_rent_my_8 + R_rent_int_8 + R_bs_my_8 + R_bs_int_8;
  //   var R_rent_sum_9 = R_rent_my_9 + R_rent_int_9 + R_bs_my_9 + R_bs_int_9;
  //   var S_rent_sum_10 = S_rent_my_10 + S_rent_int_10 + S_bs_my_10 + S_bs_int_10;
  //   var S_rent_sum_11 = S_rent_my_11 + S_rent_int_11 + S_bs_my_11 + S_bs_int_11;
  //   var S_rent_sum_12 = S_rent_my_12 + S_rent_int_12 + S_bs_my_12 + S_bs_int_12;
  //   var S_rent_sum_1 = S_rent_my_1 + S_rent_int_1 + S_bs_my_1 + S_bs_int_1;
  //   var S_rent_sum_2 = S_rent_my_2 + S_rent_int_2 + S_bs_my_2 + S_bs_int_2;
  //   var S_rent_sum_3 = S_rent_my_3 + S_rent_int_3 + S_bs_my_3 + S_bs_int_3;
  //   var S_rent_sum_4 = S_rent_my_4 + S_rent_int_4 + S_bs_my_4 + S_bs_int_4;
  //   var S_rent_sum_5 = S_rent_my_5 + S_rent_int_5 + S_bs_my_5 + S_bs_int_5;
  //   var S_rent_sum_6 = S_rent_my_6 + S_rent_int_6 + S_bs_my_6 + S_bs_int_6;
  //   var S_rent_sum_7 = S_rent_my_7 + S_rent_int_7 + S_bs_my_7 + S_bs_int_7;
  //   var S_rent_sum_8 = S_rent_my_8 + S_rent_int_8 + S_bs_my_8 + S_bs_int_8;
  //   var S_rent_sum_9 = S_rent_my_9 + S_rent_int_9 + S_bs_my_9 + S_bs_int_9;
  //   //必達賃貸自己案件合計
  //   var R_rent_my_sum =
  //     R_rent_my_10 +
  //     R_rent_my_11 +
  //     R_rent_my_12 +
  //     R_rent_my_1 +
  //     R_rent_my_2 +
  //     R_rent_my_3 +
  //     R_rent_my_4 +
  //     R_rent_my_5 +
  //     R_rent_my_6 +
  //     R_rent_my_7 +
  //     R_rent_my_8 +
  //     R_rent_my_9;
  //   //必達賃貸紹介案件合計
  //   var R_rent_int_sum =
  //     R_rent_int_10 +
  //     R_rent_int_11 +
  //     R_rent_int_12 +
  //     R_rent_int_1 +
  //     R_rent_int_2 +
  //     R_rent_int_3 +
  //     R_rent_int_4 +
  //     R_rent_int_5 +
  //     R_rent_int_6 +
  //     R_rent_int_7 +
  //     R_rent_int_8 +
  //     R_rent_int_9;
  //   //必達売買自己案件合計
  //   var R_bs_my_sum =
  //     R_bs_my_10 +
  //     R_bs_my_11 +
  //     R_bs_my_12 +
  //     R_bs_my_1 +
  //     R_bs_my_2 +
  //     R_bs_my_3 +
  //     R_bs_my_4 +
  //     R_bs_my_5 +
  //     R_bs_my_6 +
  //     R_bs_my_7 +
  //     R_bs_my_8 +
  //     R_bs_my_9;
  //   //必達売買紹介案件合計
  //   var R_bs_int_sum =
  //     R_bs_int_10 +
  //     R_bs_int_11 +
  //     R_bs_int_12 +
  //     R_bs_int_1 +
  //     R_bs_int_2 +
  //     R_bs_int_3 +
  //     R_bs_int_4 +
  //     R_bs_int_5 +
  //     R_bs_int_6 +
  //     R_bs_int_7 +
  //     R_bs_int_8 +
  //     R_bs_int_9;
  //   //ストレッチ賃貸自己案件合計
  //   var S_rent_my_sum =
  //     S_rent_my_10 +
  //     S_rent_my_11 +
  //     S_rent_my_12 +
  //     S_rent_my_1 +
  //     S_rent_my_2 +
  //     S_rent_my_3 +
  //     S_rent_my_4 +
  //     S_rent_my_5 +
  //     S_rent_my_6 +
  //     S_rent_my_7 +
  //     S_rent_my_8 +
  //     S_rent_my_9;
  //   //ストレッチ賃貸紹介案件合計
  //   var S_rent_int_sum =
  //     S_rent_int_10 +
  //     S_rent_int_11 +
  //     S_rent_int_12 +
  //     S_rent_int_1 +
  //     S_rent_int_2 +
  //     S_rent_int_3 +
  //     S_rent_int_4 +
  //     S_rent_int_5 +
  //     S_rent_int_6 +
  //     S_rent_int_7 +
  //     S_rent_int_8 +
  //     S_rent_int_9;
  //   //ストレッチ売買自己案件合計
  //   var S_bs_my_sum =
  //     S_bs_my_10 +
  //     S_bs_my_11 +
  //     S_bs_my_12 +
  //     S_bs_my_1 +
  //     S_bs_my_2 +
  //     S_bs_my_3 +
  //     S_bs_my_4 +
  //     S_bs_my_5 +
  //     S_bs_my_6 +
  //     S_bs_my_7 +
  //     S_bs_my_8 +
  //     S_bs_my_9;
  //   //ストレッチ売買紹介案件合計
  //   var S_bs_int_sum =
  //     S_bs_int_10 +
  //     S_bs_int_11 +
  //     S_bs_int_12 +
  //     S_bs_int_1 +
  //     S_bs_int_2 +
  //     S_bs_int_3 +
  //     S_bs_int_4 +
  //     S_bs_int_5 +
  //     S_bs_int_6 +
  //     S_bs_int_7 +
  //     S_bs_int_8 +
  //     S_bs_int_9;
  //   //必達総合計
  //   var R_sum =
  //     R_rent_sum_10 +
  //     R_rent_sum_11 +
  //     R_rent_sum_12 +
  //     R_rent_sum_1 +
  //     R_rent_sum_2 +
  //     R_rent_sum_3 +
  //     R_rent_sum_4 +
  //     R_rent_sum_5 +
  //     R_rent_sum_6 +
  //     R_rent_sum_7 +
  //     R_rent_sum_8 +
  //     R_rent_sum_9;
  //   //ストレッチ総合計
  //   var S_sum =
  //     S_rent_sum_10 +
  //     S_rent_sum_11 +
  //     S_rent_sum_12 +
  //     S_rent_sum_1 +
  //     S_rent_sum_2 +
  //     S_rent_sum_3 +
  //     S_rent_sum_4 +
  //     S_rent_sum_5 +
  //     S_rent_sum_6 +
  //     S_rent_sum_7 +
  //     S_rent_sum_8 +
  //     S_rent_sum_9;

  //   // 必達・各月
  //   $("#R_sum_10").val(R_rent_sum_10);
  //   $("#R_sum_11").val(R_rent_sum_11);
  //   $("#R_sum_12").val(R_rent_sum_12);
  //   $("#R_sum_1").val(R_rent_sum_1);
  //   $("#R_sum_2").val(R_rent_sum_2);
  //   $("#R_sum_3").val(R_rent_sum_3);
  //   $("#R_sum_4").val(R_rent_sum_4);
  //   $("#R_sum_5").val(R_rent_sum_5);
  //   $("#R_sum_6").val(R_rent_sum_6);
  //   $("#R_sum_7").val(R_rent_sum_7);
  //   $("#R_sum_8").val(R_rent_sum_8);
  //   $("#R_sum_9").val(R_rent_sum_9);

  //   // ストレッチ・各月
  //   $("#S_sum_10").val(S_rent_sum_10);
  //   $("#S_sum_11").val(S_rent_sum_11);
  //   $("#S_sum_12").val(S_rent_sum_12);
  //   $("#S_sum_1").val(S_rent_sum_1);
  //   $("#S_sum_2").val(S_rent_sum_2);
  //   $("#S_sum_3").val(S_rent_sum_3);
  //   $("#S_sum_4").val(S_rent_sum_4);
  //   $("#S_sum_5").val(S_rent_sum_5);
  //   $("#S_sum_6").val(S_rent_sum_6);
  //   $("#S_sum_7").val(S_rent_sum_7);
  //   $("#S_sum_8").val(S_rent_sum_8);
  //   $("#S_sum_9").val(S_rent_sum_9);

  //   //必達賃貸自己案件合計
  //   $("#R_rent_my_sum").val(R_rent_my_sum);
  //   $("#R_rent_int_sum").val(R_rent_int_sum);
  //   $("#R_bs_my_sum").val(R_bs_my_sum);
  //   $("#R_bs_int_sum").val(R_bs_int_sum);
  //   $("#S_rent_my_sum").val(S_rent_my_sum);
  //   $("#S_rent_int_sum").val(S_rent_int_sum);
  //   $("#S_bs_my_sum").val(S_bs_my_sum);
  //   $("#S_bs_int_sum").val(S_bs_int_sum);

  //   //総合計
  //   $("#R_sum").val(R_sum);
  //   $("#S_sum").val(S_sum);
  // });
});
