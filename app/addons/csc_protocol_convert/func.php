<?php
require DIR_ROOT . '/app/addons/csc_protocol_convert/lib/vendor/autoload.php';

function fn_save_protocol($text)
{
    $phpWord = new  \PhpOffice\PhpWord\PhpWord();
    $section = $phpWord->addSection();
    $phpWord->addParagraphStyle('center', ['align'=>'center', 'spaceAfter'=>100]);
    $section->addText('АКЦИОНЕРНОЕ ОБЩЕСТВО «ТВЭЛ» (АО «ТВЭЛ»)', ['bold'=>true, 'size'=>18], 'center');
    $section->addTextBreak(2);
    $section->addText('ПРОТОКОЛ', ['bold'=>true, 'size'=>18], 'center');
    $section->addText('совещания по архитектурному статусу проекта «Создание системы бизнес-планирования, бюджетирования, прогнозирования для обществ Топливной Компании» (код проекта – ТК-РВ-СРМ1-1)»', ['bold'=>false, 'size'=>14], 'center');
    $section->addTextBreak(2);
    $section->addText($text, ['bold'=>false, 'size'=>14], ['align' => 'left']);

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save(DIR_ROOT . '/protocol.docx');
}