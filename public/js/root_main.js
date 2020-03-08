"use strict";

function leaving_block() {
  var label = document.getElementById("leaving_label");
  var div = document.getElementById("leaving_div");
  var btn = document.getElementById("leaving_btn");
  if (label.style.display == "none") {
    label.style.display = "block";
    div.style.display = "block";
    btn.value = "退職日非表示";
  } else {
    label.style.display = "none";
    div.style.display = "none";
    btn.value = "退職日表示";
  }
}

function selectboxChange(obj) {
  var idx = obj.selectedIndex;
  var value = obj.options[idx].value;
  var lastchild = obj.parentNode.parentNode.lastElementChild;
  var person = obj.parentNode.parentNode.children[6];
  var remark = lastchild.children[0];
  if (value === "契約金等") {
    remark.value = "契約金：0円 \n仲介手数料：0円 \n広告料：0円";
  } else {
    remark.value = "";
  }

  if (value === "諸口") {
    person.children[0].value = "結家不動産";
  } else {
    person.children[0].value = "---";
  }
}

console.log("aa");
