<?php

    class Rating {
        private int $id;

        public function __construct($id) {
            $this->$id = $id;
        }

        public function getId() {
            return $this->id;
        }
    }
?>