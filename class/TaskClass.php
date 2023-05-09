<?php
    class Task {
        private $id;
        private $title;
        private $description;
        private $important;

        public function getId() {
            return $this->id;
        }
        public function setId(int $id) {
            $this->id = $id;
        }

        public function getTitle() {
            return $this->title;
        }
        public function setTitle(string $title) {
            $this->title = $title;
        }

        public function getDescription() {
            return $this->description;
        }
        public function setDescription(string $description) {
            $this->description = $description;
        }

        public function getImportant() {
            return $this->important;
        }
        public function setImportant(bool $important) {
            $this->important = $important;
        }
    }
?>
