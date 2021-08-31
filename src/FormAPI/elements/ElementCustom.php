<?php

namespace FormAPI\elements;

abstract class ElementCustom extends Element {

    /** @var int */
    public $arrayIndex = 0;

    /** @var mixed */
    public $finalData;

    /*** @param int $index */
    public function setArrayIndex(int $index): void {
        $this->arrayIndex = $index;
    }

    /*** @return int */
    public function getArrayIndex(): int {
        return $this->arrayIndex;
    }

    /*** @param mixed $data */
    public function setFinalData($data): void {
        $this->finalData = $data;
    }

    /*** @return mixed */
    public function getFinalValue() {
        return $this->finalData;
    }
}