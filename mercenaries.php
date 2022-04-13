<?php

require_once("./template_utils.php");

// Всё, что должно быть добавлено в head темплейта
// TODO: Скорее всего это плохой вариант
$add_to_head = '<link rel="stylesheet" href="../style/mercenaryStyle.css">';

// Импорт html
$html = getCommonTemplate(2, $add_to_head);
$content = file_get_contents("./html/templ_mercenariesContent.html");

$mercenaries = getStringOfHtmlsOfMercenaries();

// Подставляем
$content = str_replace('{mercenaries}', $mercenaries, $content);
$html = str_replace('{content}', $content, $html);

echo $html;

function getArrayOfMercenaries() : array {
    return $arr = [
        ["ПростоДавид", 1000, ["аккуратная работа", "гарантии выполнения", "профессиональная видеосъёмка"], "Опытный наёмник, выполнивший уже много заказов. Тихий и надёжный, он выполнит работу по высоким стандартам.<br><br>Однако ему может понадобится больше времени на подготовку, нежели его коллегам."],
        ["Арнольд-3000", 300, ["красивое выполнение", "профессиональная видеосъёмка"], "Настоящий любитель своего дела... Изящная работа в сочетании с видеосъёмкой оставят Вам незабываемые воспоминания.<br><br>К сожалению, иногда у него не получается довести дело до конца."],
        ["Вдовий Плач", 600, ["быстрая подготовка", "гарантии выполнения"], "Если Вам нужно быстро выполнить пугание и совсем нет времени на подготовку, Вы обратились по адресу. Этот надёжный наёмник сделает всё безцеремонно, но чётко."],
        ["Разрыватель Сердец", 400, ["красивое выполнение", "страховка от неудачи"], "Небрежное выполнение заказа - это точно не про этого наёмника. Этот молодой специалист умеет сделать из обычного пугания настоящее представление, после которого у Всех ещё долго будут бегать мурашки по коже."],
        ["Великолепный Ромб", 150, ["полный хаос", "страховка от неудачи"], "Вам надоели однообразные продуманные пугания? Этот новичёк покажет даже матёрым специалистам, как надо действовать в постоянно меняющейся обстановке, где нет ни малейшего намёка на план."],
        ["Патрик", 700, ["аккуратная работа", "гарантии выполнения"], "\"Сколько план не обдумывай, можно и ещё подумать...\" - вот лозунг этого наёмника. Только глубоко продуманная тактика может привести к полному успеху и удовлетворению клиента."],
        ["Вольт-Ампер", 850, ["быстрая подготовка", "гарантии выполнения"], "Скорость, скорость и ещё раз скорость.<br><br>Время подкралось незаметно? Неожиданно появилась необходимость активных действий? Этот наёмник не оставит Вас в беде! Дело будет сделано буквально в мгновение ока по меркам отрасли."]
    ];
}

function getStringOfHtmlsOfMercenaries() : string {
    $template = file_get_contents("./html/templ_mercenary.html");
    $htmls = "";
    foreach (getArrayOfMercenaries() as $merc) {
        $html = $template;
        $html = str_replace('{name}', $merc[0], $html);
        $html = str_replace('{price}', $merc[1], $html);
        $html = str_replace('{peculiarities}', getStringOfHtmlsOfPercualities($merc[2]), $html);
        $html = str_replace('{description}', $merc[3], $html);
        $htmls = $htmls . $html;
    }

    return $htmls;
}

function getStringOfHtmlsOfPercualities(array $arr) : string {
    $template = " <p><strong>{peculiarity}</strong></p>";
    $htmls = "";
    foreach ($arr as $item) {
        $html = $template;
        $html = str_replace('{peculiarity}', $item, $html);
        $htmls = $htmls . $html;
    }

    return $htmls;
}