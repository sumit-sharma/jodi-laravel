<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait CommonTrait
{

    public static function loadheightdata($selected = null)
    {
        $output = '';
        // Loop from 4 to 6 feet
        for ($feet = 4; $feet <= 6; $feet++) {
            $output .= '<optgroup label="' . $feet . '&rsquo;">';
            // Base feet option (e.g., 500)
            $value = $feet . "00";
            $sel   = ($selected == $value) ? ' selected' : '';
            $output .= '<option value="' . $value . '"' . $sel . '>' . $feet . '&rsquo;</option>';
            // Inches from 1–11
            for ($inches = 1; $inches <= 11; $inches++) {

                $value = $feet . sprintf("%02d", $inches); // 501, 502...
                $sel   = ($selected == $value) ? ' selected' : '';

                $output .= '<option value="' . $value . '"' . $sel . '>'
                    . $feet . '&rsquo;&nbsp;' . $inches . '&rdquo;</option>';
            }
            $output .= '</optgroup>';
        }
        echo $output;
    }

    public static function chkSelected(string | null $value, $searchvalue)
    {
        if ($value) {
            $dataArray = explode(' ', $value);
            if (in_array($searchvalue, $dataArray)) {
                echo 'selected';
            }
        }
    }

    public static function chkArrayImplode($item, $separtor = ' ')
    {
        return is_array($item) ? implode($separtor, $item) : $item;
    }

    public static function convertCommonDate($dateString, $format = 'M d Y')
    {
        return Carbon::parse($dateString)->format($format);
    }

    public static function convertcmtoft($str)
    {
        $feet = substr($str, 0, 1);
        $inches = substr($str, 1, 2);
        if (substr($inches, 0, 1) == 0) {
            $inches = substr($inches, 1, 1);
        }
        $cm = (($feet * 12) + $inches) * 2.54;
        return round($cm);
    }
}
