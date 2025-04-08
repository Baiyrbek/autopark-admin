function addBody(el) {
  let name = el.parent().find(".name").val();
  let img = el.parent().find(".img").prop("files")[0];
  if (name) {
    if (img) {
      let data = new FormData();
      data.append("name", name);
      data.append("img", img);
      $.ajax({
        type: "POST",
        url: "api/post/body.php?q=addBody",
        data: data,
        cache: false,
        contentType: false, //must, tell jQuery not to process the data
        processData: false,
        success: function (msg) {
          msg = JSON.parse(msg);
          if (msg["result"] == "success") {
            alert("Сохранено!");
            $("#body").load("./pages/body_type.php");
          } else alert(msg["msg"]);
        },
      });
    } else {
      alert("Выберите фото");
    }
  } else {
    alert("Название бренда не может быть пустым");
  }
}

function deleteBody(id) {
  if (confirm("Вы действительно хотите удaлить этот кузов?")) {
    $.ajax({
      type: "POST",
      url: "api/delete/body.php?q=deleteBody",
      data: "id=" + id,
      success: function (msg) {
        msg = JSON.parse(msg);
        if (msg["result"] == "success") {
          alert("Удалено!");
          $("#body").load("./pages/body_type.php");
        } else alert(msg["msg"]);
      },
    });
  }
}
