function addStory(el) {
  let img = el.parent().find(".img").prop("files")[0];
  let preview = el.parent().find(".preview").prop("files")[0];
  if (img) {
    let data = new FormData();
    data.append("img", img);
    data.append("preview", preview);
    $.ajax({
      type: "POST",
      url: "api/post/stories.php?q=addStory",
      data: data,
      cache: false,
      contentType: false, //must, tell jQuery not to process the data
      processData: false,
      success: function (msg) {
        msg = JSON.parse(msg);
        if (msg["result"] == "success") {
          alert("Сохранено!");
          $("#body").load("./pages/stories.php");
        } else alert(msg["msg"]);
      },
    });
  } else {
    alert("Выберите фото");
  }
}

function deleteStory(id) {
  if (confirm("Вы действительно хотите удaлить этоу историю?")) {
    $.ajax({
      type: "POST",
      url: "api/delete/stories.php?q=deleteStory",
      data: "id=" + id,
      success: function (msg) {
        msg = JSON.parse(msg);
        if (msg["result"] == "success") {
          alert("Удалено!");
          $("#body").load("./pages/stories.php");
        } else alert(msg["msg"]);
      },
    });
  }
}
