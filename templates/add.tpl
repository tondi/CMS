<html>
    <head>
        {$head}
        <title>Articles</title>
    </head>
    <body>
        {$navbar}
        <div class="ui raised very padded text container ">

                <form enctype="multipart/form-data" method="post" action="create.php" class="ui form">
                    <div class="field">
                        <label>Title: <input type="text" name="title" placeholder="Example title"/></label>
                    </div>
                    <div class="field">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <div class="field">
                    <textarea name="content"></textarea>
                    </div>
                    <button class="ui button" type="submit">Add article</button>
                    
                </form>
        </div>
    </body>
</html>