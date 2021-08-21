{include file="common/subheader.tpl" title="Конвертация в протокол"}

<form action="{fn_url()}" method="post" name="protocol_form" enctype="multipart/form-data" class="cm-processed-form">
    <div class="control-group">
        <label class="ty-control-group__title">Видео-файл для конвертации</label>
        <div class="controls">
            {include file="common/fileuploader.tpl" var_name="files[video]"}
        </div>
    </div>
    {if file_exists("`$smarty.const.DIR_ROOT`/protocol.docx")}
        <div>
            <br>Последний сохраненный протокол: <a href="http://185.233.37.254/protocol.docx">Скачать</a>
        </div>
    {/if}
    <div class="buttons-container" style="margin-top: 10px;">
        <input type="submit" name="dispatch[protocol.convert]" class="ty-btn ty-btn__primary" value="Конвертировать">
    </div>
</form>

<style>
    .ty-banner__image {
        max-width: 500px;
    }
</style>

<script>
    $(document).ready(function(){
        $('.ty-fileuploader__a').addClass('ty-btn ty-btn__secondary');
    });
</script>