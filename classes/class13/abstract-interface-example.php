<?php
// Interface defining required behaviors for all leagues
interface PartyWing {
    public function shoutSlogan(): string;
    public function acquireAssets(): string;
}

// Abstract base class for common party member functionality
abstract class LeagueMember {
    protected string $name;
    protected string $position;
    
    public function __construct(string $name, string $position) {
        $this->name = $name;
        $this->position = $position;
    }
    
    abstract public function getTitle(): string;
}

// Implementation for Student League
class ChatraLeague extends LeagueMember implements PartyWing {
    public function shoutSlogan(): string {
        return "{$this->getTitle()} shouts: JOY BANGLA! (while burning buses)";
    }
    
    public function acquireAssets(): string {
        return "{$this->getTitle()} acquires: University contracts and student organization funds";
    }
    
    public function getTitle(): string {
        return "Chatra League {$this->position} {$this->name}";
    }
}

// Implementation for Workers League
class SromikLeague extends LeagueMember implements PartyWing {
    public function shoutSlogan(): string {
        return "{$this->getTitle()} shouts: JOY BANGLA! (while blocking factories)";
    }
    
    public function acquireAssets(): string {
        return "{$this->getTitle()} acquires: Garment factory shares and labor union funds";
    }
    
    public function getTitle(): string {
        return "Sromik League Leader {$this->name}";
    }
}

// Implementation for Doctors League
class DoctorLeague extends LeagueMember implements PartyWing {
    public function shoutSlogan(): string {
        return "{$this->getTitle()} shouts: JOY BANGLA! (while writing fake medical reports)";
    }
    
    public function acquireAssets(): string {
        return "{$this->getTitle()} acquires: Hospital equipment contracts and medicine import licenses";
    }
    
    public function getTitle(): string {
        return "Dr. {$this->name}, President of Doctor League";
    }
}

// Implementation for Farmers League
class FarmerLeague extends LeagueMember implements PartyWing {
    public function shoutSlogan(): string {
        return "{$this->getTitle()} shouts: JOY BANGLA! (while occupying farmland)";
    }
    
    public function acquireAssets(): string {
        return "{$this->getTitle()} acquires: Agricultural subsidies and fertilizer distribution rights";
    }
    
    public function getTitle(): string {
        return "Farmer League Representative {$this->name}";
    }
}

// Political Party class to manage all wings
class BALParty {
    private array $wings = [];
    
    public function addWing(PartyWing $wing): void {
        $this->wings[] = $wing;
    }
    
    public function rally(): void {
        foreach ($this->wings as $wing) {
            echo $wing->shoutSlogan() . "\n";
            echo $wing->acquireAssets() . "\n\n";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    // Usage example
$party = new BALParty();

// Add various wings to the party
$party->addWing(new ChatraLeague('Raju', 'General Secretary'));
$party->addWing(new SromikLeague('Mojibur', 'President'));
$party->addWing(new DoctorLeague('Azad', ''));
$party->addWing(new FarmerLeague('Karim', 'District Leader'));

// Conduct party rally
$party->rally();
?>
    <hr>
    <ol start="1"><li><p><strong>Interface Enforcement</strong>:</p><ul><li><p>All wings must implement both <code>shoutSlogan()</code> and <code>acquireAssets()</code></p></li><li><p>Ensures consistent behavior across all party wings</p></li></ul></li><li><p><strong>Abstract Base Class</strong>:</p><ul><li><p>Provides common structure for all league members</p></li><li><p>Handles shared properties like name and position</p></li></ul></li><li><p><strong>Polymorphism</strong>:</p><ul><li><p>The <code>BALParty</code> class can work with any wing through the <code>PartyWing</code> interface</p></li><li><p>Each wing maintains its unique characteristics while following party rules</p></li></ul></li><li><p><strong>Satirical Elements</strong>:</p><ul><li><p>Each implementation includes stereotypical behaviors (purely for humorous illustration)</p></li><li><p>Demonstrates how the same interface can produce different concrete behaviors</p></li></ul></li></ol>
</body>
</html>