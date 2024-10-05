// $page_name = $_POST['page_name'];
// $description = $_POST['description'];
// $image = $_POST['image'];
// $alt_image = $_POST['alt_image'];
// $topic = $_POST['topic'];
// $title = $_POST['title'];
// $paragraph = $_POST['paragraph'];

function overview() {  
    var form = document.createElement("form");
    form.id = "reg-form";
    form.name = "reg-form";
    form.action = 'overview-topic.php';
    form.method = "post";
    form.enctype = "multipart/form-data";
    form.target = "my_iframe";

    var parameters = {
        page_name: "overview",
        description: "This is the overview page",
        image: "overview.jpg",
        alt_image: "overview image",
        topic: "Overview",
        title: "Overview",
        paragraph: "This is the overview page for the workshop"
    };
    
    Object.keys(parameters).forEach(function (key) {
      var input = document.createElement("input");
      input.type = "text";
      input.name = key;
      input.value = parameters[key];
      form.appendChild(input);
    });
  
    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}
