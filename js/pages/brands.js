function addBrand(el) {
  let name = el.parent().find(".name").val();
  let type = el.parent().find(".type").val();
  let img = el.parent().find(".img").prop("files")[0];
  if (name) {
    if (img) {
      let data = new FormData();
      data.append("name", name);
      data.append("img", img);
      data.append("type", type);
      $.ajax({
        type: "POST",
        url: "api/post/brands.php?q=addBrand",
        data: data,
        cache: false,
        contentType: false, //must, tell jQuery not to process the data
        processData: false,
        success: function (msg) {
          msg = JSON.parse(msg);
          if (msg["result"] == "success") {
            alert("Сохранено!");
            $("#body").load("./pages/brands.php");
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

function deleteBrand(id) {
  if (confirm("Вы действительно хотите удaлить этот бренд?")) {
    $.ajax({
      type: "POST",
      url: "api/delete/brands.php?q=deleteBrand",
      data: "id=" + id,
      success: function (msg) {
        msg = JSON.parse(msg);
        if (msg["result"] == "success") {
          alert("Удалено!");
          $("#body").load("./pages/brands.php");
        } else alert(msg["msg"]);
      },
    });
  }
}

function toggleModel(el) {
  $(".models").not(el.parents(".brend").children(".models")).hide();
  el.parents(".brend").children(".models").toggle(300);
  el.parents(".brend")
    .find(".body")
    .load("./pages/brands/models.php?parent=" + el.attr("parent"));
}

function addModel(el) {
  let name = el.prev().val();
  let parent = el.attr("parent");
  let img = el.parent().find(".img").prop("files")[0];
  if (name.trim() == "") {
    alert("Название не может быть пустым");
  } else {
    if (img) {
      let data = new FormData();
      data.append("name", name);
      data.append("parent", parent);
      data.append("img", img);
      $.ajax({
        type: "POST",
        url: "api/post/brands.php?q=addModel",
        data: data,
        cache: false,
        contentType: false, //must, tell jQuery not to process the data
        processData: false,
        success: function (msg) {
          msg = JSON.parse(msg);
          if (msg["result"] == "success") {
            alert("Добавлено!");
            el.prev().val("");
            el.parents(".brend")
              .find(".body")
              .load("./pages/brands/models.php?parent=" + parent);
          } else alert(msg["msg"]);
        },
      });
    } else {
      alert("Выберите фото");
    }
  }
}

function deleteModel(id, el) {
  if (confirm("Вы действительно хотите удaлить эту модель?")) {
    $.ajax({
      type: "POST",
      url: "api/delete/brands.php?q=deleteModel",
      data: "id=" + id,
      success: function (msg) {
        msg = JSON.parse(msg);
        if (msg["result"] == "success") {
          alert("Удалено!");
          el.parents(".brend")
            .find(".body")
            .load("./pages/brands/models.php?parent=" + el.attr("parent"));
        } else alert(msg["msg"]);
      },
    });
  }
}

function toggleGeneration(el) {
  $(".generations").not(el.parents(".model").children(".generations")).hide();
  el.parents(".model").children(".generations").toggle(300);
  el.parents(".model")
    .find(".generations")
    .load("./pages/brands/models/generations.php?parent=" + el.attr("parent"));
}

function addGeneration(el) {
  let name = el.parents(".gen__form").find(".name").val();
  let img = el.parents(".gen__form").find(".img").prop("files")[0];
  if (name) {
    if (img) {
      let data = new FormData();
      data.append("name", name);
      data.append("img", img);
      data.append("parent", el.attr("parent"));
      $.ajax({
        type: "POST",
        url: "api/post/brands.php?q=addGeneration",
        data: data,
        cache: false,
        contentType: false, //must, tell jQuery not to process the data
        processData: false,
        success: function (msg) {
          msg = JSON.parse(msg);
          if (msg["result"] == "success") {
            alert("Сохранено!");
            el.parents(".generations").load(
              "./pages/brands/models/generations.php?parent=" +
                el.attr("parent")
            );
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

function deleteGeneration(id, el) {
  if (confirm("Вы действительно хотите удaлить это поколение?")) {
    $.ajax({
      type: "POST",
      url: "api/delete/brands.php?q=deleteGeneration",
      data: "id=" + id,
      success: function (msg) {
        msg = JSON.parse(msg);
        if (msg["result"] == "success") {
          alert("Удалено!");
          el.parents(".generations").load(
            "./pages/brands/models/generations.php?parent=" + el.attr("parent")
          );
        } else alert(msg["msg"]);
      },
    });
  }
}

function checkPicture(el) {
  let id = el.attr("model");
  if (el.attr("img").trim() == "") {
    let data = new FormData();
    let img = el.prop("files")[0];
    data.append("img", img);
    data.append("id", id);
    $.ajax({
      type: "POST",
      url: "api/post/brands.php?q=addImgModel",
      data: data,
      cache: false,
      contentType: false, //must, tell jQuery not to process the data
      processData: false,
      success: function (msg) {
        msg = JSON.parse(msg);
        if (msg["result"] == "success") {
          alert("Сохранено!");
          el.parents(".brend")
            .find(".body")
            .load("./pages/brands/models.php?parent=" + el.attr("parent"));
        } else alert(msg["msg"]);
      },
    });
  }
}
