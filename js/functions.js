function showPicture(el) {
  let file = el.prop("files")[0];
  if (file) {
    let reader = new FileReader();
    reader.onload = function (e) {
      let result = e.target.result;
      el.prev().css({ backgroundImage: "url(" + result + ")" });
    };
    reader.readAsDataURL(file);
  }
}

function deleteAd(id) {
  if (confirm("Подтвердите действие"))
    $.ajax({
      type: "POST",
      url: "api/delete/del_ad.php?q=deleteAd",
      data: "id=" + id,
      success: function (msg) {
        msg = JSON.parse(msg);
        if (msg["result"] == "success") {
          alert("Удалено!");
          $(".del__body").html("");
        } else alert(msg["msg"]);
      },
    });
}
