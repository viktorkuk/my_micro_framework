<?php require('header.php') ?>

<script type="text/javascript">
    
    function checkForm(){
        var error = '';
        if($('#entry-title').val() == ''){
            error += 'Please enter title before save';
        }
        
        if($('#entry-text').val() == ''){
            error += '<br>Please enter text before save';
        }
        
        if(error != ''){
            bootbox.alert(error);
            return false;
        }else{
            return true;
        }
    }
    
    function manegeEntry(){
        
        if(!checkForm()){
            return false;
        }
        
        $.ajax({
            type: "POST",
            url: "/admin/manageentry/",
            data: $("#entry-form").serialize(),
            success: function(data)
            {
                updateNews();
                swithToAddForm();
            }
        });
        return false;
    }

    function removeEntry(id){
        bootbox.confirm("Are you sure?", function(result) {
            if(result){
                $.ajax({
                    type: "POST",
                    url: "/admin/removeentry/"+ id + "/",
                    success: function(data)
                    {
                        updateNews();
                    }
                });
            }
        }); 
        return false;
    }
    
    function clearForm(){
        $('#entry-id').val('');
        $('#entry-title').val('');
        $('#entry-text').val('');
    }
    
    function swithToEditForm(id){
        $.ajax({
            type: "GET",
            url: "/admin/getentry/" + id + "/",
            success: function(data)
            {
                //console.log(data);
                $('#add-entry h1').text('Edit entry');
                $('#entry-id').val(data['id']);
                $('#entry-title').val(data['title']);
                $('#entry-text').val(data['text']); 
            }
        }); 
        
        return false;
    }
    
    function swithToAddForm(){
        $('#add-entry h1').text('Add new entry');
        clearForm();
    }
    
    function updateNews(){
        $.ajax({
            type: "GET",
            url: "/admin/getnews/",
            success: function(data)
            {
                var newsHtml = '';
                for (var x in data) {
                    var entry = data[x];
                    var links = '<h3><a target="_blank" href="/news/entry/' + entry['id'] + '"> '+ entry['title']+ '</a>' +
                                '<a href="#" onclick="swithToEditForm(' + entry['id'] + ')"><i class="icon-edit"></i></a> ' +
                                '<a href="#" onclick="removeEntry(' + entry['id'] + ')" ><i class="icon-trash"></i></a></h3>';
                    var text = '<p class="content">' + entry['text'] + '</p>';
                    var date = '<span class="date">' + entry['date'] + '</span>';
                    newsHtml += '<div class="entry">' + links + text + date + '</div>'; 
                }
        
                $('#news-list').html(newsHtml);
            }
        });
        
        
    }
</script>


<div id="add-entry">
    <h1>Add new entry</h1>
    <form id="entry-form" action="" onsubmit="return manegeEntry();" method="POST" class="well">
        <input type="hidden" name="id" id="entry-id" value="" />
        <label>Tttle</label>
        <input name="title" type="text" id="entry-title" />
        <label>Text</label>
        <textarea cols="200" rows="15" name="text"  id="entry-text"></textarea>
        <div style="padding-top: 10px;">
            <button type="submit" class="btn" >
                Save
            </button>    
        </div>
    </form>
</div>    


<h1>Entries in my blog</h1>
<div id="news-list">
    <?php foreach ($news as $row): ?>
        <div class="entry">
            <h3>
                <a target="_blank" href="/news/entry/<?=$row['id']?>"> <?=$row['title']?></a>
                <a href="#" onclick="return swithToEditForm(<?=$row['id']?>);"><i class="icon-edit"></i></a>
                <a href="#" onclick="return removeEntry(<?=$row['id']?>);"><i class="icon-trash"></i></a>
            </h3>
            <p class="content"><?=$row['text']?></p>
            <span class="date"><?=$row['date']?></span>
        </div>
    <?php endforeach ?>
</div>




<?php require('footer.php') ?>