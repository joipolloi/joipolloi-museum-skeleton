<?php

namespace Joi\OpeningHours;

function openingTime()
{
    date_default_timezone_set('Europe/London');

    if (date("H:i") < "16:00" && date("H:i") > "00:00") {
        return "Today until 4pm";
    } else {
        return "Tomorrow until 4pm";
    }
}
