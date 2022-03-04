<?php

    class Rating {
        private int $id;
        private int $stars;
        private string $comment;

        public function __construct($id, $stars, $comment) {
            $this->$id = $id;
            $this->$stars = $stars;
            $this->$comment = $comment;
        }

        public function getId() {
            return $this->id;
        }

        public function getStars() {
            return $this->stars;
        }

        public function setStars($stars) {
            $this->stars = $stars;
        }

        public function getComment() {
            return $this->comment;
        }
    }
?>