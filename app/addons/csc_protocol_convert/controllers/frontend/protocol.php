<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($mode == 'convert') {
        $uploaded_data = fn_filter_uploaded_data('files', ['avi']);
        fn_print_die($uploaded_data, 'qwe');
    }
}
else {
    if ($mode == 'convert') {
        fn_add_breadcrumb('Конвертация протокола');
    }
}