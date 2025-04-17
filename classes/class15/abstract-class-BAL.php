<?php
abstract class PartyWing {
    abstract public function shoutSlogan();
    abstract public function acquireAssets();
}

class ChatraLeague extends PartyWing {
    public function shoutSlogan(): string {
        return "Chatra League shouts: JOY BANGLA! (while burning buses) <br>";
    }
    public function acquireAssets(): string {
        return "Chatra League acquires: University contracts and student organization funds <br>";
    }
}

class SromikLeague extends PartyWing {
    public function shoutSlogan(): string {
        return "Sromik League shouts: JOY BANGLA! (while blocking factories) <br>";
    }
    public function acquireAssets(): string {
        return "Sromik League acquires: Garment factory shares and labor union funds <br>";
    }
}

class DoctorLeague extends PartyWing {
    public function shoutSlogan(): string {
        return "Doctor League shouts: JOY BANGLA! (while writing fake medical reports) <br>";
    }
    public function acquireAssets(): string {
        return "Doctor League acquires: Hospital equipment contracts and medicine import licenses <br>";
    }
}
