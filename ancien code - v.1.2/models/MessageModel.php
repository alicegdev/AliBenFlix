<?php

    class Message {
        private int $id;
        private datetime $date;
        private string $content;
        private int $sender;
        private int $receiver;


        private string $name;

        public function __construct($id, $date, $content, $sender, $receiver) {
            $this->$id = $id;
            $this->$date = $date;
            $this->$content = $content;
            $this->$sender = $sender;
            $this->$receiver = $receiver;
        }

        public function getId() {
            return $this->id;
        }

        public function getDate() {
            return $this->date;
        }

        public function setDate($date) {
            $this->date = $date;
        }
        public function getContent() {
            return $this->content;
        }

        public function setContent($content) {
            $this->content = $content;
        }

        public function getSender() {
            return $this->sender;
        }

        public function setSender($sender) {
            $this->sender = $sender;
        }

        public function getReceiver() {
            return $this->receiver;
        }

        public function setReceiver($receiver) {
            $this->receiver = $receiver;
        }
    }
?>