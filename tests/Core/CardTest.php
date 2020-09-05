<?php

namespace App\Tests\Core;

use PHPUnit\Framework\TestCase;
use App\Core\Card;

class CardTest extends TestCase
{

  public function testName()
  {
    $card = new Card('As', 'Trèfle');
    $this->assertEquals('As', $card->getName());
    $card = new Card('2', 'Trèfle');
    $this->assertEquals('2', $card->getName());

  }

  public function testSort()
  {
    $cards = [];

    $card = new Card('As', 'Trèfle');
    $cards[] = $card;
    $card = new Card('2', 'Pique');
    $cards[] = $card;

    // vérifie que la première carte est bien un As
    $this->assertEquals('As', $cards[0]->getName());

    // trie le tableau $cards, en utilisant la fonction de comparaison Card::cmp
    // rem : la syntaxe n'est pas intuitive, on doit passer
    // le nom complet de la classe et le nom d'une méthode de comparaison.
    // (voir https://www.php.net/manual/fr/function.usort.php)"
    usort($cards,  array("App\Core\Card", "cmp"));

    // vérifie que le tableau $cards a bien été modifié par usort
    // dans la table ASCII, les chiffres sont placés avant les lettres de l'alphabet
    $this->assertEquals('2', $cards[0]->getName());
  }

  public function testColor()
  {
      $card = new Card('As', 'Trèfle');
      $this->assertEquals('Trèfle', $card->getColor());
  }

  public function testCmp()
  {
    $card = new Card('AS',"Trèfle");
    $card2 = new Card("2","Trèfle");
    $result = Card::cmp($card,$card2);
    $this->assertEquals(1,$result);

    $card = new Card('2',"Trèfle");
    $card2 = new Card("A","Trèfle");
    $result = Card::cmp($card,$card2);
    $this->assertEquals(-1,$result);

    $card = new Card('AS',"Trèfle");
    $card2 = new Card("AS","Trèfle");
    $result = Card::cmp($card,$card2);
    $this->assertEquals(0,$result);

      $card = new Card('AS',"Pique");
      $card2 = new Card("AS","Trèfle");
      $result = Card::cmp($card,$card2);
      $this->assertEquals(0,$result);




  }

  public function testToString()
  {
    //TODO
  }

}
