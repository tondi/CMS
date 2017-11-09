<html>
    <head>
        {$head}
        <title>Articles</title>
    </head>
    <body>

        {$navbar}
        <div class="ui raised very padded text container ">

                <form enctype="multipart/form-data" method="post" action="edit.php" class="ui form">
                    <div class="field">
                        <label>Title: <input type="text" name="title" placeholder="Example title"/ value="{$article['title']}"></label>
                    </div>
                    <div class="image">
                            <img src="{$article["image"]}" alt="zdj">
                    </div>
                    <div class="field">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="field">
                    <textarea name="content">{$article['content']}</textarea>
                    </div>
                    <input style="display:none" value="{$article['image']}" type="text" name="prevImage"/>
                    
                    <input style="display:none" value="{$article['id']}" type="text" name="id2"/>

                    <button class="ui button" type="submit">Update article</button>
                    
                </form>

        </div>

        <script>
            var imgs = document.querySelectorAll("img");
            console.log(imgs);
            for(let value of imgs) {
                var index = value.src.search("uploads");
                console.log(index);
                var arr = value.src.split("").slice(index,);
                arr.unshift("/CMS/");
                value.src = arr.join("");
            
                console.log(value.src)
                if(value.src=="http://localhost/CMS/uploads/") {
                    value.remove();
                }
                delete value;
            }
        </script>
    </body>
</html>