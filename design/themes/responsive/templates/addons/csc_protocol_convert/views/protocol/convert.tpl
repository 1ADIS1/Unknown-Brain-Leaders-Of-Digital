{include file="common/subheader.tpl" title="Конвертация в протокол"}

<form action="{fn_url()}" method="post" name="protocol_form" enctype="multipart/form-data" class="cm-processed-form">
    <div class="control-group">
        <label class="ty-control-group__title">Видео-файл для конвертации</label>
        <div class="controls">
            {include file="common/fileuploader.tpl" var_name="files[video]"}
        </div>
    </div>
    <div class="buttons-container" style="margin-top: 10px;">
        <input type="submit" name="dispatch[protocol.convert]" class="ty-btn ty-btn__primary" value="Конвертировать">
    </div>
</form>