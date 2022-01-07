<?php

namespace Joi\DateFormat;

use Carbon\Carbon;
use Twig\TwigFunction;

function formatEventDate($type, $startDate, $startTime, $endDate, $endTime, $frequency, $recurringOptions)
{
    $tz = 'Europe/London';
    $now = Carbon::now($tz);

    if ($type == 'gallery') {
        return null;
    }

    if ($type == 'one-off') {
        $startDateString = $startTime ? "{$startDate} {$startTime}" : "{$startDate} 00:00:00";
        $start = Carbon::createFromFormat('Ymd H:i:s', $startDateString, $tz);
        $diffDays = $now->diffInDays($start);
        if ($diffDays > 6) {
            return $start->format('l, jS M Y, G:i');
        } else if ($diffDays <= 1) {
            // Is tomorrow or today
            return $start->format('l, G:i');
        } else {
            // Less than a week
            return $start->format('\T\h\i\s l, G:i');
        }
    }

    if ($type == 'limited-recurring') {
        $start = Carbon::createFromFormat('Ymd', $startDate, $tz);
        $end = Carbon::createFromFormat('Ymd', $endDate, $tz);
        $diffDays = $now->diffInDays($start);

        if ($recurringOptions) {
            if ($recurringOptions['frequency'] === 'Daily') {
                $recurringText = $recurringOptions['frequency'] . ' ';
            } else if ($recurringOptions['frequency'] === 'Weekly') {
                $recurringText = $recurringOptions['frequency'] . ' on ' . $recurringOptions['weekdays'];
            } else if ($recurringOptions['frequency'] === 'Specific') {
                $recurringText = 'Various times ';
            }
        }

        if ($diffDays > 6) {
            // More than a week
            if ($start->year != $end->year) {
            // Spans multiple years
                $startFormat = $start->format('jS M Y');
                $endFormat = $end->format('jS M Y');
            } else if ($start->month == $end->month) {
                //Same month
                $startFormat = $start->format('jS');
                $endFormat = $end->format('jS M Y');
            } else {
                $startFormat = $start->format('jS M');
                $endFormat = $end->format('jS M Y');
            }

            return "{$recurringText}{$startFormat} - {$endFormat}";
        } else {
            // less than a week
            if ($diffDays <= 1) {
            // Is tomorrow or today
                $startFormat = $start->format('\S\t\a\r\t\s l');
                return "{$recurringText}{$startFormat}";
            } else {
                $startFormat =  $start->format('\T\h\i\s l');
                $endFormat = $end->format('jS M Y');
                return "{$recurringText}{$startFormat} until {$endFormat}";
            }
        }
    }

    if ($type == 'exhibition') {
        $start = Carbon::createFromFormat('Ymd', $startDate, $tz);
        $end = Carbon::createFromFormat('Ymd', $endDate, $tz);

        if ($start->year != $end->year) {
            // Spans multiple years
            $startFormat = $start->format('jS M Y');
            $endFormat = $end->format('jS M Y');
        } else if ($start->month == $end->month) {
            //Same month
            $startFormat = $start->format('jS');
            $endFormat = $end->format('jS M Y');
        } else {
            $startFormat = $start->format('jS M');
            $endFormat = $end->format('jS M Y');
        }

        return "{$startFormat} - {$endFormat}";
    }

    if ($type == 'recurring' && $frequency) {
        return $frequency;
    }
}

function formatDuration($mins)
{
    if ($mins < 60) {
        return "{$mins} mins";
    } else {
        $hours = floor($mins / 60);
        $hoursLabel = $hours == 1 ? 'hr' : 'hrs';
        $minutes = $mins % 60;
        $minutesLabel = $minutes == 1 ? 'min' : 'mins';
        if ($minutes > 0) {
            return "{$hours} {$hoursLabel} {$minutes} {$minutesLabel}";
        } else {
            return "{$hours} {$hoursLabel}";
        }
    }
}

add_action('timber/twig/filters', function ($twig) {
    $twig->addFunction(new TwigFunction('formatEventDate', 'Joi\DateFormat\formatEventDate'));
    $twig->addFunction(new TwigFunction('formatDuration', 'Joi\DateFormat\formatDuration'));
    return $twig;
});
