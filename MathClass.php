<?php
class Hitung {
    public $a1;
    public $a2;
    public $a;
    public $h;

    function __construct($a1 = 0, $a2 = 0, $a = 'tambah') {
        $this->a1 = $a1;
        $this->a2 = $a2;
        $this->a = $a;
    }

    function get() {
        switch ($this->a) {
            case "tambah":
                return $this->h = $this->a1 + $this->a2;
                break;
            case "kurang":
                return $this->h = $this->a1 - $this->a2;
                break;
            case "kali":
                return $this->h = $this->a1 * $this->a2;
                break;
            case "bagi":
                return $this->h = $this->a1 / $this->a2;
                break;
            case "persen":
                return $this->h = $this->a1 * ($this->a2/100);
                break;
            case "diskon":
                return $this->h = $this->a1 - ($this->a1 * ($this->a2/100));
                break;
            case "untung":
                return $this->h = $this->a1 + ($this->a1 * ($this->a2/100));
                break;
            case "caripersen":
                return (($this->a2 - $this->a1) / $this->a1) * 100 . '%';
            default:
                return "periksa inputan anda!";
                break;
        }

    }
}
?>

