<?php
use Tygh\Addons\Speechpro;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($mode == 'convert') {
        $uploaded_data = fn_filter_uploaded_data('files', ['avi', 'mp4']);
        if (!empty($uploaded_data)) {
            copy($uploaded_data['video']['path'], VIDEO_DIR . '/' . $uploaded_data['video']['name']);
            shell_exec('ffmpeg -i ' . VIDEO_DIR . '/' . $uploaded_data['video']['name'] . ' -ar 8000 -f segment -segment_time 600 -y ' . AUDIO_DIR . 'video%03d.wav');
        }
        $speechpro = new Speechpro();
        $text = $speechpro->processAudioFiles();
        unlink(VIDEO_DIR . '/' . $uploaded_data['video']['name']);
        fn_save_protocol($text);
        fn_set_notification('N', 'Успешно', 'Протокол сохранен в файл');
    }
}
else {
    if ($mode == 'convert') {
        fn_add_breadcrumb('Конвертация протокола');
    }
}