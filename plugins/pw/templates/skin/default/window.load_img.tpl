<p>
    <label>
        <input type="checkbox" name="preview" value="1" class="input-checkbox" onclick="$(this).parents('form').find('.form-image-preview-size').slideToggle('fast');" /> - {$aLang.plugin.pw.size}
    </label>
    <div class="form-image-preview-size" style="display: none;">
        <input type="radio" name="preview_size" value="small"> - {$aLang.plugin.pw.small}
        <input type="radio" name="preview_size" value="medium"> - {$aLang.plugin.pw.medium}
        <input type="radio" name="preview_size" value="large"> - {$aLang.plugin.pw.large}
    </div>
</p>
<br />

{literal}
    <script>
        jQuery(document).ready(function($){
            ls.hook.add('ls_comments_load_after',function(idTarget, typeTarget, selfIdComment, bNotFlushNew, result){
                $('.photoset-image').prettyPhoto({
                    social_tools:'',
                    show_title: false,
                    slideshow:false,
                    deeplinking: false
                });
            });
        });
    </script>
{/literal}
