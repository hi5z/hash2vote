<?php
define("ALIGN_LEFT", "left");
define("ALIGN_CENTER", "center");
define("ALIGN_RIGHT", "right");
function calculateTextBox($font_size, $font_angle, $font_file, $text)
{
    $box = imagettfbbox($font_size, $font_angle, $font_file, $text);
    if (!$box) {
        return false;
    }
    $min_x = min(array($box[0], $box[2], $box[4], $box[6]));
    $max_x = max(array($box[0], $box[2], $box[4], $box[6]));
    $min_y = min(array($box[1], $box[3], $box[5], $box[7]));
    $max_y = max(array($box[1], $box[3], $box[5], $box[7]));
    $width = 537;
    $height = 240;
    $left = abs($min_x) + $width;
    $top = abs($min_y) + $height;
    // to calculate the exact bounding box i write the text in a large image
    $img = @imagecreatetruecolor($width << 2, $height << 2);
    $white = imagecolorallocate($img, 255, 255, 255);
    $black = imagecolorallocate($img, 0, 0, 0);
    imagefilledrectangle($img, 0, 0, imagesx($img), imagesy($img), $black);
    // for sure the text is completely in the image!
    imagettftext($img, $font_size, $font_angle, $left, $top, $white, $font_file, $text);
    // start scanning (0=> black => empty)
    $rleft = $w4 = $width << 2;
    $rright = 0;
    $rbottom = 0;
    $rtop = $h4 = $height << 2;
    for ($x = 0; $x < $w4; $x++)
        for ($y = 0; $y < $h4; $y++)
            if (imagecolorat($img, $x, $y)) {
                $rleft = min($rleft, $x);
                $rright = max($rright, $x);
                $rtop = min($rtop, $y);
                $rbottom = max($rbottom, $y);
            }
    // destroy img and serve the result
    imagedestroy($img);
    return array(
        "left" => $left - $rleft,
        "top" => $top - $rtop,
        "width" => $rright - $rleft + 1,
        "height" => $rbottom - $rtop + 1
    );
}

/**
 *
 * @param type $image - true color image object
 * @param type $size - font size
 * @param type $angle
 * @param type $left - left position
 * @param type $top - top position
 * @param type $color - font color
 * @param type $font - ttf file path
 * @param type $text
 * @param type $align - text align
 * @param type $width - image width
 * @param type $height - image height
 */
function myimagettftextbox(&$image, $size, $angle, $left, $top, $color, $font, $text, $align, $width, $height)
{
    $text_lines = explode("\n", $text);
    /**
     * Standart function good works with left align or one line text
     */
    if ($align == ALIGN_LEFT || count($text_lines) <= 1) {
        imagettftext($image, $size, $angle, $left, $top, $color, $font, $text);
    } else {
        $lines = array();
        $line_widths = array();
        $line_heights = array();
        $line_ys = array();
        $index = 0;
        $sum_height = 0;
        /**
         * calculate properties for each line
         */
        foreach ($text_lines as $block) {
            $dimensions = calculateTextBox($size, $angle, $font, $block);
            $line_width = $dimensions['width'];
            $line_height = $dimensions['height'];
            $line_y = $dimensions['top'];
            $lines[$index] = $block;
            $line_widths[$index] = $line_width;
            $line_heights[$index] = $line_height;
            $line_ys[$index] = $line_y;
            $sum_height += $line_height;
            $index++;
        }
        $max_width = max($line_widths);
        $max_width = $max_width + floor(($width - $max_width) / 2);
        $index = 0;
        $delta_h = floor(($height - $sum_height) / (count($lines) - 1));
        $top_offset = 0;
        $left_offset = 0;
        foreach ($lines as $line) {
            if ($align == ALIGN_CENTER) {
                $left_offset = ($max_width - $line_widths[$index]) / 2;
            } elseif ($align == ALIGN_RIGHT) {
                $left_offset = ($max_width - $line_widths[$index]);
            }
            imagettftext($image, $size, $angle, $left_offset + $left, $line_ys[$index] + $top_offset, $color, $font, $line);
            $top_offset += (isset($line_heights[$index]) ? $line_heights[$index] : 0) + $delta_h;
            $index++;
        }
    }
}

/**
 * Read in request
 */
include '../../config.php';
$id = $_GET['id'];
$query = mysql_query("SELECT option1, option2 FROM voting WHERE id=$id");
$row = mysql_fetch_array($query);

$inText = isset($_GET['text']) ? trim($_GET['text']) : "Голосование:";
$inText2 = isset($_GET['text2']) ? trim($_GET['text2']) : "$row[0] vs. $row[1]";

$redColor = isset($_GET['red']) ? intval($_GET['red']) : 0;
$greenColor = isset($_GET['green']) ? intval($_GET['green']) : 39;
$blueColor = isset($_GET['blue']) ? intval($_GET['blue']) : 60;
$inFontFile = isset($_GET['font']) ? trim($_GET['font']) : "Hash2Vote.ttf";
$inFontSize = isset($_GET['fsize']) ? trim($_GET['fsize']) : 24;
$inAlign = isset($_GET['align']) ? trim($_GET['align']) : ALIGN_CENTER;
/**
 * Calculate image position
 */
$bbox = imagettfbbox($inFontSize, 0, $inFontFile, $inText);
$bbox2 = imagettfbbox($inFontSize, 0, $inFontFile, $inText2);

$txt_max_width = intval(0.8 * 537);
$font_size = 1;

$txt_width = $bbox[2] - $bbox[0];
$txt_width2 = $bbox2[2] - $bbox2[0];

$width = 537;
$height = 240;
$y = 120 * 0.9; // baseline of text at 90% of $img_height

$x = (537 - $txt_width) / 2;
$x2 = (537 - $txt_width2) / 2;
/**
 * Create image
 */
header('Content-type: image/png');
$img = @imagecreatetruecolor(537, 240);
$text_colour = imagecolorallocate($img, $redColor, $greenColor, $blueColor);
$text_black = imagecolorallocatealpha($img, 0, 0, 0, 120);
$text_white = imagecolorallocate($img, 255, 255, 255);
$background = ImageColorAllocateAlpha($img, ($redColor == 255 ? 254 : $redColor + 1), ($greenColor == 255 ? 254 : $greenColor + 1), ($blueColor == 255 ? 254 : $blueColor + 1), 127);
imagefill($img, 0, 0, $text_white);
imagecolortransparent($img, $background);
/**
 * Add text
 */
myimagettftextbox($img, $inFontSize, 0, $x - 2, $y + 2, $text_black, $inFontFile, $inText, $inAlign, $width, $height); //SHADOW
myimagettftextbox($img, $inFontSize, 0, $x, $y, $text_colour, $inFontFile, $inText, $inAlign, $width, $height);

myimagettftextbox($img, $inFontSize, 0, $x2 - 2, $y + 42, $text_black, $inFontFile, $inText2, $inAlign, $width, $height);
myimagettftextbox($img, $inFontSize, 0, $x2, $y + 40, $text_colour, $inFontFile, $inText2, $inAlign, $width, $height);

imageAlphaBlending($img, false);
imageSaveAlpha($img, true);
imagepng($img);
/**
 * Destroys used resources
 */
imagecolordeallocate($img, $text_colour);
imagecolordeallocate($img, $background);
imagedestroy($img);