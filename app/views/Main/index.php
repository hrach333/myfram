<? new \myfram\widgets\menu\Menu(); ?>
<br>
<? if(!empty($posts)):?>
<? foreach ($posts as $post):?>
<div class="panel"><?=$post['title']?></div>
    <div><?=$post['text']?></div>
<? endforeach;?>
<? endif;?>

<script>
    $(document).ready(function () {
        $("#test").click(function(){
            //alert("test");
            $.ajax({
                url:'main/test',
                type:'post',
                data:'id=2',
                success:function (html) {
                    console.log(html);
                },
                error:function (error) {
                    alert(error);
                }
            });
        });
    });

</script>
