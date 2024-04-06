<?php 

    //created class
    class Event{

        public $event_id;
        public $event_name;
        public $event_description;
        public $event_presenter;
        public $event_date;
        public $event_time;

        //created constructor
        function __constuct(){
            
            $this->event_id = "";
            $this->event_name = "";
            $this->event_description = "";
            $this->event_presenter = "";
            $this->event_date = "";
            $this->event_time = "";

        }

        //setters and getters
        function set_event_id($inId){
            $this->event_id = $inId;
        }

        function get_event_id(){
            return $this->event_id;
        }

        function set_event_name($inName){
            $this->event_name = $inName;
        }

        function get_event_name(){
            return $this->event_name;
        }

        function set_event_description($inDescription){
            $this->event_description = $inDescription;
        }

        function get_event_description(){
            return $this->event_description;
        }

        function set_event_presenter($inPresenter){
            $this->event_presenter = $inPresenter;
        }

        function get_event_presenter(){
            return $this->event_presenter;
        }

        function set_event_date($inDate){
            $this->event_date = $inDate;
        }

        function get_event_date(){
            return $this->event_date;
        }

        function set_event_time($inTime){
            $this->event_time = $inTime;
        }

        function get_event_time(){
            return $this->event_time;
        }

    }




?>