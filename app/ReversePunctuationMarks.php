<?php
namespace App;

use IntlChar;

class ReversePunctuationMarks
{
    /**
     * @param string $string
     * @return string
     */
    public function getSentence(string $string): string
    {
        $marksAndLetter = array_slice(
            preg_split("/\s*/u", $string),
            1, -1
        );

        $items = $this->getMarksFromArrayAndAddSpace($marksAndLetter);
        $marksRightCombination = $this->marksRightCombination($items);

        return implode('',array_replace($marksAndLetter,$marksRightCombination));
    }

    /**
     * @param array $marksAndLetter
     * @return array
     */
    private function getMarksFromArrayAndAddSpace(array &$marksAndLetter): array
    {
        $items = [];
        foreach ($marksAndLetter as $key => &$value) {
            if($value === '') {
                $value = '&nbsp;';
            } elseif(IntlChar::ispunct($value)) {
                $items[$key] = $value;
            }
        }

        return $items;
    }

    /**
     * @param array $items
     * @return array
     */
    private function marksRightCombination(array $items): array
    {
        $marksKeys = array_keys($items);
        $marks = array_values($items);
        $reverseMarks = array_reverse($marks);
        return array_combine($marksKeys, $reverseMarks);
    }
}