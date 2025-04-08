function addCatBanner(el, id) {
  let img = el.prop("files")[0];
  let data = new FormData();
  data.append("img", img);
  data.append("id", id);
  $.ajax({
    type: "POST",
    url: "api/post/cat_banners.php?q=addCatBanner",
    data: data,
    cache: false,
    contentType: false, //must, tell jQuery not to process the data
    processData: false,
    success: function (msg) {
      msg = JSON.parse(msg);
      if (msg["result"] == "success") {
        alert("Сохранено!");
        $("#body").load("./pages/cat_banners.php");
      } else alert(msg["msg"]);
    },
  });
}
