<script type="text/javascript" src="{cfg name="path.root.web"}/engine/lib/external/prettyPhoto/js/prettyPhoto.js"></script>
<link rel='stylesheet' type='text/css' href="{cfg name="path.root.web"}/engine/lib/external/prettyPhoto/css/prettyPhoto.css" />

{literal}
    <script>
        jQuery(document).ready(function($){
            $('.photoset-image').prettyPhoto({
                social_tools:'',
                show_title: false,
                slideshow:false,
                deeplinking: false
            });
        });
    </script>
{/literal}
