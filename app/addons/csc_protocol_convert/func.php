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
    $section->addText('совещания по архитектурному статусу проекта «Создание системы бизнес-планирования, бюджетирования, прогнозирования для обществ Топливной Компании» (код проекта – ТК-РВ-СРМ1-1)»', ['size'=>14], 'center');

    $section_style = $section->getStyle();
    $position =
        $section_style->getPageSizeW()
        - $section_style->getMarginRight()
        - $section_style->getMarginLeft();
    $phpWord->addParagraphStyle("leftRight", array("tabs" => array(
        new \PhpOffice\PhpWord\Style\Tab("right", $position)
    )));

    $section->addText("" . date('d.m.Y', time()) . "\t№___________", ['size'=>14], "leftRight");

    $section->addTextBreak(2);
    //$section->addText($text, ['size'=>14], ['align' => 'left']);
    $textrun = $section->createTextRun();
    $word_arr = explode(' ', $text);
    $triggers = fn_get_triggers();
    $add_text = '';
    foreach ($word_arr as $word) {
        if (in_array($word, $triggers)) {
            if (!empty($add_text)) {
                $textrun->addText($add_text, ['size'=>14]);
                $add_text = '';
            }
            $textrun->addText($word.' ', ['size'=>14, 'fgColor' => \PhpOffice\PhpWord\Style\Font::FGCOLOR_YELLOW]);
        }
        else {
            $add_text .= $word . ' ';
        }
    }
    if (!empty($add_text)) {
        $textrun->addText($add_text, ['size'=>14]);
    }

    $section->addTextBreak(2);

    $section->addText('Председательствующий', ['size'=>16], ['align' => 'left']);
    $section->addTextBreak(2);
    $section->addText('Секретарь', ['size'=>16], ['align' => 'left']);

    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save(DIR_ROOT . '/protocol.docx');
}

function fn_get_triggers()
{
    return [
        'заслушали',
        'заслушали.',
        'заслушали,',
        'заслушали!',
        'заслушали?',
        'присутствовали',
        'присутствовали.',
        'присутствовали,',
        'присутствовали!',
        'присутствовали?',
        'приняли',
        'приняли.',
        'приняли,',
        'приняли!',
        'приняли?',
        'решение',
        'решение.',
        'решение,',
        'решение!',
        'решение?',
        'постановили',
        'постановили.',
        'постановили,',
        'постановили!',
        'постановили?',
        'договорились',
        'договорились.',
        'договорились,',
        'договорились!',
        'договорились?',
        'ответственные',
        'ответственные.',
        'ответственные,',
        'ответственные!',
        'ответственные?',
        'сделали',
        'сделали.',
        'сделали,',
        'сделали!',
        'сделали?',
        'приняли',
        'приняли.',
        'приняли,',
        'приняли!',
        'приняли?',
        'вынесли',
        'вынесли.',
        'вынесли,',
        'вынесли!',
        'вынесли?',
    ];
}