<?php
namespace App\Traits;

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

    public static function chkSelected(string $value, $searchvalue)
    {
        $dataArray = explode(',', $value);
        if(in_array($searchvalue, $dataArray)){
            echo 'selected';
        }
    }

}
