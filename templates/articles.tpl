<html>
    <head>
        {$head}
        <title>Articles</title>
    </head>
    <body>
        {$navbar}

        <div class="ui raised very padded text container ">
            {if isset($articles[0]) && $articles[0]["isRemovable"] eq 1}
                <h1 class="ui header center aligned">Your Articles</h1>
                {elseif isset($articles[0])}
                <h1 class="ui header center aligned">All articles</h1>
                {else}
                <h1 class="ui header center aligned">No articles</h1>                
            {/if}
            <div class="ui items">
            {foreach from=$articles key=key item=value}
        
                <div class="item">
                    <div class="image">
                            <img src="{$value["image"]}" alt="zdj">
                    </div>
                    <div class="content">
                    <a class="header">{$value["title"]}</a>
                    <div class="meta">
                        <span>{$value["author_name"]}</span>
                    </div>
                    <div class="description">
                        <p> {$value["date"]}</p>
                    </div>
                    <div class="extra">
                        {$value["content"]}
                    </div>

                    {if $value["isRemovable"] eq 1}
                        <form method="post" action="remove.php" style="display: inline-block">
                            <input style="display:none" value="{$value['title']}" type="text" name="title"/>
                            <input type="submit" class="ui button" value="Remove">
                        </form>
                        <form method="post" action="edit.php" style="display: inline-block">
                            <input style="display:none" value="{$value['id']}" type="text" name="id"/>
                            <input type="submit" class="ui button" value="Edit">
                        </form>
                    {/if}
                    </div>
                </div>
            {/foreach}
            
        </div>

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